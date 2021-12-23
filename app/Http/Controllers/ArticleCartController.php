<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Cart;

class ArticleCartController extends Controller
{
    public function store(Request $request)
    {
        $article = Article::findOrFail($request->article_id);
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(), // can be null
            'session_id' => session()->getId()
        ]);
        $cart->articles()->syncWithoutDetaching($article);

        return back();
    }
    
    public function destroy(Article $article)
    {
        $cart = Cart::withSession()->first()->articles()->detach($article);

        return back();
    }
}
