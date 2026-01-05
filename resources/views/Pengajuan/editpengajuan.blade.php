@extends('index')
@section('main1')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <div class="w-full px-6 py-6 mx-auto">
            <!-- content -->

            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 lg:w-2/3 lg:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="mb-0">Edit Pengajuan Beasiswa</h6>
                        </div>
                        <div class="flex-auto p-4 pt-6">
                            <form method="POST" action="{{ route('pengajuan.update', $pengajuan->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap"
                                        value="{{ $pengajuan->pendaftar->nama_lengkap }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ $pengajuan->pendaftar->email }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="tetala" value="{{ $pengajuan->pendaftar->tetala }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Instansi</label>
                                    <input type="text" name="instansi" value="{{ $pengajuan->pendaftar->instansi }}"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <textarea name="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ $pengajuan->pendaftar->alamat }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Beasiswa yang Dipilih</label>
                                    <select name="beasiswa_id"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        @foreach ($beasiswa as $b)
                                            <option value="{{ $b->id }}"
                                                {{ $pengajuan->beasiswa_id == $b->id ? 'selected' : '' }}>
                                                {{ $b->nama_beasiswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
