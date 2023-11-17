<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = $request->input('search');

            $news = News::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%")
                             ->orWhereHas('category', function ($categoryQuery) use ($query) {
                                 $categoryQuery->where('name', 'like', "%$query%");
                             });
            })->with('author', 'category')->get();

            if ($news->isEmpty()) {
                $message = $query ? "Resource not found for the search: $query" : 'Data Empty';
                throw new \Exception($message);
            }

            $searchMessage = $query ? "Resource search for '$query' is successful" : 'Get all resource';

            $response = [
                'message' => $searchMessage,
                'data' => $news,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];

            return response()->json($response, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'url' => 'required',
                'image_url' => 'required',
                'published' => 'required',
                'author_id' => 'required|exists:authors,id',
                'category_id' => 'required|exists:categories,id',
            ]);

            $news = News::create($data);

            // Load informasi penulis dan kategori
            $news->load('author', 'category');

            $response = [
                'message' => 'Resource is added successfully',
                'data' => $news,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $news = news::find($id);

            if ($news) {
                $response = [
                    'message' => 'Get detail resource',
                    'data' => $news,
                ];

                return response()->json($response, 200);
            } else {
                throw new \Exception('Resource not found');
            }
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $news = news::find($id);

            if ($news) {
                $response = [
                    'message' => 'Resource is added successfully',
                    'data' => $news->update($request->all()),
                ];

                return response()->json($response, 200);
            } else {
                throw new \Exception('Resource not found');
            }
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $news = news::find($id);

            if ($news) {
                $response = [
                    'message' => 'Resource is delete successfully',
                    'data' => $news->delete(),
                ];

                return response()->json($response, 200);
            } else {
                throw new \Exception('Data not found');
            }
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 404);
        }
    }
}
