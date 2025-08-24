<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\MovieNews;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    $news = MovieNews::orderBy('created_at', 'desc')->get();
    return view('news', compact('news'));
})->name('news');

Route::get('/news/{id}', function ($id) {
    $article = MovieNews::findOrFail($id);
    return view('news-detail', compact('article'));
})->name('news.detail');
