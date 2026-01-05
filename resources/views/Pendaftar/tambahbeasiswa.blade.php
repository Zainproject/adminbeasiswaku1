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
        <form method="POST" action="{{ url('beasiswa') }}" enctype="multipart/form-data">
            @csrf

            <h6 class="mb-4">Tambah Beasiswa</h6>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Penyedia --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Penyedia</label>
                    <input type="text" name="penyedia" value="{{ old('penyedia') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('penyedia') border-red-500 @enderror">
                </div>

                {{-- Nama Beasiswa --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Nama Beasiswa</label>
                    <input type="text" name="nama_beasiswa" value="{{ old('nama_beasiswa') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('nama_beasiswa') border-red-500 @enderror">
                </div>

                {{-- Deadline --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Deadline</label>
                    <input type="date" name="deadline" value="{{ old('deadline') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('deadline') border-red-500 @enderror">
                </div>

                {{-- Status --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Status</label>
                    <select name="status"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('status') border-red-500 @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('email') border-red-500 @enderror">
                </div>

                {{-- Password --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Password</label>
                    <input type="password" name="password"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('password') border-red-500 @enderror">
                </div>

                {{-- Deskripsi --}}
                <div class="md:col-span-2">
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="window.location='{{ route('pendaftar.index') }}'"
                    class="px-6 py-2 text-xs font-bold uppercase text-slate-500 border rounded-lg hover:bg-slate-100">
                    Batal
                </button>
                <button type="submit"
                    class="px-6 py-2 text-xs font-bold uppercase text-white bg-fuchsia-500 rounded-lg hover:bg-fuchsia-600">
                    Simpan
                </button>
            </div>
        </form>

        {{-- SweetAlert Error Handling --}}
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    html: `
                <ul style="text-align:center;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
                }).then(() => {
                    // Fokus ke field pertama yang error
                    @php
                        $firstErrorField = array_key_first($errors->toArray());
                    @endphp
                    document.getElementsByName('{{ $firstErrorField }}')[0]?.focus();
                });
            </script>
        @endif
    </main>
@endsection
