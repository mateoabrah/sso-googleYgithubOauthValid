<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome (para los iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
        font-family: 'Figtree', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f3f4f6;
        flex-direction: column;
    }

    .title {
        font-size: 2.5em;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .slogan {
        font-size: 1.3em;
        color: #555;
        margin-bottom: 40px;
    }

    .auth-links {
        display: flex;
        gap: 20px;
    }

    .auth-link {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        font-size: 18px;
        color: #333;
        text-decoration: none;
        border: 2px solid #333;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .auth-link:hover {
        background-color: #333;
        color: #fff;
    }

    .auth-link i {
        margin-right: 8px;
    }

    </style>
</head>
<body>
    <!-- Título y eslogan centrados -->
    <div class="title">ClickMarket</div>
    <div class="slogan">La teva compra segura, a un clic de distancia.</div>
    @if (Route::has('login'))
        <div class="auth-links">
            @auth
                <a href="{{ url('/dashboard') }}" class="auth-link">
                    <i class="fas fa-tachometer-alt"></i> Tauler de control
                </a>
            @else
                <a href="{{ route('login') }}" class="auth-link">
                    <i class="fas fa-sign-in-alt"></i> Inici
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link">
                        <i class="fas fa-user-plus"></i> Registre
                    </a>
                @endif
            @endauth
        </div>
    @endif
</body>
</html>
