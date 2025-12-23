<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use Illuminate\Auth\Events\Validated;

class beasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beasiswa = Beasiswa::all();
        return view('Pendaftar.user', compact('beasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pendaftar.tambahbeasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penyedia' => 'required|string|max:255',
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|string|in:active,inactive,closed',
            'email' => 'required|email|unique:beasiswa,email',
            'password' => 'required|string|min:6',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        Beasiswa::create($data);

        return redirect()->route('pendaftar.index')->with('success', 'Beasiswa berhasil ditambahkan');
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
        $beasiswa = Beasiswa::findOrFail($id);
        return view('Pendaftar.editbeasiswa', compact('beasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penyedia' => 'required|string|max:255',
            'nama_beasiswa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|string|in:active,inactive,closed',
            'email' => 'required|email|unique:beasiswa,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($data);

        return redirect()->route('pendaftar.index')->with('success', 'Beasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Beasiswa berhasil dihapus');
    }
}
