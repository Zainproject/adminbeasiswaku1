@extends('index')
@section('main1')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        {{-- ALERT SUKSES --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Data Berhasil Disimpan  !",
                    icon: "success",
                    draggable: true
                });
            </script>
        @endif
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

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                            <span
                                class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                            <input type="text"
                                class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                placeholder="Type here..." />
                        </div>

                    </div>
                </div>
            </div>
        </nav>

        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div
                            class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex items-center justify-between">
                            <h6 class="mb-0">Data Pendaftar</h6>

                            <a class="inline-block px-8 py-2 text-xs font-bold uppercase transition-all bg-transparent border border-solid rounded-lg cursor-pointer border-fuchsia-500 text-fuchsia-500 hover:scale-102 hover:opacity-75 active:bg-fuchsia-500 active:text-white"
                                href="pendaftar/create">
                                Tambah Pendaftar
                            </a>
                        </div>


                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                User</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Instansi</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Alamat</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Completion</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Tanggal Lahir</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Surat</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftar as $item)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <div>
                                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=random&color=fff"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                                alt="{{ $item->nama_lengkap }}" />
                                                        </div>
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal">
                                                                {{ $item->nama_lengkap }}
                                                            </h6>
                                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                {{ $item->email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                                        {{ $item->instansi }}</p>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                                        {{ $item->alamat ?: '-' }}</p>
                                                </td>
                                                <td
                                                    class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    @php
                                                        $completionStatus =
                                                            $item->status == 'diterima' && $item->surat
                                                                ? 'completed'
                                                                : $item->status;
                                                    @endphp
                                                    <span
                                                        class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $completionStatus }}</span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ $item->tetala }}</span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <button
                                                        class="inline-flex items-center justify-center text-slate-400 hover:text-fuchsia-500 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path
                                                                d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <a href="{{ url('pendaftar/' . $item->id . '/edit') }}"
                                                        class="text-xs font-semibold leading-tight text-slate-400">
                                                        Edit
                                                    </a>
                                                    <form onsubmit="return confirm('Apakah anda yakin?')"
                                                        action="{{ route('pendaftar.destroy', $item) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-xs font-semibold leading-tight text-slate-400">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-center mt-8">

                                    <nav class="flex items-center gap-2">

                                        {{-- Previous --}}
                                        @if ($pendaftar->onFirstPage())
                                            <span
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-400 text-fuchsia-400 opacity-40 cursor-not-allowed">
                                                Prev
                                            </span>
                                        @else
                                            <a href="{{ $pendaftar->previousPageUrl() }}"
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-500 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                Prev
                                            </a>
                                        @endif

                                        {{-- Page Numbers --}}
                                        @foreach ($pendaftar->getUrlRange(1, $pendaftar->lastPage()) as $page => $url)
                                            @if ($page == $pendaftar->currentPage())
                                                <span
                                                    class="px-4 py-2 text-sm rounded-full bg-fuchsia-500 text-white shadow-md">
                                                    {{ $page }}
                                                </span>
                                            @else
                                                <a href="{{ $url }}"
                                                    class="px-4 py-2 text-sm rounded-full border border-fuchsia-300 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                    {{ $page }}
                                                </a>
                                            @endif
                                        @endforeach

                                        {{-- Next --}}
                                        @if ($pendaftar->hasMorePages())
                                            <a href="{{ $pendaftar->nextPageUrl() }}"
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-500 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                Next
                                            </a>
                                        @else
                                            <span
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-400 text-fuchsia-400 opacity-40 cursor-not-allowed">
                                                Next
                                            </span>
                                        @endif

                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table 2 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div
                            class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex items-center justify-between">
                            <h6 class="mb-0">Data Beasiswa</h6>

                            <a class="inline-block px-8 py-2 text-xs font-bold uppercase transition-all bg-transparent border border-solid rounded-lg cursor-pointer border-fuchsia-500 text-fuchsia-500 hover:scale-102 hover:opacity-75 active:bg-fuchsia-500 active:text-white"
                                href="beasiswa/create">
                                Tambah Beasiswa
                            </a>
                        </div>


                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Nama Beasiswa</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Penyedia</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Deadline</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Deskripsi</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beasiswa as $item)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <div>
                                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_beasiswa) }}&background=random&color=fff"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                                alt="{{ $item->nama_beasiswa }}" />
                                                        </div>
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal">
                                                                {{ $item->nama_beasiswa }}
                                                            </h6>
                                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                {{ $item->penyedia }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <p class="mb-0 text-xs font-semibold leading-tight">
                                                        {{ $item->penyedia }}</p>
                                                </td>
                                                <td
                                                    class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ $item->deadline_formatted }}</span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ $item->deskripsi ?: '-' }}</span>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <a href="{{ url('beasiswa/' . $item->id . '/edit') }}"
                                                        class="text-xs font-semibold leading-tight text-slate-400">
                                                        Edit
                                                    </a>
                                                    <form onsubmit="return confirm('Apakah anda yakin?')"
                                                        action="{{ url('beasiswa/' . $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-xs font-semibold leading-tight text-slate-400">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-center mt-8">

                                    <nav class="flex items-center gap-2">

                                        {{-- Previous --}}
                                        @if ($beasiswa->onFirstPage())
                                            <span
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-400 text-fuchsia-400 opacity-40 cursor-not-allowed">
                                                Prev
                                            </span>
                                        @else
                                            <a href="{{ $beasiswa->previousPageUrl() }}"
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-500 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                Prev
                                            </a>
                                        @endif

                                        {{-- Page Numbers --}}
                                        @foreach ($beasiswa->getUrlRange(1, $beasiswa->lastPage()) as $page => $url)
                                            @if ($page == $beasiswa->currentPage())
                                                <span
                                                    class="px-4 py-2 text-sm rounded-full bg-fuchsia-500 text-white shadow-md">
                                                    {{ $page }}
                                                </span>
                                            @else
                                                <a href="{{ $url }}"
                                                    class="px-4 py-2 text-sm rounded-full border border-fuchsia-300 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                    {{ $page }}
                                                </a>
                                            @endif
                                        @endforeach

                                        {{-- Next --}}
                                        @if ($beasiswa->hasMorePages())
                                            <a href="{{ $beasiswa->nextPageUrl() }}"
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-500 text-fuchsia-500 transition-all hover:bg-fuchsia-500 hover:text-white hover:shadow-md">
                                                Next
                                            </a>
                                        @else
                                            <span
                                                class="px-4 py-2 text-sm rounded-full border border-fuchsia-400 text-fuchsia-400 opacity-40 cursor-not-allowed">
                                                Next
                                            </span>
                                        @endif

                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card 2 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6>Daftar Mahasiswa Pengajuan</h6>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table
                                    class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Nama Mahasiswa</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Instansi</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Progress</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftar as $item)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2">
                                                        <div>
                                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=random&color=fff"
                                                                class="inline-flex items-center justify-center mr-2 text-sm text-white transition-all duration-200 rounded-full ease-soft-in-out h-9 w-9"
                                                                alt="{{ $item->nama_lengkap }}" />
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm leading-normal">
                                                                {{ $item->nama_lengkap }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <p class="mb-0 text-sm font-semibold leading-normal">
                                                        {{ $item->instansi }}</p>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight">{{ $item->status }}</span>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    @php
                                                        $progress = 0;
                                                        $progressText = '0%';
                                                        if ($item->status == 'pending') {
                                                            $progress = 25;
                                                            $progressText = '25%';
                                                        } elseif ($item->status == 'ditolak') {
                                                            $progress = 50;
                                                            $progressText = '50%';
                                                        } elseif ($item->status == 'diterima') {
                                                            if ($item->surat) {
                                                                $progress = 100;
                                                                $progressText = '100%';
                                                            } else {
                                                                $progress = 75;
                                                                $progressText = '75%';
                                                            }
                                                        }
                                                    @endphp
                                                    <div class="flex items-center justify-center">
                                                        <span
                                                            class="mr-2 text-xs font-semibold leading-tight">{{ $progressText }}</span>
                                                        <div>
                                                            <div
                                                                class="text-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
                                                                <div class="duration-600 ease-soft bg-gradient-to-tl from-blue-600 to-cyan-400 -mt-0.38 -ml-px flex h-1.5 @if ($progress == 0) w-0 @elseif($progress == 25) w-1/4 @elseif($progress == 50) w-1/2 @elseif($progress == 75) w-3/4 @else w-full @endif flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                                                    role="progressbar"
                                                                    aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <button
                                                        class="inline-block px-6 py-3 mb-0 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25 text-slate-400">
                                                        <i class="text-xs leading-tight fa fa-ellipsis-v"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
