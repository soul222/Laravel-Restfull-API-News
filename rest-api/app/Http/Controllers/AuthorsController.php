<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authors;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mendapat semua Data Author
     */
    public function index()
    {
        try {
            $authors = authors::all();

            if (!$authors->isEmpty()) {
                $response = [
                    'message' => 'Get all resource',
                    'data' => $authors,
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
            $authors = authors::create($request->all());

            $response = [
                'message' => 'Resource create is successfully',
                'data' => $authors,
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
            $authors = authors::find($id);

            if ($authors) {
                $response = [
                    'message' => 'Resource detail is successfully',
                    'data' => $authors,
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
            $authors = authors::find($id);

            if ($authors) {
                $response = [
                    'message' => 'Author is updated',
                    'data' => $authors->update($request->all()),
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
            $authors = authors::find($id);

            if ($authors) {
                $response = [
                    'message' => 'Resource delete is successfully',
                    'data' => $authors->delete(),
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
