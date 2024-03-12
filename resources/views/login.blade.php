<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма входа</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="email"],
        input[type="password"],
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* чтобы внутренние отступы не добавлялись к ширине */
            transition: border-color 0.3s ease; /* плавное изменение цвета рамки при фокусировке */
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff; /* цвет рамки при фокусировке */
            outline: none; /* убираем стандартное синее подчеркивание при фокусировке в некоторых браузерах */
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease; /* плавное изменение цвета фона при наведении */
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* цвет фона при наведении */
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <div>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    
        <div>
            <input type="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
