<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            // Mendapatkan nilai pencarian dari parameter 'search' pada URL
            $query = $request->input('search');

            // Melakukan pencarian berdasarkan judul atau kategori jika ada nilai pencarian
            $news = News::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%")
                             ->orWhereHas('category', function ($categoryQuery) use ($query) {
                                 $categoryQuery->where('name', 'like', "%$query%");
                             });
            })->with('author', 'category')->get();

            // Jika hasil pencarian kosong, lempar exception dengan pesan yang sesuai
            if ($news->isEmpty()) {
                $message = $query ? "Data not found for the search: $query" : 'Data Empty';
                throw new \Exception($message);
            }

            // Menyiapkan pesan berdasarkan apakah ada pencarian atau tidak
            $searchMessage = $query ? "Resource search for '$query' is successful" : 'Get all resource';

            // Menyiapkan respons JSON dengan pesan dan data berita
            $response = [
                'message' => $searchMessage,
                'data' => $news,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap pesannya dan kirimkan sebagai respons JSON
            $response = [
                'message' => $e->getMessage(),
            ];

            return response()->json($response, 200);
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
            // Validasi data yang diterima dari permintaan
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

            // Membuat berita baru dan menyimpannya ke dalam database
            $news = News::create($data);

            // Memuat informasi penulis dan kategori
            $news->load('author', 'category');

            // Menyiapkan respons JSON dengan pesan dan data berita yang baru dibuat
            $response = [
                'message' => 'Resource is added successfully',
                'data' => $news,
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
            // Menemukan berita berdasarkan ID
            $news = News::find($id);

            // Jika berita ditemukan, siapkan respons JSON dengan pesan dan data berita
            if ($news) {
                $response = [
                    'message' => 'Get detail resource',
                    'data' => $news,
                ];

                return response()->json($response, 200);
            } else {
                // Jika berita tidak ditemukan, lempar exception dengan pesan 'Resource not found'
                throw new \Exception('Resource not found');
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
     */
    public function update(Request $request, string $id)
    {
        try {
            // menemukan berita bedasarkan id
            $news = news::find($id);
// Jika berita ditemukan, siapkan respons JSON dengan pesan dan data berita diperbarui
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
            // menemukan berita bedasarkan id
            $news = news::find($id);
// Jika berita ditemukan, siapkan respons JSON dengan pesan dan data berita dihapus
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
