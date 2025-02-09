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

    public function send()
    {
        $this->validate(['body' => 'required']);

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

            // Add delay then show AI response
            usleep(500000); // 0.5s delay

            $this->messages[] = [
                'role' => 'assistant',
                'content' => $response
            ];

            $this->dispatch('chat-updated');

        } catch (\Exception $e) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'Error: ' . $e->getMessage()
            ];
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
