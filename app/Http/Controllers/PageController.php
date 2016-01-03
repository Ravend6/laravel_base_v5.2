<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getIndex()
    {
        $stickyArticles = Article::where('is_visible', true)
            ->where('is_sticky', true)
            ->latest()
            ->take(3)
            ->get();
        $articles = Article::where('is_visible', true)
            ->where('is_sticky', false)
            ->latest()
            ->paginate(10);

        return view('page.index', compact('articles', 'stickyArticles'));
    }

    public function getPlan()
    {
        return view('page.plan');
    }

    public function getChat()
    {
        return view('page.chat');
    }
}
