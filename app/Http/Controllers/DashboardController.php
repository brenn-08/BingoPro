<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BingoCard;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $cards = BingoCard::latest()->paginate(20);
        } else {
            $cards = BingoCard::where('user_id', Auth::id())
                ->latest()
                ->paginate(10);
        }

        return view('dashboard', compact('cards'));
    }
}