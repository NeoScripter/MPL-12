<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Teacher;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function store(Request $request, $teacherId)
    {
        $validated = $request->validate([
            'articleTitle' => 'required|string|max:255',
            'articleLink' => 'required|string|url',
        ]);

        $teacher = Teacher::findOrFail($teacherId);

        $teacher->articles()->create([
            'title' => $validated['articleTitle'],
            'link' => $validated['articleLink'],
        ]);

        return redirect()->back();
    }

    public function destroy($articleId)
    {
        $article = Article::findOrFail($articleId);

        $article->delete();

        return redirect()->back();
    }
}
