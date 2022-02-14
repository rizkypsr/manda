@extends('layouts.app')

@section('content')
    <div class="grid w-full grid-cols-3 gap-4 px-8 pb-8">
        @foreach ($informasi as $index => $info)
            <div class="relative h-56 overflow-hidden bg-blue-50 rounded-3xl">
                <img class="object-cover w-full h-full" src="{{ Storage::url($info->foto) }}" alt="Profile image" />
                <div class="absolute h-full bg-gray-900 w-fit opacity-40"></div>
                <div class="absolute right-0 w-64 text-white bottom-3">
                    <h1 class="text-xl font-semibold ">{{ $info->jdl_informasi }}</h1>
                    <p class="line-clamp-2">{{ $info->deskripsi }}</p>
                </div>
                <div class="absolute dropdown top-4 left-3">
                    <div id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="flex justify-around px-3 py-2 cursor-pointer dropdown-toggle bg-black/20 w-14 backdrop-blur-sm rounded-3xl">
                        <div class="w-2 h-2 rounded-full bg-blue-50"></div>
                        <div class="w-2 h-2 rounded-full bg-blue-50"></div>
                        <div class="w-2 h-2 rounded-full bg-blue-50"></div>
                    </div>
                    <ul class="absolute z-50 hidden float-left m-0 mt-1 overflow-hidden text-base text-left list-none bg-white border-none divide-y rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding"
                        aria-labelledby="dropdownMenuButton1">
                        <li class="flex items-center justify-around px-4 py-3 font-medium text-slate-800 hover:bg-gray-100">
                            <i class="fas fa-trash"></i>
                            <button type="button" class="block w-full px-4 text-sm font-normal edit" data-bs-toggle="modal"
                                data-bs-target="#updateModal" data-id="{{ $info->id }}" >Ubah</button>

                        </li>
                        <li class="flex items-center justify-around px-4 py-3 font-medium text-slate-800 hover:bg-gray-100">
                            <i class="fas fa-pen-square"></i>
                            <form action="{{ route('informasi.destroy', $info->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="w-full px-4 text-sm font-normal">
                                    Hapus</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
        <div class="flex items-center justify-center h-56 cursor-pointer bg-blue-50 rounded-3xl">
            <div data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                class="flex items-center justify-center w-10 h-10 p-2 rounded-full bg-gradient-to-br from-indigo-500 via-fuchsia-400 to-indigo-500">
                <i class="text-white fas fa-plus"></i>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade"
        id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div class="relative pointer-events-none w-fit modal-dialog modal-dialog-centered rounded-3xl">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none shadow-lg outline-none pointer-events-auto rounded-3xl modal-content bg-clip-padding">
                <div class="flex justify-center">
                    <div class="p-1 mt-4 mb-6 rounded-2xl bg-gradient-to-r from-fuchsia-400 to-indigo-500">
                        <div class="px-8 py-2 text-xl font-semibold text-white w-fit rounded-2xl bg-slate-800"
                            id="exampleModalScrollableLabel">
                            Masukan Berita Hari Ini
                        </div>
                    </div>
                </div>
                <button type="button"
                    class="absolute flex items-center justify-center w-4 h-4 p-3 text-red-500 bg-white border-4 border-red-500 rounded-full -top-2 -right-2"
                    data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
                <div class="relative pr-8 modal-body">
                    <form class="flex items-center space-x-10" action="{{ route('informasi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="w-full max-w-sm">
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Judul
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-white border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" name="jdl_informasi" required>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-password">
                                        Deskripsi
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <textarea
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-2 border-gray-200 rounded-lg transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="exampleFormControlTextarea1" rows="3" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Status
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <select
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500 cursor-pointer"
                                        aria-label="Default select example" name="status" required>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-password">
                                        Foto
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500"
                                        type="file" id="formFile" name="foto" required>
                                </div>
                            </div>
                        </div>
                        <button
                            class="flex items-center justify-center w-10 h-10 p-10 text-2xl font-semibold text-white duration-300 ease-in-out delay-75 rounded-full shadow-md cursor-pointer ransition hover:-translate-y-1 hover:scale-110 bg-gradient-to-tr from-fuchsia-400 via-indigo-500 to-fuchsia-400">
                            Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade"
        id="updateModal" tabindex="-1" aria-labelledby="updateModalTitle" aria-modal="true" role="dialog">
        <div class="relative pointer-events-none w-fit modal-dialog modal-dialog-centered rounded-3xl">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none shadow-lg outline-none pointer-events-auto rounded-3xl modal-content bg-clip-padding">
                <div class="flex justify-center">
                    <div class="p-1 mt-4 mb-6 rounded-2xl bg-gradient-to-r from-fuchsia-400 to-indigo-500">
                        <div class="px-8 py-2 text-xl font-semibold text-white w-fit rounded-2xl bg-slate-800"
                            id="exampleModalScrollableLabel">
                            Ubah Berita
                        </div>
                    </div>
                </div>
                <button type="button"
                    class="absolute flex items-center justify-center w-4 h-4 p-3 text-red-500 bg-white border-4 border-red-500 rounded-full -top-2 -right-2"
                    data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
                <div class="relative pr-8 modal-body">
                    <form id="form" class="flex items-center space-x-10" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="w-full max-w-sm">
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="jdl_informasi">
                                        Judul
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-white border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="jdl_informasi" type="text" name="jdl_informasi" required>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="deskripsi">
                                        Deskripsi
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <textarea
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-2 border-gray-200 rounded-lg transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="deskripsi" rows="3" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Status
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <select
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500 cursor-pointer"
                                        aria-label="Default select example" name="status" id="status" required>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-password">
                                        Foto
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500"
                                        type="file" id="formFile" name="foto">
                                </div>
                            </div>
                        </div>
                        <button
                            class="flex items-center justify-center w-10 h-10 p-10 text-2xl font-semibold text-white duration-300 ease-in-out delay-75 rounded-full shadow-md cursor-pointer ransition hover:-translate-y-1 hover:scale-110 bg-gradient-to-tr from-fuchsia-400 via-indigo-500 to-fuchsia-400">
                            Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit').on('click', function(event) {
                event.preventDefault()

                const id = $(this).attr('data-id');
                console.log(id)

                $.get("http://127.0.0.1:8000/informasi/"+id+"/edit", function(data) {
                    $('#jdl_informasi').val(data.data.jdl_informasi);
                    $('#deskripsi').val(data.data.deskripsi);
                    $('#status').val(data.data.status);
                    $('#form').attr('action', "http://127.0.0.1:8000/informasi/"+id);
                })
            })
        })
    </script>
@endsection
