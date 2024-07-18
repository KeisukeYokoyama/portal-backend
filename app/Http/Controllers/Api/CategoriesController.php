<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // カテゴリ一覧を取得
        $categories = Category::all();
        return response()->json(
            [
                'categories' => $categories,
                'message' => 'カテゴリ一覧を取得しました',
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
        // カテゴリを保存
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // カテゴリを取得
        $category = Category::where('slug', $slug)->first();

        return response()->json(
            [
                'category' => $category,
                'message' => 'カテゴリを取得しました',
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
        // カテゴリを更新
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // カテゴリを削除
        $category = Category::find($id);
        $category->delete();
    }
}
