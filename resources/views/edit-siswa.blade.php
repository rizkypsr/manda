@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7">
        <div class="hidden md:block text-2xl">Ubah Siswa</div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div>
                            <label for="nisn" class="block text-sm font-medium text-gray-700">
                                NISN
                            </label>
                            <input type="number" name="nisn" id="nisn" value="{{ $siswa->id }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">
                                Nama Guru
                            </label>
                            <input type="text" name="nama_siswa" id="nama" value="{{ $siswa->nama_siswa }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="jurusan_id" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select id="jurusan_id" name="jurusan_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($jurusan as $j)
                                    <option {{ $siswa->jurusan->id == $j->id ? 'selected' : '' }}
                                        value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="kelas_id" name="kelas_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($kelas as $k)
                                    <option {{ $siswa->kelas->id == $k->id ? 'selected' : '' }}
                                        value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="angkatan" class="block text-sm font-medium text-gray-700">
                                Angkatan
                            </label>
                            <input type="number" name="angkatan" id="angkatan" value="{{ $siswa->angkatan }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
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
