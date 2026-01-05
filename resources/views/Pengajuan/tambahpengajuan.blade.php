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
        <form method="POST" action="{{ route('pengajuan.store') }}">
            @csrf

            <h6 class="mb-4">Tambah Pengajuan</h6>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Pendaftar --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Pilih Mahasiswa</label>
                    <select name="id_user" id="pendaftar_select"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('id_user') border-red-500 @enderror"
                        required>
                        <option value="">-- Pilih Mahasiswa --</option>
                        @foreach ($pendaftar as $p)
                            <option value="{{ $p->id_user }}" data-nama="{{ $p->nama_lengkap }}"
                                data-email="{{ $p->email }}"
                                data-tetala="{{ $p->tetala ? \Carbon\Carbon::parse($p->tetala)->format('Y-m-d') : '' }}"
                                data-instansi="{{ $p->instansi }}" data-alamat="{{ $p->alamat }}"
                                {{ old('id_user') == $p->id_user ? 'selected' : '' }}>
                                {{ $p->nama_lengkap }} - {{ $p->email }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Email</label>
                    <input type="email" id="email" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Tanggal Lahir</label>
                    <input type="date" id="tetala" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>

                {{-- Instansi --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Instansi</label>
                    <input type="text" id="instansi" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Alamat</label>
                    <textarea id="alamat" readonly class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100" rows="3"></textarea>
                </div>

                {{-- Beasiswa --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Beasiswa yang Dipilih</label>
                    <select name="beasiswa_id" id="beasiswa_select"
                        class="w-full px-3 py-2 text-sm border rounded-lg @error('beasiswa_id') border-red-500 @enderror"
                        required>
                        <option value="">-- Pilih Beasiswa --</option>
                        @foreach ($beasiswa as $b)
                            <option value="{{ $b->id }}" data-penyedia="{{ $b->penyedia }}"
                                data-deadline="{{ $b->deadline ? $b->deadline->format('d/m/Y') : '' }}"
                                {{ old('beasiswa_id') == $b->id ? 'selected' : '' }}>
                                {{ $b->nama_beasiswa }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Penyedia --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Penyedia</label>
                    <input type="text" id="penyedia" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>

                {{-- Deadline --}}
                <div>
                    <label class="block mb-1 text-xs font-semibold text-slate-600">Deadline</label>
                    <input type="text" id="deadline" readonly
                        class="w-full px-3 py-2 text-sm border rounded-lg bg-gray-100">
                </div>
            </div>

            <script>
                document.getElementById('pendaftar_select').addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const nama = selectedOption.getAttribute('data-nama');
                    const email = selectedOption.getAttribute('data-email');
                    const tetala = selectedOption.getAttribute('data-tetala');
                    const instansi = selectedOption.getAttribute('data-instansi');
                    const alamat = selectedOption.getAttribute('data-alamat');

                    document.getElementById('nama_lengkap').value = nama || '';
                    document.getElementById('email').value = email || '';
                    document.getElementById('tetala').value = tetala || '';
                    document.getElementById('instansi').value = instansi || '';
                    document.getElementById('alamat').value = alamat || '';
                });

                document.getElementById('beasiswa_select').addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const penyedia = selectedOption.getAttribute('data-penyedia');
                    const deadline = selectedOption.getAttribute('data-deadline');

                    document.getElementById('penyedia').value = penyedia || '';
                    document.getElementById('deadline').value = deadline || '';
                });
            </script>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="window.location='{{ route('pengajuan.index') }}'"
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
