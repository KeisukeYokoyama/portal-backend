<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchingApp\StoreRequest;
use App\Http\Requests\MatchingApp\UpdateRequest;
use App\Models\MatchingApp;

class MatchingAppsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // matching_app一覧を取得
        $matching_apps = MatchingApp::all();
        return response()->json([
            'matching_apps' => $matching_apps,
            'message' => 'matching_app一覧を取得しました',
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
        // matching_appを作成
        $matching_app = MatchingApp::create($request->all());
        return response()->json([
            'matching_app' => $matching_app,
            'message' => 'matching_appを作成しました',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // matching_appを取得
        $matching_app = MatchingApp::where('slug', $slug)->first();
        return response()->json([
            'matching_app' => $matching_app,
            'message' => 'matching_appを取得しました',
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
        // matching_appを更新
        $matching_app = MatchingApp::find($id);
        $matching_app->update($request->all());
        return response()->json([
            'matching_app' => $matching_app,
            'message' => 'matching_appを更新しました',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // matching_appを削除
        $matching_app = MatchingApp::find($id);
        $matching_app->delete();
        return response()->json([
            'message' => 'matching_appを削除しました',
        ], 200);
    }
}
