@extends('layouts.app')

@section('title', 'Marivora - Tanya Kolam')



@section('content')
<section x-data class="flex flex-col items-center justify-start w-full min-h-screen bg-lightBlue">
    @livewire('tanya-kolam-livewire')
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

            initScroll() {
                const container = this.$refs.chatContainer;

                container.addEventListener('scroll', () => {
                    const isScrolledToBottom = container.scrollHeight - container.scrollTop === container.clientHeight;
                    this.shouldAutoScroll = isScrolledToBottom;
                });

                this.scrollToBottom();
            },

            scrollToBottom() {
                const container = this.$refs.chatContainer;

                if (this.shouldAutoScroll) {
                    container.scrollTop = container.scrollHeight;
                }

                this.lastScrollHeight = container.scrollHeight;
            }
        };
    }
</script>
</section>

@endsection
