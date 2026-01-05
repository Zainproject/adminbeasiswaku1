<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftar;
use App\Models\beasiswa;
use App\Models\Pengajuan;

class pengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::with(['pendaftar', 'beasiswa'])->get();
        return view('Pengajuan.userpengajuan', compact('pengajuan'));
    }

    public function create()
    {
        $beasiswa = beasiswa::all();
        $pendaftar = pendaftar::all();
        return view('Pengajuan.tambahpengajuan', compact('beasiswa', 'pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:pendaftar,id_user',
            'beasiswa_id' => 'required|exists:beasiswa,id',
        ]);

        // Create pengajuan with existing pendaftar
        Pengajuan::create([
            'id_user' => $request->id_user,
            'beasiswa_id' => $request->beasiswa_id,
            'status_id' => 1, // pending
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan created successfully');
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with(['pendaftar', 'beasiswa'])->findOrFail($id);
        return view('Pengajuan.show', compact('pengajuan'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $beasiswa = beasiswa::all();
        return view('Pengajuan.edit', compact('pengajuan', 'beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tetala' => 'required|date',
            'instansi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'beasiswa_id' => 'required|exists:beasiswa,id',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pendaftar = $pengajuan->pendaftar;

        // Update pendaftar data
        $pendaftar->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'tetala' => $request->tetala,
            'instansi' => $request->instansi,
            'alamat' => $request->alamat,
        ]);

        // Update pengajuan data
        $pengajuan->update([
            'beasiswa_id' => $request->beasiswa_id,
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan updated successfully');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan deleted successfully');
    }
}
