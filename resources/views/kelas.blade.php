@extends('layouts.app')

@section('content')
    {{-- <div class="flex flex-col px-2 py-8 space-y-7">
        <div class="hidden text-2xl md:block">Kelas</div>
        @if ($message = Session::get('success'))
            <div class="px-6 py-5 mb-4 text-base bg-green-100 rounded-lg" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="p-5 rounded-lg shadow-md">
            <a href="{{ route('kelas.create') }}"
                class="w-28 px-6 pt-2.5 pb-2 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <div>Tambah</div>
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            Nama Kelas
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            Semester
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            Jurusan
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            Tahun Ajaran
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $index => $k)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $index + 1 }}</td>
                                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                {{ $k->nama_kelas }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                {{ $k->semester }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                {{ $k->jurusan->nama_jurusan }}
                                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                {{ $k->thn_ajaran }}
                                            </td>
                                            <td
                                                class="flex px-6 py-4 space-x-3 text-sm font-light text-gray-900 whitespace-nowrap">
                                                <div>
                                                    <a href="{{ route('kelas.edit', $k->id) }}"
                                                        class="flex items-center justify-center leading-normal text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded-full hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg w-9 h-9">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>

                                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        class="inline-block leading-normal text-white uppercase transition duration-150 ease-in-out bg-red-600 rounded-full hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg w-9 h-9">
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
    </div> --}}

    <div class="grid w-full grid-cols-3 gap-4 px-8 pb-8">
        @foreach ($kelas as $k)
            <div class="flex flex-col justify-between h-56 px-4 py-6 overflow-hidden bg-gradient-to-br from-fuchsia-400 via-sky-300 to-fuchsia-400 rounded-3xl">
                <div class=" dropdown">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center px-8 text-2xl font-bold text-white h-14 bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-3xl">
                            {{ $k->thn_ajaran }}
                        </div>
                        <a href="{{ route('kelas.detail', $k->id) }}" class="flex items-center justify-center p-2 text-white w-14 h-14 bg-gradient-to-r from-indigo-600 to-indigo-500 rounded-xl">
                            <i class="text-xl fas fa-eye"></i>
                        </a>
                    </div>
                    <ul class="absolute z-50 hidden float-left m-0 mt-1 overflow-hidden text-base text-left list-none bg-white border-none divide-y rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding"
                        aria-labelledby="dropdownMenuButton1">
                        <li class="flex items-center justify-around px-4 py-3 font-medium text-slate-800 hover:bg-gray-100">
                            <i class="fas fa-trash"></i>
                            <button type="button" class="block w-full px-4 text-sm font-normal edit" data-bs-toggle="modal"
                                data-bs-target="#updateModal" data-id="{{ $k->id }}" >Ubah</button>

                        </li>
                        <li class="flex items-center justify-around px-4 py-3 font-medium text-slate-800 hover:bg-gray-100">
                            <i class="fas fa-pen-square"></i>
                            <form action="{{ route('informasi.destroy', $k->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="w-full px-4 text-sm font-normal">
                                    Hapus</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="w-64 text-white bottom-3">
                    <h1 class="text-3xl font-bold ">{{ $k->nama_kelas }}</h1>
                    <p class="text-xl">Semester {{ $k->semester }}</p>
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
                    <form class="flex items-center space-x-10" action="{{ route('kelas.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="w-full max-w-sm">
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Kelas
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input
                                        class="w-full px-4 py-2 leading-tight text-gray-700 bg-white border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
                                        id="inline-full-name" type="text" name="nama_kelas" required>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Semester
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <select
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500 cursor-pointer"
                                        aria-label="Default select example" name="semester" required>
                                        <option value="genap">Genap</option>
                                        <option value="ganjil">Ganjil</option>
                                    </select>
                                </div>
                            </div>
                             <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Jurusan
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <select id="jurusan"
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500 cursor-pointer"
                                        aria-label="Default select example" name="jurusan" required>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 md:flex md:items-center">
                                <div class="md:w-1/3">
                                    <label class="block pr-4 mb-1 md:text-right md:mb-0" for="inline-full-name">
                                        Tahun
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <select
                                        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:outline-none focus:bg-white focus:border-purple-500 cursor-pointer"
                                        aria-label="Default select example" name="thn_ajaran" required>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button
                            class="flex items-center justify-center w-10 h-10 p-10 text-2xl font-semibold text-white duration-300 ease-in-out delay-75 rounded-full shadow-md cursor-pointer ransition hover:-translate-y-1 hover:scale-110 bg-gradient-to-tr from-fuchsia-400 via-indigo-500 to-fuchsia-400">
                            <i class="fas fa-save"></i>
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
            
             $.get("http://127.0.0.1:8000/kelas/create", function(data) {
                    const jurusan = data.data
                
                    $.each(jurusan, function(index, value){
                        $("#jurusan").append($("<option></option>").attr("value", value.id).text(value.nama_jurusan))
                    });    
                })

            $('.edit').on('click', function(event) {
                event.preventDefault()

                const id = $(this).attr('data-id');
                console.log(id)

                $.get("http://127.0.0.1:8000/jurusan/"+id+"/edit", function(data) {
                    $('#jdl_informasi').val(data.data.jdl_informasi);
                    $('#deskripsi').val(data.data.deskripsi);
                    $('#status').val(data.data.status);
                    $('#form').attr('action', "http://127.0.0.1:8000/informasi/"+id);
                })
            })
        })
    </script>
@endsection
