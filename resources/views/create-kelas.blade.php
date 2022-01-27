@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7  py-8 px-2">
        <div class="hidden md:block text-2xl">Tambah Kelas</div>
        @if ($message = Session::get('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">
                                Nama Kelas
                            </label>
                            <input type="text" name="nama_kelas" id="nama"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div>
                            <label for="semester" class="block text-sm font-medium text-gray-700">
                                Semester
                            </label>
                            <input type="number" name="semester" id="semester"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="thn_ajaran" class="block text-sm font-medium text-gray-700">
                                Tahun Ajaran
                            </label>
                            <input type="number" name="thn_ajaran" id="thn_ajaran"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select id="jurusan" name="jurusan"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
