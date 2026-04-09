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

    <div class="space-x-3">
        <button class="btn-add bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-bold" onclick="addCard()">+ Add Card</button>
        <button id="playToggle" class="btn-play bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold" onclick="togglePlayMode()">Start Game</button>
        <button class="btn-reset bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded font-bold" onclick="resetGame()">Reset Calls</button>
    </div>
</div>

<div id="cardsContainer" class="flex flex-wrap justify-center gap-6 w-full"></div>

<div class="w-full max-w-5xl mt-8 flex flex-col items-center space-y-6">

    <div id="playArea" class="hidden bg-white p-6 rounded-lg shadow-md w-full text-center">
        <h3 class="text-xl font-semibold mb-3">Enter Called Number:</h3>
        <input type="number" id="callInput" placeholder="00" class="w-20 p-3 text-center border-2 border-gray-300 rounded-lg text-lg">
        <button class="btn-call bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded font-bold ml-3" onclick="callNumber()">CALL</button>
    </div>

    <div class="w-full bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-bold mb-3">Call History</h3>
        <div id="historyList" class="grid grid-cols-6 gap-2"></div>
    </div>

</div>

@include('bingo-cards.scripts')

@endsection