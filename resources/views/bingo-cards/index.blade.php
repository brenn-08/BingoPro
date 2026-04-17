@extends('layouts.app')

@section('content')
<div class="w-full max-w-5xl text-center mb-6">
    <h1 class="text-3xl font-bold mb-4">Bingo Pro 🎉</h1>

    <div class="inline-block bg-gray-200 rounded-lg p-3 mb-4">
        <label class="font-bold mr-2">CURRENT GAME:</label>
        <select id="gameType" onchange="updateGame()" class="px-3 py-2 rounded-md font-semibold text-lg">
            <option value="1">Game 1: Terna & Bingo</option>
            <option value="2">Game 2: Royal & Blackout</option>
        </select>
    </div>

    <div class="space-x-3 mb-8">
        <button class="btn-add bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold" onclick="addCard()">+ Add Card</button>
        <button id="playToggle" class="btn-play bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold" onclick="togglePlayMode()">Start Game</button>
        <button class="btn-reset bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded font-bold" onclick="resetGame()">Reset Calls</button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg mb-6 max-w-2xl mx-auto">
            {{ session('success') }}
        </div>
    @endif
</div>

{{-- Database Cards --}}
<div class="mb-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Saved Cards ({{ $cards->total() }})</h2>
    @forelse($cards as $card)
        <div class="bg-white border-4 border-blue-200 rounded-xl p-6 mb-6 max-w-2xl mx-auto shadow-lg hover:shadow-2xl transition-all">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold">{{ $card->title }}</h3>
                <span class="px-3 py-1 bg-{{ $card->game_mode == '1' ? 'blue' : 'purple' }}-100 text-{{ $card->game_mode == '1' ? 'blue' : 'purple' }}-800 rounded-full text-sm font-semibold">
                    Game {{ $card->game_mode }}
                </span>
            </div>
            <p class="text-gray-600 mb-4">{{ Str::limit($card->description, 100) }}</p>
            <div class="text-sm text-gray-500">
                Created: {{ $card->created_at->format('M d, Y') }}
            </div>
            <div class="mt-4 space-x-2">
                <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">Load Card</a>
                @can('update', $card)
                    <a href="{{ route('bingo-cards.edit', $card) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">Edit</a>
                @endcan
                @can('delete', $card)
                    <form method="POST" action="{{ route('bingo-cards.destroy', $card) }}" class="inline" onsubmit="return confirm('Delete {{ $card->title }}?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @empty
        <div class="text-center py-12">
            <p class="text-xl text-gray-500 mb-4">No saved bingo cards yet.</p>
            @can('create', \App\Models\BingoCard::class)
                <a href="{{ route('bingo-cards.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-bold text-lg">
                    Create First Card →
                </a>
            @endcan
        </div>
    @endforelse
    <div class="text-center mt-8">
        {{ $cards->links() }}
    </div>
</div>

{{-- Interactive Game Area --}}
<div id="cardsContainer" class="flex flex-wrap justify-center gap-6 w-full mb-8"></div>

<div class="w-full max-w-5xl mt-8 flex flex-col items-center space-y-6">
    <div id="playArea" class="hidden bg-white p-6 rounded-lg shadow-md w-full max-w-2xl text-center">
        <h3 class="text-xl font-semibold mb-3">Enter Called Number:</h3>
        <input type="number" id="callInput" placeholder="00" class="w-20 p-3 text-center border-2 border-gray-300 rounded-lg text-lg font-bold">
        <button class="btn-call bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-lg font-bold ml-3 text-lg" onclick="callNumber()">CALL</button>
    </div>

    <div class="w-full bg-white p-6 rounded-lg shadow-md max-w-4xl">
        <h3 class="text-xl font-bold mb-4 text-center">Call History</h3>
        <div id="historyList" class="grid grid-cols-4 md:grid-cols-6 gap-3 justify-center"></div>
    </div>
</div>

@include('bingo-cards.scripts')
@endsection