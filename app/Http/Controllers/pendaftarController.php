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
        $request->validate(
            [
                'id_user' => 'required|unique:pendaftar,id_user',
                'nama_lengkap' => 'required|string|max:255',
                'tetala' => 'required|date',
                'email' => 'required|email|unique:pendaftar,email',
                'password' => 'required|string|min:4',
                'instansi' => 'required|string|max:255',
                'status' => 'nullable|string',
                'surat' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            ],
            [
                'id_user.required' => 'ID User wajib diisi.',
                'id_user.unique' => 'ID User sudah digunakan.',
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
                'tetala.required' => 'Tanggal Lahir wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 4 karakter.',
                'instansi.required' => 'Instansi wajib diisi.',
                'status.string' => 'Status harus berupa teks.',
                'surat.file' => 'Surat harus berupa file yang valid.',
                'surat.mimes' => 'Surat harus berformat pdf, doc, docx, jpg, jpeg, atau png.',
                'surat.max' => 'Ukuran file surat maksimal 2MB.',
            ]
        );

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
        $pendaftar = pendaftar::where('email', $id)->first();
        return view('Pendaftar.edituser')->with('pendaftar', $pendaftar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pendaftar)
    {
        // Validasi input
        $request->validate([
            'id_user'      => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tetala'       => 'required|date',
            'instansi'     => 'required|string|max:255',
            'email'        => 'required|email',
            'password'     => 'nullable|min:6', // opsional, hanya jika ingin ganti password
            'status'       => 'required|in:pending,diterima,ditolak',
            'surat'        => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Data yang akan diupdate
        $data = [
            'id_user'      => $request->id_user,
            'nama_lengkap' => $request->nama_lengkap,
            'tetala'       => $request->tetala,
            'instansi'     => $request->instansi,
            'email'        => $request->email,
            'status'       => $request->status,
        ];

        // Jika password diisi, tambahkan ke data
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Jika ada file surat baru, simpan
        if ($request->hasFile('surat')) {
            $fileName = time() . '_' . $request->surat->getClientOriginalName();
            $request->surat->move(public_path('uploads/surat'), $fileName);
            $data['surat'] = $fileName;
        }

        Pendaftar::where('email', $request->email)->update($data);
        return redirect()->route('pendaftar.index')->with('success', 'Data pendaftar berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $pendaftar = pendaftar::where('email', $email)->first();
        $pendaftar->delete();
        return redirect()
            ->route('pendaftar.index')
            ->with('success', 'Pendaftar berhasil dihapus');
    }
}
