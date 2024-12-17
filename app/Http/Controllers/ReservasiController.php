<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Meja;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::paginate(10);  // Mengambil semua data reservasi beserta relasi meja dan user
        return view('admin.reservasi.index', compact('reservasi'));
    }

    public function create()
    {
        return view('admin.reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'jenis' => 'required|string',
            'tanggal_reservasi' => 'required|date',
            'note' => 'nullable|string',
            'id_user' => 'required|exists:users,id',
        ]);

        // Cek ketersediaan meja berdasarkan jenis
        $jenisMeja = $request->input('jenis');
        $mejaTersedia = Meja::where('jenis', $jenisMeja)
            ->where('status', false)
            ->inRandomOrder()
            ->first(); // Ambil meja tersedia secara acak

            if (!$mejaTersedia) {
                return back()->withErrors(['jenis' => 'Maaf, tidak ada meja tersedia untuk jenis yang dipilih.'])->withInput();
            }
        
            // Simpan data reservasi
            Reservasi::create([
                'id_meja' => $mejaTersedia->id,
                'id_user' => $request->input('id_user'),
                'tanggal_reservasi' => $request->input('tanggal_reservasi'),
                'note' => $request->input('note'),
            ]);




    // Update status meja menjadi tidak tersedia
    $mejaTersedia->update(['status' => false]);

        try {
            $reservasi = Reservasi::latest()->paginate(10); // Mengambil semua data reservasi
            return view('admin.reservasi.index', compact('reservasi'));
        } catch (\Exception $e) {
            $reservasi = Reservasi::latest()->paginate(10); // Mengambil semua data reservasi
            return view('admin.reservasi.index', compact('reservasi'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservasi $reservasi)
    {
        $reservasi->load(['meja', 'user']); // Memuat relasi meja dan user
        return response()->json($reservasi); // Mengembalikan data reservasi berdasarkan ID
    }

    /**
     * Update the specified resource in storage.
     */

     public function edit($id)
     {
         $reservasi = Reservasi::find($id);
         return view('admin.reservasi.edit', compact('reservasi'));
     }

    public function update(Request $request, Reservasi $reservasi)
    {
        $validatedData = $request->validate([
            'tanggal_reservasi' => 'sometimes|required|date',
            'note' => 'nullable|string',
            'id_meja' => 'sometimes|required|exists:mejas,id',
            'id_user' => 'sometimes|required|exists:users,id',
        ]);

        $reservasi->update($validatedData); // Memperbarui data reservasi

        try {
            $reservasi = Reservasi::latest()->paginate(10); // Mengambil semua data reservasi
            return view('admin.reservasi.index', compact('reservasi'));
        } catch (\Exception $e) {
            $reservasi = Reservasi::latest()->paginate(10); // Mengambil semua data reservasi
            return view('admin.reservasi.index', compact('reservasi'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete(); // Menghapus reservasi

        return response()->json(['message' => 'Reservasi deleted successfully']);
    }
}
