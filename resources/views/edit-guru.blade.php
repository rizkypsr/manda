@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7">
        <div class="hidden md:block text-2xl">Ubah Guru</div>
        @if ($message = Session::get('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div>
                            <label for="nip" class="block text-sm font-medium text-gray-700">
                                NIP
                            </label>
                            <input type="number" name="nip" id="nip" value="{{ $guru->id }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">
                                Nama Guru
                            </label>
                            <input type="text" name="nama_guru" id="nama" value="{{ $guru->nama_guru }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option {{ $guru->status == 'pns' ? 'selected' : '' }} value="pns">PNS</option>
                                <option {{ $guru->status == 'honorer' ? 'selected' : '' }} value="honorer">Honorer
                                </option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="mapel_id" class="block text-sm font-medium text-gray-700"> Mata Pelajaran</label>
                            <select id="mapel_id" name="mapel_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($mapel as $mp)
                                    <option {{ $guru->mapel_id == $mp->id ? 'selected' : '' }}
                                        value="{{ $mp->id }}">{{ $mp->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="thn_ajaran" class="block text-sm font-medium text-gray-700">
                                Tahun Bertugas
                            </label>
                            <input type="number" name="thn_bertugas" id="thn_bertugas" value="{{ $guru->thn_bertugas }}"
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
