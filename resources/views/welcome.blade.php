<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bingo Pro - Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-glow { box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .btn-glow:hover { transform: translateY(-2px); box-shadow: 0 15px 40px rgba(0,0,0,0.4); }
    </style>
</head>
<body class="font-sans antialiased min-h-screen hero-gradient flex items-center justify-center p-6">
    <div class="max-w-2xl w-full bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl p-12 text-center transform hover:scale-[1.02] transition-all duration-500">
        
        {{-- Hero --}}
        <div class="mb-12">
            <div class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent mb-4">
                <h1 class="text-6xl md:text-7xl font-black drop-shadow-lg">🎉 Bingo Pro</h1>
                <p class="text-2xl md:text-3xl font-bold text-gray-800 mt-2 drop-shadow-md">Celebration Edition</p>
            </div>
            <p class="text-xl text-gray-700 leading-relaxed max-w-lg mx-auto">
                Join the ultimate bingo experience with Terna, Royal, and Blackout games!
            </p>
        </div>

        {{-- Auth Buttons --}}
        @auth
            <div class="space-y-4 mb-8">
                <a href="{{ route('dashboard') }}" 
                   class="block w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-black py-4 px-8 rounded-2xl text-xl btn-glow transition-all duration-300">
                    🎮 Go to Dashboard
                </a>
                <p class="text-lg font-semibold text-gray-800">Welcome back, {{ auth()->user()->name }}!</p>
            </div>
        @else
            <div class="space-y-4 mb-12">
                {{-- Login Button --}}
                <a href="{{ route('login') }}" 
                   class="block w-full bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-black py-4 px-8 rounded-2xl text-xl btn-glow transition-all duration-300 shadow-2xl">
                    🚀 Sign In
                </a>
                
                {{-- Register Button --}}
                <a href="{{ route('register') }}" 
                   class="block w-full bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-black py-4 px-8 rounded-2xl text-xl btn-glow transition-all duration-300 shadow-2xl">
                    ➕ Create Account
                </a>
            </div>
        @endauth

        {{-- Admin Credentials (Always visible, large & clear) --}}
        <div class="bg-gradient-to-r from-gray-100 to-gray-200 p-6 rounded-2xl border-4 border-dashed border-yellow-300 shadow-lg">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">🛡️ Quick Admin Access</h3>
            <div class="bg-white p-4 rounded-xl shadow-inner">
                <div class="grid md:grid-cols-2 gap-4 text-lg">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Email:</label>
                        <code class="bg-blue-100 px-3 py-2 rounded-lg font-mono text-blue-900 block font-bold text-xl">
                            admin@bingo.pro
                        </code>
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Password:</label>
                        <code class="bg-green-100 px-3 py-2 rounded-lg font-mono text-green-900 block font-bold text-xl">
                            admin123
                        </code>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-3 italic">Full admin access - manage users & cards</p>
            </div>
        </div>

        <div class="bg-gradient-to-r from-gray-100 to-gray-200 p-6 rounded-2xl border-4 border-dashed border-yellow-300 shadow-lg">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">🛡️ Guide</h3>
            <div class="bg-white p-4 rounded-xl shadow-inner">
                <div class="grid md:grid-cols-2 gap-4 text-lg">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">👉 To access the game:</label>
                        <code class="bg-green-100 px-3 py-2 rounded-lg font-mono text-green-900 block font-bold text-xl">
                            1. Look at the upper left corner of the screen and click “Bingo Pro” in the navigation bar
                        </code>
                    </div>
                    <div>
                        <code class="bg-green-100 px-3 py-2 rounded-lg font-mono text-green-900 block font-bold text-xl">
                            2. You will be redirected to the Bingo Games page
                        </code>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="mt-12 pt-8 border-t-2 border-white/50">
            <p class="text-lg text-white/90 font-semibold">Ready to play? 🎲</p>
            <p class="text-sm text-white/70 mt-2">&copy; 2026 Bingo Pro - All rights reserved</p>
        </div>
    </div>
</body>
</html>