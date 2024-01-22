<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Http\Requests\NewsArticleUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ContentController extends Controller
{
    public function store(NewsArticleUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        $news = NewsArticle::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        return Redirect::route('dashboard');
    }
}
