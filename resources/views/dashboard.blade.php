@extends('layouts.app')

@section('content')
    {{-- <div class="flex flex-col px-2 py-8 space-y-7">
        <div class="hidden text-2xl md:block">Dashboard</div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($informasi as $info)
                <div
                    class="overflow-hidden transition ease-in-out delay-100 rounded shadow-md cursor-pointer lg:hover:shadow-xl">
                    <img class="w-full" src="{{ Storage::url($info->foto) }}" alt="Banner">
                    <div class="px-6 py-4">
                        <div class="mb-2 text-xl font-bold lg:text-lg">{{ $info->jdl_informasi }}</div>
                        <p class="text-base text-gray-700 lg:text-sm line-clamp-3">
                            {{ $info->deskripsi }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid gap-4 lg:grid-flow-col">
            <div class="px-5 py-4 overflow-hidden shadow-sm lg:max-w-xs rounded-xl bg-cyan-200">
                <div class="flex items-center space-x-3">
                    <i class="p-4 fas fa-chalkboard-teacher rounded-xl bg-cyan-100"></i>
                    <div>
                        <p class="text-base">Guru</p>
                        <p class="text-sm font-extrabold">{{ $guru }} Orang</p>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 overflow-hidden shadow-sm lg:max-w-xs rounded-xl bg-sky-200">
                <div class="flex items-center space-x-3">
                    <i class="p-4 fas fa-chalkboard-teacher rounded-xl bg-sky-100"></i>
                    <div>
                        <p class="text-base">Mata Pelajaran</p>
                        <p class="text-sm font-extrabold">{{ $mapel }} Pelajaran</p>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 overflow-hidden bg-indigo-200 shadow-sm lg:max-w-xs rounded-xl">
                <div class="flex items-center space-x-3">
                    <i class="p-4 bg-indigo-100 fas fa-chalkboard-teacher rounded-xl"></i>
                    <div>
                        <p class="text-base">Siswa</p>
                        <p class="text-sm font-extrabold">{{ $siswa }} Orang</p>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 overflow-hidden shadow-sm lg:max-w-xs rounded-xl bg-rose-200">
                <div class="flex items-center space-x-3">
                    <i class="p-4 fas fa-chalkboard-teacher rounded-xl bg-rose-100"></i>
                    <div>
                        <p class="text-base">Kelas</p>
                        <p class="text-sm font-extrabold">{{ $kelas }} Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="px-8">
        <div class="flex items-center mb-3 space-x-2">
            <div class="text-3xl">Berita Hangat</div>
            <i class="p-2 text-indigo-500 bg-indigo-100 rounded-full animate-pulse fas fa-info-circle"></i>
        </div>
        <div class="flex space-x-10">
            <!-- Slider main container -->
            <div class="bg-indigo-100 swiper rounded-3xl"
                style="margin-left: 0; margin-right: 0; width: 30rem; height: 30rem">

                @if (count($informasi) == 0)
                    <div class="flex items-center justify-center h-full text-2xl font-semibold">
                        Tidak Ada Berita
                    </div>
                @endif
                <!-- Additional required wrapper -->
                <div class="cursor-pointer swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($informasi as $info)
                        <div class="relative flex items-center justify-center swiper-slide">
                            <img class="object-cover h-full" src="{{ Storage::url($info->foto) }}" alt="Profile image" />
                            <div class="absolute w-full h-full bg-gray-900 opacity-40"></div>
                            <div class="absolute text-white right-3 bottom-8 w-72">
                                <h1 class="text-4xl font-semibold ">{{ $info->jdl_informasi }}</h1>
                                <p class="line-clamp-3">{{ $info->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>

            </div>

            <div class="grid grid-cols-2 gap-4 h-min">
                <div
                    class="flex flex-col justify-between w-48 h-40 p-6 transition duration-300 ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 bg-blue-50 hover:bg-gradient-to-br hover:from-fuchsia-400 hover:via-sky-300 hover:to-fuchsia-400 rounded-3xl">
                    <div class="flex items-center justify-center p-2 bg-gray-800 rounded-lg w-7 h-7">
                        <i class="text-white fas fa-child"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">{{ $siswa }}</div>
                        <div>Jumlah Siswa</div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-between w-48 h-40 p-6 transition duration-300 ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 bg-blue-50 hover:bg-gradient-to-br hover:from-fuchsia-400 hover:via-sky-300 hover:to-fuchsia-400 rounded-3xl">
                    <div class="flex items-center justify-center p-2 bg-gray-800 rounded-lg w-7 h-7">
                        <i class="text-white fas fa-chalkboard-teacher"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">{{ $guru }}</div>
                        <div>Jumlah Guru</div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-between w-48 h-40 p-6 transition duration-300 ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 bg-blue-50 hover:bg-gradient-to-br hover:from-fuchsia-400 hover:via-sky-300 hover:to-fuchsia-400 rounded-3xl">
                    <div class="flex items-center justify-center p-2 bg-gray-800 rounded-lg w-7 h-7">
                        <i class="text-white fab fa-accusoft"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">{{ $kelas }}</div>
                        <div>Jumlah Kelas</div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-between w-48 h-40 p-6 transition duration-300 ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 bg-blue-50 hover:bg-gradient-to-br hover:from-fuchsia-400 hover:via-sky-300 hover:to-fuchsia-400 rounded-3xl">
                    <div class="flex items-center justify-center p-2 bg-gray-800 rounded-lg w-7 h-7">
                        <i class="text-white fas fa-book"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold">{{ $mapel }}</div>
                        <div>Jumlah Mapel</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
        });
    </script>
@endsection
