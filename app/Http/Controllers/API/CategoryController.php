<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return response()->json([
            'message' => 'Category list',
            'data' => $categories,
            'status' => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $categories = New Category;
        $categories->name = $request->name;
        $categories->is_publish = $request->is_publish;
        $categories->save();

        try {
            return response()->json([
                'message' => 'Category created successfully',
                'data' => $categories
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Category created failed',
                'data' => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $categories = Category::findOrFail($id);
        $categories->name = $request->name;
        $categories->is_publish = $request->is_publish;
        $categories->update();

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $categories
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
            'data' => $categories
        ]);
    }
}
