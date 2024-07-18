<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use Ramsey\Uuid\Uuid;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 投稿一覧を取得
        $posts = Post::with('user')->get();
        return response()->json(
            [
                'posts' => $posts,
                'message' => '投稿一覧を取得しました',
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // 投稿を保存
        $post = new Post();
        $post->id = Uuid::uuid7();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->eyecatch = $request->eyecatch;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 投稿を表示
        $post = Post::with('user')->find($id);
        return response()->json(
            [
                'post' => $post,
                'message' => '投稿を取得しました',
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // 投稿を編集
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json(
            [
                'post' => $post,
                'message' => '投稿を保存しました',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 投稿を削除
        $post = Post::find($id);
        $post->delete();
        return response()->json(
            [
                'message' => '投稿を削除しました',
            ], 200);
    }
}
