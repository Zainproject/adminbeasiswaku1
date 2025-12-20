<?php

namespace App\Http\Controllers;

use App\Models\pendaftar;
use Illuminate\Http\Request;

class pendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = pendaftar::paginate(7);
        return view('Pendaftar.user', compact('pendaftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pendaftar.tambahuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|unique:pendaftar,id_user',
            'nama_lengkap' => 'required|string|max:255',
            'tetala' => 'required|date',
            'email' => 'required|email|unique:pendaftar,email',
            'password' => 'required|string|min:4',
            'instansi' => 'required|string|max:255',
            'status' => 'nullable|string',
            'surat' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        // === Tempat untuk file Foto===
        $suratPath = null;

        if ($request->hasFile('surat')) {
            $suratPath = $request->file('surat')->store('surat', 'public');
        }

        pendaftar::create([
            'id_user' => $request->id_user,
            'nama_lengkap' => $request->nama_lengkap,
            'tetala' => $request->tetala,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'instansi' => $request->instansi,
            'status' => $request->status,
            'surat' => $suratPath,
        ]);

        return redirect()
            ->route('pendaftar.index')
            ->with('success', 'Pendaftar berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
