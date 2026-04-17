<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-center">

                    <h3 class="text-3xl font-bold mb-4">
                        Welcome, {{ auth()->user()->name }}!
                    </h3>

                    <p class="text-gray-600 mb-8">
                        Ready to play Bingo?
                    </p>

                    {{-- MAIN BUTTON --}}
                    <a href="{{ route('bingo-cards.index') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-10 py-5 rounded-2xl text-xl font-bold shadow-lg transform hover:scale-105 transition-all">
                        🎲 Open Bingo Game
                    </a>

                    {{-- SECONDARY BUTTON --}}
                    <div class="mt-6">
                        <a href="{{ route('bingo-cards.create') }}"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold">
                            ➕ Create New Bingo Card
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>