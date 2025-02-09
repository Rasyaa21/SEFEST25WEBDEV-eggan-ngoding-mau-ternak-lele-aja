<div class="flex flex-col items-center justify-start w-full min-h-screen"
    x-data="{
        initScroll() {
            this.$refs.chatContainer.scrollTop = this.$refs.chatContainer.scrollHeight;
        }
    }"
    x-init="initScroll"
    @chat-updated.window="$nextTick(() => initScroll())">
    <div class="w-full mt-28"></div>
    <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text animate-fade-in motion-translate-y-in-100 motion-blur-in-md">
        Tanya Kolam
    </h1>
    <div class="container justify-start max-w-3/4 w-full lg:max-w-1/2 lg:h-[550px] md:h-[550px] h-[500px] bg-white rounded-2xl shadow-2xl mt-12 animate-slide-up flex flex-col motion-translate-y-in-100 motion-blur-in-md">
        <div x-ref="chatContainer" class="flex flex-col justify-between w-full p-4 overflow-y-auto h-17/20 rounded-t-2xl chat-messages">
            <div class="flex flex-col space-y-4" wire:poll.visible>
                @foreach($messages as $index => $message)
                    @if($message['role'] === 'user')
                        <div class="flex justify-end" wire:key="user-{{ $index }}">
                            <div class="p-4 user-chat bg-primary rounded-xl w-fit max-w-3/5 motion-translate-y-in-100 motion-blur-in-md">
                                <h1 class="font-bold text-white">{{ $message['content'] }}</h1>
                            </div>
                        </div>
                    @endif
                    @if($message['role'] === 'assistant')
                        <div class="flex justify-start"
                            wire:key="assistant-{{ $index }}"
                            x-data
                            x-init="setTimeout(() => $el.classList.add('opacity-100'), 500)"
                            class="transition-opacity duration-500 opacity-0">
                            <div class="p-4 bg-cream user-chat rounded-xl w-fit max-w-3/5 motion-translate-y-in-100 motion-blur-in-md">
                                <h1 class="font-bold text-primary">{!! $message['content'] !!}</h1>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if($isProcessing)
                    <div class="flex justify-start">
                        <div class="p-4 bg-cream user-chat rounded-xl w-fit">
                            <div class="flex space-x-2">
                                <div class="w-2 h-2 rounded-full bg-primary animate-bounce"></div>
                                <div class="w-2 h-2 bg-primary rounded-full animate-bounce [animation-delay:200ms]"></div>
                                <div class="w-2 h-2 bg-primary rounded-full animate-bounce [animation-delay:400ms]"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-row items-center justify-center w-full px-4 h-3/20 rounded-b-2xl">
            <form wire:submit.prevent="send" class="flex flex-row w-full gap-4" @submit.prevent>
                <input type="text"
                    placeholder="Tanya Apa Saja Mengenai Ternak Ikan"
                    wire:model="body"
                    wire:loading.attr="disabled"
                    @keydown.enter="$wire.send()"
                    class="w-full px-4 py-3 text-gray-600 placeholder-gray-400 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary disabled:opacity-50 disabled:cursor-not-allowed animate-fade-in">
                <button type="submit"
                    wire:loading.attr="disabled"
                    class="p-4 bg-blue-400 container-btn rounded-xl disabled:opacity-50 disabled:cursor-not-allowed animate-fade-in">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2L15 22l-4-9-9-4z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
