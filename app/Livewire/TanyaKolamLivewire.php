<?php

namespace App\Livewire;

use App\Repositories\RekomChatRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TanyaKolamLivewire extends Component
{
    public string $body = "";
    public array $messages = [];
    public bool $isLoading = false;
    public bool $isProcessing = false;
    public string $currentResponse = "";

    protected $rules = [
        'body' => 'required'
    ];

    protected RekomChatRepository $rekomRepo;

    public function __construct()
    {
        $this->rekomRepo = new RekomChatRepository();
    }

    public function submit()
    {
        $this->validate(['body' => 'required']);

        if (empty(trim($this->body))) {
            return;
        }

        $userMessage = $this->body;
        $this->body = '';

        $this->messages[] = [
            'role' => 'user',
            'content' => $userMessage
        ];

        $this->dispatch('chat-updated');

        try {
            $stream = $this->rekomRepo->chatbot($userMessage);
            $response = '';

            foreach ($stream as $chunk) {
                if (isset($chunk->choices[0]->delta->content)) {
                    $response .= $chunk->choices[0]->delta->content;
                }
            }

            $this->messages[] = [
                'role' => 'assistant',
                'content' => $response
            ];

        } catch (\Exception $e) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'Error: ' . $e->getMessage()
            ];
        } finally {
            $this->dispatch('chat-updated');
        }
    }

    public function updated($property)
    {
        if ($property === 'messages') {
            $this->dispatch('chat-updated');
        }
    }

    public function render()
    {
        return view('livewire.tanya-kolam-livewire');
    }
}
