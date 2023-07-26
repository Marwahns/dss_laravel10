@extends('layout.main')

@section('title')
<title>{{ $pageTitle }}</title>
@endsection

@section('breadcrumb')
<nav>
    <!-- breadcrumb -->
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        <li class="text-sm leading-normal">
            <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
        </li>
        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{{ $breadcrumb }}</li>
    </ol>
    <h6 class="mb-0 font-bold capitalize">{{ $breadcrumb }}</h6>
</nav>
@endsection

@section('content')
<!-- table -->
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                            <h6 class="mb-0" id="SubTitle">Alternative Table</h6>
                        </div>
                        <div class="flex-none w-1/2 max-w-full px-3 text-right">
                            <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="inline-block text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="BtnAdd"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Data
                            </button>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <!-- Nomor -->
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        #
                                    </th>

                                    <!-- Kode Alternative -->
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Kode</th>

                                    <!-- Nama Alternative -->
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alternative</th>

                                    <!-- Action -->
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @forelse ($alternatives as $alternative)
                                <tr>
                                    <!-- Nomor -->
                                    <td class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
                                    </td>

                                    <!-- Kode Alternative -->
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    {{ $alternative->kode_alternative }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Nama Alternative -->
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    {{ $alternative->nama_alternative }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Action -->
                                    <td class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                        <button class="inline-block px-6 py-3 mb-0 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar{{$alternative->id}}">
                                            <i class="text-xs leading-tight fa fa-ellipsis-v"></i>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownNavbar{{$alternative->id}}" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-24 dark:bg-white">
                                            {{-- <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                                        aria-labelledby="dropdownLargeButton">
                                                        <li>

                                                        </li>
                                                        <li>

                                                        </li>
                                                        <li>

                                                        </li>
                                                    </ul> --}}

                                            <div class="btn-group">
                                                <button type="button" class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black viewbtn" id="BtnShow" data-modal-target="view-modal{{$alternative->id}}" data-modal-toggle="view-modal{{$alternative->id}}" value="{{ $alternative->id }}">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </button>

                                                <button type="button" class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black mx-2 editbtn" id="BtnEdit" data-modal-target="#edit-modal{{ $alternative->id }}" data-modal-toggle="edit-modal{{ $alternative->id }}" value="{{ $alternative->id }}">
                                                    <i class="fa fa-solid fa-edit"></i>
                                                </button>

                                                <button type="button" class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black" data-modal-target="#delete-modal{{ $alternative->id }}" data-modal-toggle="delete-modal{{ $alternative->id }}">
                                                    <i class="fa fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- <div class="btn-group">
                                                    <button type="button"
                                                        class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black viewbtn"
                                                        id="BtnShow" 
                                                        data-modal-target="view-modal{{$alternative->id}}"
                                        data-modal-toggle="view-modal{{$alternative->id}}"
                                        value="{{ $alternative->id }}">
                                        <i class="fa fa-solid fa-eye"></i>
                                        </button>

                                        <button type="button" class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black mx-2 editbtn" id="BtnEdit" data-modal-target="#edit-modal{{ $alternative->id }}" data-modal-toggle="edit-modal{{ $alternative->id }}" value="{{ $alternative->id }}">
                                            <i class="fa fa-solid fa-edit"></i>
                                        </button>

                                        <button type="button" class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black" data-modal-target="#delete-modal{{ $alternative->id }}" data-modal-toggle="delete-modal{{ $alternative->id }}">
                                            <i class="fa fa-solid fa-trash"></i>
                                        </button>
                    </div> --}}
                    </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger flex justify-center">
                        Data Alternative belum Tersedia.
                    </div>
                    @endforelse
                    </tbody>
                    </table>
                    {{ $alternatives->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('alternative.modal')

<footer class="pt-4">
    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                    ©
                    <script>
                        document.write(new Date().getFullYear() + ",");
                    </script>
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Annisa & Creative Tim</a>
                    for a better web.
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end table -->
@endsection