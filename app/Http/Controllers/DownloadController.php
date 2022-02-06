<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Article;

class DownloadController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Download a file.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
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
