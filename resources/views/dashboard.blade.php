@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-7 py-8 px-2">
        <div class="hidden md:block text-2xl">Dashboard</div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($informasi as $info)
                <div
                    class="rounded overflow-hidden shadow-md cursor-pointer lg:hover:shadow-xl transition ease-in-out delay-100">
                    <img class="w-full" src="{{ Storage::url($info->foto) }}" alt="Banner">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 lg:text-lg">{{ $info->jdl_informasi }}</div>
                        <p class="text-gray-700 text-base lg:text-sm line-clamp-3">
                            {{ $info->deskripsi }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid gap-4 lg:grid-flow-col">
            <div class="lg:max-w-xs rounded-xl overflow-hidden shadow-sm bg-cyan-200 px-5 py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-chalkboard-teacher rounded-xl p-4 bg-cyan-100"></i>
                    <div>
                        <p class="text-base">Guru</p>
                        <p class="text-sm font-extrabold">{{ $guru }} Orang</p>
                    </div>
                </div>
            </div>
            <div class="lg:max-w-xs rounded-xl overflow-hidden shadow-sm bg-sky-200 px-5 py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-chalkboard-teacher rounded-xl p-4 bg-sky-100"></i>
                    <div>
                        <p class="text-base">Mata Pelajaran</p>
                        <p class="text-sm font-extrabold">{{ $mapel }} Pelajaran</p>
                    </div>
                </div>
            </div>
            <div class="lg:max-w-xs rounded-xl overflow-hidden shadow-sm bg-indigo-200 px-5 py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-chalkboard-teacher rounded-xl p-4 bg-indigo-100"></i>
                    <div>
                        <p class="text-base">Siswa</p>
                        <p class="text-sm font-extrabold">{{ $siswa }} Orang</p>
                    </div>
                </div>
            </div>
            <div class="lg:max-w-xs rounded-xl overflow-hidden shadow-sm bg-rose-200 px-5 py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-chalkboard-teacher rounded-xl p-4 bg-rose-100"></i>
                    <div>
                        <p class="text-base">Kelas</p>
                        <p class="text-sm font-extrabold">{{ $kelas }} Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
