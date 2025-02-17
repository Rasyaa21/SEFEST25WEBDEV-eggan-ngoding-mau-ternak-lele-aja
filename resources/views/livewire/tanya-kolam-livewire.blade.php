<div class="flex flex-col items-center justify-start w-full min-h-screen mb-12"
    x-data="chatComponent()"
    x-init="initScroll()"
    @chat-updated.window="$nextTick(() => scrollToBottom())">

    <div class="w-full mt-28"></div>

    <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text animate-fade-in motion-translate-y-in-100 motion-blur-in-md">
        Tanya Kolam
    </h1>
    <div class="container justify-start max-w-3/4 w-full lg:max-w-1/2 lg:h-[550px] md:h-[550px] h-[500px] bg-white rounded-2xl shadow-2xl mt-10 animate-slide-up flex flex-col motion-translate-y-in-100 motion-blur-in-md">
        <div x-ref="chatContainer" class="flex-1 w-full p-4 overflow-y-scroll custom-scrollbar overscroll-y-contain rounded-t-2xl chat-messages">
            <div class="flex flex-col space-y-4">
                @foreach($messages as $index => $message)
                    @if($message['role'] === 'assistant')
                        <div class="flex justify-start" wire:key="assistant-{{ $index }}">
                            <div class="p-4 bg-primary user-chat rounded-xl w-fit lg:max-w-3/5 max-w-4/5 motion-preset-fade motion-duration 3000">
                                @if(str_contains($message['content'], '1.'))
                                    @foreach(explode("\n", $message['content']) as $line)
                                        @if(trim($line))
                                            <h1 class="mb-2 font-bold text-white">{!! $line !!}</h1>
                                        @endif
                                    @endforeach
                                @else
                                    <h1 class="font-bold text-white">{!! $message['content'] !!}</h1>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if($message['role'] === 'user')
                        <div class="flex justify-end"
                            wire:key="user-{{ $index }}"
                            x-init="$nextTick(() => { shouldAutoScroll = true; scrollToBottom(); })">
                            <div class="p-4 bg-blue-100 user-chat rounded-xl w-fit lg:max-w-3/5 max-w-4/5 motion-preset-fade motion-duration-200">
                                <h1 class="font-bold text-black">{{ $message['content'] }}</h1>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="flex flex-row items-center justify-center w-full px-4 h-3/20 rounded-b-2xl">
            <form wire:submit.prevent="submit" class="flex flex-row w-full gap-4">
                <input type="text"
                    placeholder="Tanya Apa Saja Mengenai Ternak Ikan"
                    wire:model="body"
                    wire:loading.attr="disabled"
                    class="w-full px-4 py-3 text-gray-600 placeholder-gray-400 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary disabled:opacity-50 disabled:cursor-not-allowed">
                <button type="submit"
                    wire:loading.attr="disabled"
                    wire:click="submit"
                    class="p-4 bg-blue-400 container-btn rounded-xl disabled:opacity-50">
                    <div wire:loading.remove>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 2L11 13"></path>
                            <path d="M22 2L15 22l-4-9-9-4z"></path>
                        </svg>
                    </div>
                    <div wire:loading>
                        <svg class="w-5 h-5 text-white animate-spin" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
