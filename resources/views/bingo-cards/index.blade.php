@extends('layouts.app')
@section('content')
<div class="bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl mb-6">Bingo Cards List</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Title</th>
                    <th class="py-2 px-4 border">Game Mode</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cards as $card)
                <tr>
                    <td class="py-2 px-4 border">{{ $card->id }}</td>
                    <td class="py-2 px-4 border">{{ $card->title }}</td>
                    <td class="py-2 px-4 border">{{ $card->game_mode }}</td>
                    <td class="py-2 px-4 border">
                        <a href="#" class="text-blue-500">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $cards->links() }}
</div>
@endsection