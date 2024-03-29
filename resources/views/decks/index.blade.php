<script type="text/javascript" src="{{ asset('js/voice_enable.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/stop_speech.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/controllers/decks_speech_controller.js') }}"></script>

<x-app-layout>
    <button id="hiddenButton" style="display:none;"></button>
    <script>
        function speak(text) {
            const msg = new SpeechSynthesisUtterance(text);
            window.speechSynthesis.speak(msg);
        }

        function onFirstInteraction() {
            document.removeEventListener('touchstart', onFirstInteraction);
            const hiddenButton = document.getElementById('hiddenButton');
            hiddenButton.click();
        }

        window.onload = () => {
            const hiddenButton = document.getElementById('hiddenButton');
            hiddenButton.addEventListener('click', () => speak('Hello, this is your speech synthesis on page reload!'));
            document.addEventListener('touchstart', onFirstInteraction);
        };
    </script>
    <div class="mt-8 mx-0 flex flex-col items-center w-screen md:w-10/12 xl:w-2/3">

        {{-- Title & New Deck Div --}}
        <div class="flex justify-between w-full items-center px-4">
            <h1 class="text-primary font-qs font-semibold text-3xl bg-transparent">{{ Auth::user()->name }}'s Decks </h1>
            <a class="m-4 mt-4 mb-4 rounded-md" href="{{ route('decks.create') }}"><x-new-button>New Deck</x-new-button></a>
        </div>

        {{-- Decks Div --}}
        <div class="rounded-md flex flex-col justify-center my-4 py-4 px-2 md:px-4 w-full">

            @forelse ($decks as $deck)

            {{-- Decks Styling --}}
            <div class="flex flex-col rounded-md mx-2 my-4 md:m-4 p-4 md:p-4 shadow-lg shadow-gray-300 border-white border-1 border">

                {{-- Deck name & Deck uuid set --}}
                <div id="deck_name" class="w-full"><h1 class="text-primary text-center font-qs font-semibold bg-transparent mx-4 text-2xl">{{ $deck->name }}</h1></div>
                <div id="deck_uuid" style="display: none"><p>{{ $deck->uuid }}</p></div>

                <div class="flex">
                    <a class="m-2 md:m-4 w-2/3 md:w-1/2" href="{{ route('study.prime', $deck) }}">
                        <x-primary-button class="w-full break-word">Study</x-primary-button>
                    </a>
                    <a class="m-2 md:m-4 w-1/3 md:w-1/2" href="{{ route('decks.show', $deck) }}">
                        <x-primary-button class="w-full break-word">Edit</x-primary-button>
                    </a>
                </div>
            </div>
            
            @empty
                <p class="m-4">You have no decks.</p>               
            @endforelse
            {{  $decks->links() }}
            <div><p class="text-center">Say the name of a deck to begin studying</p></div>
        </div>
    </div>
</x-app-layout>
