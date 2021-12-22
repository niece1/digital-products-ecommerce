<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function __invoke()
    {
        $articles = Article::get();
        
        return view('home', [
            'articles' => $articles
        ]);
    }
}
