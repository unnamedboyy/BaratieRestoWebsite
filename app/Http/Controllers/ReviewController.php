<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::paginate(15);  // Mengambil semua data reservasi beserta relasi meja dan user
        return view('admin.review.index', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'note' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'id_menu' => 'required|exists:menus,id',
            'id_user' => 'required|exists:users,id',
        ]);

        $review = Review::create($validatedData); // Membuat review baru

        return response()->json(['message' => 'Review created successfully', 'review' => $review], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        $review->load(['menu', 'user']); // Memuat relasi menu dan user
        return response()->json($review); // Mengembalikan data review berdasarkan ID
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'note' => 'nullable|string',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'id_menu' => 'sometimes|required|exists:menus,id',
            'id_user' => 'sometimes|required|exists:users,id',
        ]);

        $review->update($validatedData); // Memperbarui data review

        return response()->json(['message' => 'Review updated successfully', 'review' => $review]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete(); // Menghapus review

        return response()->json(['message' => 'Review deleted successfully']);
    }
}
