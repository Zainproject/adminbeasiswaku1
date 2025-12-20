@extends('index')
@section('main1')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="true">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                            aria-current="page">Tables</li>
                    </ol>
                    <h6 class="mb-0 font-bold capitalize">Tables</h6>
                </nav>
            </div>
        </nav>
        <form method="POST" action="{{ url('pendaftar') }}" enctype="multipart/form-data">
            @csrf

            <h6 class="mb-4">Tambah Pendaftar</h6>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- ID User --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">ID User</label>
                    <input type="text" name="id_user" value="{{ old('id_user') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('id_user') border-red-500 @enderror">

                    @error('id_user')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('nama_lengkap') border-red-500 @enderror">

                    @error('nama_lengkap')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Tanggal Lahir</label>
                    <input type="date" name="tetala" value="{{ old('tetala') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('tetala') border-red-500 @enderror">

                    @error('tetala')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instansi --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Instansi</label>
                    <input type="text" name="instansi" value="{{ old('instansi') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('instansi') border-red-500 @enderror">

                    @error('instansi')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Password</label>

                    <div
                        class="relative flex items-center border rounded-lg
                @error('password') border-red-500 @enderror">
                        <input type="password" name="password"
                            class="w-full px-3 py-2 text-sm border-0 rounded-lg focus:outline-none">
                    </div>

                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Status</label>
                    <select name="status"
                        class="w-full px-3 py-2 text-sm border rounded-lg
                @error('status') border-red-500 @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>

                    @error('status')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Surat Permohonan --}}
                <div class="md:col-span-2">
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Surat</label>
                    <input type="file" name="surat"
                        class="w-full text-sm
                @error('surat') border-red-500 @enderror">

                    @error('surat')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-6">
                <button type="reset"
                    class="px-6 py-2 text-xs font-bold uppercase text-slate-500 border rounded-lg hover:bg-slate-100">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2 text-xs font-bold uppercase text-white bg-fuchsia-500 rounded-lg hover:bg-fuchsia-600">
                    Simpan
                </button>
            </div>
        </form>

    </main>
@endsection
