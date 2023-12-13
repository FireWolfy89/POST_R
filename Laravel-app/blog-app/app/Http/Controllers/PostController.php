<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Összes poszt lekérése

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function show(Post $post)
    {
    return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        
       
    // Validáció a beérkező adatokra
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Létrehozás és adatok beállítása
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    
    // Bejelentkezett felhasználóhoz kötjük a posztot
    $post->user_id = auth()->id();

    // Post elmentése az adatbázisba
    $post->save();

    // Átirányítás a megfelelő oldalra
    return redirect('/posts')->with('success', 'Post sikeresen létrehozva!');
    }
}
