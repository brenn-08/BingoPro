<?php

namespace App\Http\Controllers;

use App\Models\BingoCard;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BingoCardController extends Controller
{
    
    public function index(): View
    {
        $cards = BingoCard::latest()->paginate(10);
        return view('bingo-cards.index', compact('cards'));
    }

    
    public function create(): View
    {
        return view('bingo-cards.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_mode' => 'required|in:1,2',
            'numbers' => 'required|array|size:25',
            'numbers.*' => 'string|min:1|max:4',
        ]);

        BingoCard::create($validated);

        return redirect()->route('bingo-cards.index')
                        ->with('success', 'Bingo card created successfully!');
    }

    
    public function show(BingoCard $bingoCard): View
    {
        return view('bingo-cards.show', compact('bingoCard'));
    }

    
    public function edit(BingoCard $bingoCard): View
    {
        return view('bingo-cards.edit', compact('bingoCard'));
    }

    
    public function update(Request $request, BingoCard $bingoCard): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_mode' => 'required|in:1,2',
            'numbers' => 'required|array|size:25',
            'numbers.*' => 'string|min:1|max:4',
        ]);

        $bingoCard->update($validated);

        return redirect()->route('bingo-cards.index')
                        ->with('success', 'Bingo card updated successfully!');
    }

    
    public function destroy(BingoCard $bingoCard): RedirectResponse
    {
        $bingoCard->delete();

        return redirect()->route('bingo-cards.index')
                        ->with('success', 'Bingo card deleted successfully!');
    }
}