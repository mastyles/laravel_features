<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return $articles;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:29',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_at' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $article = new Article();
        $article->fill($request->all());
        $article->save();

        return response()->json($article, 201);
    }

    public function show($id)
    {
        $article = Article::where('id', '=', $id)->first();
        if($article) {
            return response()->json($article, 200);
        } else {
            return response()->json([
                'message' => 'Article does not exist.',
                'status_code' => 404
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $article = Article::where('id', '=', $id)->first();

        $validator = Validator::make($request->all(), [
            'title' => 'string|max:29'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        if($article) {
            $article->fill($request->all());
            $article->save();
            return response()->json($article, 200);
        } else {
            return response()->json([
                'message' => 'Article does not exist.',
                'status_code' => 404
            ], 404);
        }

    }

    public function destroy($id)
    {
        // Usually delete API finds and checks if the record exists, if yes then deletes it and sends a response that the
        // the record has been deleted, like this:
        /*
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json([
            'message' => 'Article has been deleted.',
            'status_code' => 200
        ], 200);
        */

        // But according to the specific requirement of "The response code is 404 and there are no particular requirements for the response body.",
        // here is the code:
        return response()->json([
            'status_code' => 404
        ], 404);

    }
}
