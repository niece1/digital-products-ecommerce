<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function show(Request $request, Article $article)
    {
        

        return Storage::disk('local')->download($article->file_path);
    }
}
