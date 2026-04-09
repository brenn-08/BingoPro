<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo Master Pro - Celebration Edition</title>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .mode-selector {
            margin: 15px 0;
            padding: 10px;
            background: #dfe6e9;
            border-radius: 8px;
            display: inline-block;
        }

        select {
            padding: 8px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
            width: 100%;
            min-height: 200px;
            padding: 20px 0;
        }

        .bingo-card {
            background: white;
            border: 4px solid #2c3e50;
            border-radius: 12px;
            padding: 15px;
            position: relative;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(5, 50px);
            grid-gap: 5px;
        }

        .cell {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            font-weight: bold;
            background: #fff;
            border-radius: 4px;
        }

        .cell input {
            width: 100%;
            border: none;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            background: transparent;
            outline: none;
        }

        .marked {
            background: #ff4757 !important;
            color: white !important;
        }

        .marked input {
            color: white !important;
        }

        .is-terna {
            border-color: #3498db !important;
        }

        .is-bingo {
            border-color: #f1c40f !important;
            box-shadow: 0 0 30px #f1c40f;
            transform: scale(1.05);
        }

        .is-royal {
            border-color: #a29bfe !important;
            box-shadow: 0 0 15px #a29bfe;
            background: #f1f0ff;
        }

        .is-blackout {
            border-color: #2d3436 !important;
            box-shadow: 0 0 40px #f1c40f;
            transform: scale(1.05);
            background: #fffde7;
        }

        .badge {
            display: none;
            position: absolute;
            top: -18px;
            left: 50%;
            transform: translateX(-50%);
            padding: 2px 12px;
            border-radius: 20px;
            font-weight: bold;
            border: 2px solid white;
            z-index: 10;
            font-size: 12px;
        }

        .is-terna .terna-badge,
        .is-bingo .bingo-badge,
        .is-royal .royal-badge,
        .is-blackout .blackout-badge {
            display: block;
        }

        .terna-badge {
            background: #3498db;
            color: white;
        }

        .bingo-badge {
            background: #f1c40f;
            color: black;
        }

        .royal-badge {
            background: #6c5ce7;
            color: white;
        }

        .blackout-badge {
            background: #2d3436;
            color: white;
        }

        .bottom-section {
            width: 100%;
            max-width: 900px;
            margin-top: 20px;
            border-top: 2px solid #ccc;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .history-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(75px, 1fr));
            gap: 8px;
            width: 100%;
            margin-top: 15px;
        }

        .history-item {
            background: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        button {
            padding: 10px 18px;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 5px;
        }

        .btn-add {
            background: #27ae60;
            color: white;
        }

        .btn-play {
            background: #2980b9;
            color: white;
        }

        .btn-call {
            background: #8e44ad;
            color: white;
        }

        .btn-reset {
            background: #95a5a6;
            color: white;
        }

        .btn-del {
            color: #ff4757;
            border: none;
            background: none;
            font-size: 16px;
        }

        #playArea {
            display: none;
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>