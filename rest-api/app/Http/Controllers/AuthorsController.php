<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authors;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Mendapatkan semua data penulis (authors)
            $authors = authors::all();

            // Jika data penulis tidak kosong, siapkan respons JSON dengan pesan dan data penulis
            if (!$authors->isEmpty()) {
                $response = [
                    'message' => 'Get all resource',
                    'data' => $authors,
                ];
                return response()->json($response, 200);
            } else {
                // Jika data penulis kosong, lempar exception dengan pesan 'Data empty'
                throw new \Exception('Data empty');
            }
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap pesannya dan kirimkan sebagai respons JSON
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Membuat penulis baru dan menyimpannya ke dalam database
            $authors = authors::create($request->all());

            // Menyiapkan respons JSON dengan pesan dan data penulis yang baru dibuat
            $response = [
                'message' => 'Resource create is successfully',
                'data' => $authors,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap pesannya dan kirimkan sebagai respons JSON
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            // Menemukan penulis berdasarkan ID
            $authors = authors::find($id);

            // Jika penulis ditemukan, siapkan respons JSON dengan pesan dan data penulis
            if ($authors) {
                $response = [
                    'message' => 'Resource detail is successfully',
                    'data' => $authors,
                ];

                return response()->json($response, 200);
            } else {
                // Jika penulis tidak ditemukan, lempar exception dengan pesan 'Data not found'
                throw new \Exception('Data not found');
            }
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap pesannya dan kirimkan sebagai respons JSON
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        try {
            // Menemukan penulis berdasarkan ID
            $authors = authors::find($id);

            // Jika penulis ditemukan, siapkan respons JSON dengan pesan dan data penulis yang diperbarui
            if ($authors) {
                $response = [
                    'message' => 'Author is updated',
                    'data' => $authors->update($request->all()),
                ];

                return response()->json($response, 200);
            } else {
                // Jika penulis tidak ditemukan, lempar exception dengan pesan 'Data not found'
                throw new \Exception('Data not found');
            }
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap pesannya dan kirimkan sebagai respons JSON
            $response = [
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        try {
            // Menemukan penulis berdasarkan ID
            $authors = authors::find($id);

            // Jika penulis ditemukan, siapkan respons JSON dengan pesan dan data penulis yang dihapus
            if ($authors) {
                $response = [
                    'message' => 'Resource delete is successfully',
                    'data' => $authors->delete(),
                ];

                return response()->json($response, 200);
            } else {
                // Jika penulis tidak ditemukan, lempar exception dengan pesan 'Data not found'
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
