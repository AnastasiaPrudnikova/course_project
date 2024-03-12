<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index()
    {
        // Метод для отображения списка ресурсов
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        // Метод для отображения конкретного ресурса
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        // Метод для отображения формы создания нового ресурса
        return view('create');
    }

    public function store(Request $request)
    {
        // Метод для сохранения нового ресурса в базу данных
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    public function edit($id)
    {
        // Метод для отображения формы редактирования ресурса
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Метод для обновления ресурса в базе данных
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Request $request, $id)
    {
        // Метод для удаления ресурса из базы данных
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}