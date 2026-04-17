<?php

namespace App\Http\Controllers;

use App\Models\BingoCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BingoCardController extends Controller
{
    public function index()
    {
        $cards = BingoCard::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('bingo-cards.index', compact('cards'));
    }

    public function create()
    {
        return view('bingo-cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_mode' => 'required|in:1,2',
        ]);

        BingoCard::create([
            'title' => $request->title,
            'description' => $request->description,
            'game_mode' => $request->game_mode,
            'user_id' => Auth::id(), // 🔥 CRITICAL FIX
        ]);

        return redirect()
            ->route('bingo-cards.index')
            ->with('success', 'Card created!');
    }

    public function show(BingoCard $bingoCard)
    {
        return view('bingo-cards.show', compact('bingoCard'));
    }

    public function edit(BingoCard $bingoCard)
    {
        return view('bingo-cards.edit', compact('bingoCard'));
    }

    public function update(Request $request, BingoCard $bingoCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_mode' => 'required|in:1,2',
        ]);

        $bingoCard->update([
            'title' => $request->title,
            'description' => $request->description,
            'game_mode' => $request->game_mode,
        ]);

        return redirect()
            ->route('bingo-cards.index')
            ->with('success', 'Card updated!');
    }

    public function destroy(BingoCard $bingoCard)
    {
        $bingoCard->delete();

        return redirect()
            ->route('bingo-cards.index')
            ->with('success', 'Card deleted!');
    }
}