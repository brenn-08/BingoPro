@extends('layouts.app')

@section('content')

    <div class="w-full bg-white shadow p-6 text-center mb-5">
        <h1 class="text-3xl font-bold">Bingo Pro 🎉</h1>

        <div class="mt-4 inline-block bg-gray-200 p-3 rounded">
            <label class="font-bold">CURRENT GAME:</label>
            <select id="gameType" onchange="updateGame()" class="ml-2 p-2 rounded font-bold">
                <option value="1">Game 1: Terna & Bingo</option>
                <option value="2">Game 2: Royal & Blackout</option>
            </select>
        </div>

        <div class="mt-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded" onclick="addCard()">+ Add Card</button>
            <button id="playToggle" class="bg-blue-600 text-white px-4 py-2 rounded" onclick="togglePlayMode()">Start
                Game</button>
            <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="resetGame()">Reset Calls</button>
        </div>
    </div>

    <div id="cardsContainer" class="flex flex-wrap justify-center gap-6 w-full"></div>

    <div class="w-full max-w-3xl mt-6 border-t pt-6 flex flex-col items-center">

        <div id="playArea" class="hidden bg-white p-6 rounded shadow mb-5 w-full text-center">
            <h3 class="mb-3 font-semibold">Enter Called Number:</h3>
            <input type="number" id="callInput" class="border p-3 text-xl text-center rounded w-24">
            <button class="bg-purple-600 text-white px-4 py-2 rounded ml-2" onclick="callNumber()">CALL</button>
        </div>

        <div class="w-full bg-white p-4 rounded shadow">
            <h3 class="font-semibold border-b pb-2">Call History</h3>
            <div id="historyList" class="grid grid-cols-4 gap-2 mt-3"></div>
        </div>

    </div>

    @include('bingo-cards.scripts')

@endsection