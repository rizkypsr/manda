@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7 py-8 px-2">
        <div class="hidden md:block text-2xl">Guru</div>
        @if ($message = Session::get('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="rounded-lg shadow-md p-5">
            <a href="{{ route('guru.create') }}"
                class="w-28 px-6 pt-2.5 pb-2 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <div>Tambah</div>
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            NIP
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Nama Guru
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Mata Pelajaran
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Tahun Bertugas
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guru as $g)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $g->id }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $g->nama_guru }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ strtoupper($g->status) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $g->mapel->nama_mapel }}
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $g->thn_bertugas }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex space-x-3">
                                                <div>
                                                    <a href="{{ route('guru.edit', $g->id) }}"
                                                        class="flex justify-center items-center rounded-full bg-blue-600 text-white leading-normal uppercase hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>

                                                <form action="{{ route('guru.destroy', $g->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="inline-block rounded-full bg-red-600 text-white leading-normal uppercase hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
@endsection
