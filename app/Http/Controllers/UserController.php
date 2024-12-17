<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->paginate(5); // Mengambil semua data user
        return view('admin.user.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function create()
     {
         return view('admin.user.create');
     }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gambar' => 'required|image|max:5000',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $fileName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('public/images/'), $fileName);
            $validatedData['gambar'] = 'public/images/' . $fileName;
        }

        $user = User::create($validatedData); // Membuat pengguna baru

        try {
            $user = User::latest()->paginate(5); // Mengambil semua data user
            return view('admin.user.index', compact('user'));
        } catch (\Exception $e) {
            $user = User::latest()->paginate(5); // Mengambil semua data user
            return view('admin.user.index', compact('user'));
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gambar' => 'required|image|max:5000',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $fileName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('public/images/'), $fileName);
            $validatedData['gambar'] = 'public/images/' . $fileName;
        }

        $user = User::create($validatedData); // Membuat pengguna baru

        try {
            return view('web/login');
        } catch (\Exception $e) {
            return view('web/resgister');
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $cekLogin = $request->only('email', 'password');

        if (Auth::attempt($cekLogin)) {
            $request->session()->regenerate();
            return redirect()->intended('web/home');;
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user dari sesi
        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Regenerate token CSRF
    
        return redirect('web/login')->with('success', 'Logout berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user); // Mengembalikan data pengguna berdasarkan ID
    }

    /**
     * Update the specified resource in storage.
     */

     public function edit($id)
     {
         $user = user::find($id);
         return view('admin.user.edit', compact('user'));
     }

     public function update(Request $request, $id)
     {
         // Ambil data user yang akan diupdate
         $user = User::findOrFail($id);
     
         // Validasi input, email dan gambar bersifat opsional
         $validatedData = $request->validate([
             'nama_pelanggan' => 'required|string|max:255',
             'telepon' => 'required|string|max:15',
             'email' => 'required|string|email|unique:users,email,' . $user->id, // Abaikan email user saat ini
             'password' => 'nullable|string|min:8', // Password tidak wajib diisi
             'gambar' => 'nullable|image|max:5000', // Gambar tidak wajib diunggah
         ]);
     
         // Update gambar jika ada file baru diunggah
         if ($request->hasFile('gambar')) {
             $gambar = $request->file('gambar');
             $fileName = time() . '_' . $gambar->getClientOriginalName();
             $gambar->move(public_path('public/images/'), $fileName);
     
             // Hapus gambar lama jika ada
             if ($user->gambar && file_exists(public_path($user->gambar))) {
                 unlink(public_path($user->gambar));
             }
     
             $validatedData['gambar'] = 'public/images/' . $fileName;
         }
     
         // Update password hanya jika diisi
         if ($request->filled('password')) {
             $validatedData['password'] = bcrypt($request->password);
         } else {
             unset($validatedData['password']);
         }
     
         // Update data user
         $user->update($validatedData);
     
         return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui');
     }
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete(); // Menghapus user
        try {
            $user = User::latest()->paginate(5); // Mengambil semua data user
            return view('admin.user.index', compact('user'));
        } catch (\Exception $e) {
            $user = User::latest()->paginate(5); // Mengambil semua data user
            return view('admin.user.index', compact('user'));
        }
    }

    /**
     * Display reservations for the specified user.
     */
    public function getReservations(User $user)
    {
        $reservations = $user->reservasi; // Mengambil data reservasi yang terkait
        return response()->json($reservations);
    }

    /**
     * Display reviews for the specified user.
     */
    public function getReviews(User $user)
    {
        $reviews = $user->reviw; // Mengambil data review yang terkait
        return response()->json($reviews);
    }
}
