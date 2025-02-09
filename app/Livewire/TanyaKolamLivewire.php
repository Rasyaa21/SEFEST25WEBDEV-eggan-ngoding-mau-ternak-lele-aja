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

        // Store message and clear input
        $userMessage = $this->body;
        $this->body = '';

        // Add user message immediately
        $this->messages[] = [
            'role' => 'user',
            'content' => $userMessage
        ];

        // Force an update to show user message
        $this->dispatch('chat-updated');

        // Set processing state
        $this->isProcessing = true;

        try {
            // Delay to ensure user message is displayed
            usleep(500000); // 0.5 second delay

            // Get AI response
            $stream = $this->rekomRepo->chatbot($userMessage);
            $response = '';

            foreach ($stream as $chunk) {
                if (isset($chunk->choices[0]->delta->content)) {
                    $response .= $chunk->choices[0]->delta->content;
                }
            }

            // Add AI response as a single message with newline characters separating points
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
            $this->isProcessing = false;
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
