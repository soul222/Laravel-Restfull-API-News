<?php

namespace App\Http\Controllers;
use App\Models\categories;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = categories::all();

            if (!$categories->isEmpty()) {
                $response = [
                    'message' => 'Get All Resource',
                    'data' => $categories,
                ];
                return response()->json($response, 200);
            } else {
                throw new \Exception('Data empty');
            }
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categories = categories::create($request->all());

            $response = [
                'message' => 'Resource create is successfully',
                'data' => $categories,
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
            $categories = categories::find($id);

            if ($categories) {
                $response = [
                    'message' => 'Resource detail is successfully',
                    'data' => $categories,
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categories = categories::find($id);

            if ($categories) {
                $response = [
                    'message' => 'Resource update is successfully',
                    'data' => $categories->update($request->all()),
                ];

                return response()->json($response, 200);
            } else {
                throw new \Exception('Data not found');
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
            $categories = categories::find($id);

            if ($categories) {
                $response = [
                    'message' => 'Resource delete is successfully',
                    'data' => $categories->delete(),
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
