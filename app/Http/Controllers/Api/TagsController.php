<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // タグ一覧を取得
        $tags = Tag::all();
        return response()->json(
            [
                'tags' => $tags,
                'message' => 'タグ一覧を取得しました',
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
        // タグを保存
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->description = $request->description;
        $tag->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // タグを取得
        $tag = Tag::where('slug', $slug)->first();
        return response()->json(
            [
                'tag' => $tag,
                'message' => 'タグを取得しました',
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
        // タグを更新
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->description = $request->description;
        $tag->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // タグを削除
        $tag = Tag::find($id);
        $tag->delete();
    }
}
