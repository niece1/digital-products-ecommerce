<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Article;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function show(Request $request, Article $article)
    {
        // one can use different ways to protect unpaid downloads: if statements, policies etc
        // throws ModelNotFoundException if it's not true
        throw_unless(
            $request->user()->orders->pluck('articles')->flatten()->contains('id', $article->id),
            ModelNotFoundException::class,
        );

        return Storage::disk('local')->download($article->file_path);
    }
}
