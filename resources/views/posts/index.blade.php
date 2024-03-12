<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список постов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .post {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
        }

        .post h2 {
            margin-top: 0;
        }

        .post p {
            margin-bottom: 10px;
        }

        .actions {
            margin-top: 20px;
        }

        .actions a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .actions form {
            display: inline;
        }

        .actions button {
            padding: 5px 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .actions button:hover {
            background: #0056b3;
        }

        .login-message {
            margin-top: 20px;
        }

        .login-message p {
            margin: 0;
        }

        .login-message a {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Список постов</h1>

        @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post->id) }}">Подробнее</a>
            </div>
        @endforeach

        <div class="actions">
            <a href="{{ route('create') }}">Создать новый пост</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Выход</button>
            </form>
        </div>

        @guest
            <div class="login-message">
                <p>Для создания нового поста необходимо <a href="{{ route('login') }}">войти</a>.</p>
            </div>
        @endguest
    </div>
</body>
</html>
