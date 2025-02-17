@extends('components.layouts.app')

@section('title', 'Marivora - Tanya Kolam')

@section('content')
<section x-data class="flex flex-col items-center justify-start w-full min-h-screen bg-lightBlue">
    @livewire('tanya-kolam-livewire')
    @if (session()->has('error'))
        <div class="fixed relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded bottom-4 right-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="fixed relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded bottom-4 right-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
    </style>
<script>
    function chatComponent() {
        return {
            shouldAutoScroll: true,
            lastScrollHeight: 0,
            newMessage: false, 
            userScrolledUp: false,

            initScroll() {
                const container = this.$refs.chatContainer;

                container.addEventListener('scroll', () => {
                    const isAtBottom = container.scrollHeight - container.scrollTop <= container.clientHeight + 10;

                    this.shouldAutoScroll = isAtBottom;
                    
                    if (!isAtBottom) {
                        this.userScrolledUp = true;
                        this.newMessage = false;
                    } else {
                        this.userScrolledUp = false;
                        this.newMessage = false;
                    }
                });

                this.scrollToBottom();
            },

            scrollToBottom() {
                const container = this.$refs.chatContainer;

                if (this.shouldAutoScroll && !this.userScrolledUp) {
                    container.scrollTop = container.scrollHeight;
                } else {
                    this.newMessage = true; 
                }

                this.lastScrollHeight = container.scrollHeight;
            }
        };
    }
</script>
</section>

@endsection
