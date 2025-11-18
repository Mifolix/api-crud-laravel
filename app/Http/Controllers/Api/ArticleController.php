<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::all(), Response::HTTP_OK);
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());
        return response()->json($article, Response::HTTP_CREATED);
    }

    public function show(Article $article)
    {
        return response()->json($article, Response::HTTP_OK);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->validated());
        return response()->json($article, Response::HTTP_OK);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
