@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7 py-8 px-2">
        <div class="hidden md:block text-2xl">Informasi Sekolah</div>
        @if ($message = Session::get('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="rounded-lg shadow-md p-5">
            <a href="{{ route('informasi.create') }}"
                class="w-28 px-6 pt-2.5 pb-2 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <div>Tambah</div>
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            No
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Judul
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Deskripsi
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informasi as $index => $info)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $info->jdl_informasi }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 w-72 line-clamp-1">
                                                {{ $info->deskripsi }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $info->status == '1' ? 'Aktif' : 'Tidak Aktif' }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex space-x-3">
                                                <div>
                                                    <a href="{{ Storage::url($info->foto) }}" target="_blank"
                                                        class="flex justify-center items-center rounded-full bg-green-600 text-white leading-normal uppercase hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ route('informasi.edit', $info->id) }}"
                                                        class="flex justify-center items-center rounded-full bg-blue-600 text-white leading-normal uppercase hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>

                                                <form action="{{ route('informasi.destroy', $info->id) }}" method="POST">
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
