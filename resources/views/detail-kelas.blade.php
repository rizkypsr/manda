@extends('layouts.app')
@section('content')
    <!--Container-->
    <div class="container w-full px-2 mx-auto">

        <div class="flex justify-between mb-3">
            <div class="px-6 py-3 font-medium text-white rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-400">Kelas
                11 Ipa</div>
            <div></div>
            <div
                class="flex items-center justify-between px-6 py-3 space-x-2 font-medium text-white shadow-md curso r-pointer hover:shadow-lg rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-400">
                <button data-bs-toggle="modal" data-bs-target="#pindahKelas" id="pindahKelasBtn">Pindah Kelas</button>
                <i class="fas fa-angle-double-right"></i>
            </div>
        </div>

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">
            <table id="kelas-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID Siswa</th>
                        <th data-priority="2">Nama Lengkap</th>
                        <th data-priority="3">Jenis Kelamin</th>
                        <th data-priority="4">Nama Ayah</th>
                        <th data-priority="5">Nama Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ strtoupper($s->detail_siswa->jns_kelamin) }}</td>
                            <td>Coming Soon</td>
                            <td>Coming Soon</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->

    {{-- Pindah Kelas Modal --}}
    <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade"
        id="pindahKelas" tabindex="-1" aria-labelledby="pindahKelasTitle" aria-modal="true" role="dialog">
        <div class="relative pointer-events-none w-fit modal-dialog modal-dialog-centered rounded-3xl">
            <div
                class="relative flex flex-col w-full px-10 py-5 text-current bg-white border-none shadow-lg outline-none pointer-events-auto rounded-3xl modal-content bg-clip-padding">
                <div class="flex flex-col items-center justify-center">
                    <div class="p-1 mt-4 mb-6 rounded-2xl bg-gradient-to-r from-fuchsia-400 to-indigo-500">
                        <div class="px-8 py-2 text-xl font-semibold text-white w-fit rounded-2xl bg-slate-800"
                            id="exampleModalScrollableLabel">
                            Pindah Kelas
                        </div>
                    </div>
                    <div class="mb-4 text-base text-center">Pilih salah satu kelas</div>
                    <div class="flex justify-center">
                        <div class="mb-3 xl:w-96">
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example" id="kelas">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex items-center px-4 py-3 space-x-2 font-semibold text-white shadow-md cursor-pointer w-fit hover:shadow-lg rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-400">
                        <button id="pindahBtn">Pindahkan</button>
                        <i class="fas fa-angle-double-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const table = $('#kelas-table').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();

            $('#kelas-table tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            $('#pindahBtn').click(function() {
                const kelas = $('#kelas').val();
                const selected = table.rows('.selected').data();

                if (selected.length > 0) {
                    let data = [];

                    for (let i = 0; i < selected.length; i++) {
                        data.push(selected[i][0]);
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('kelas.pindah') }}", {
                        kelas: kelas,
                        siswa: data
                    }, function(response) {
                        window.location.replace(response);
                    });
                } else {
                    alert("Pilih Dulu Bro");
                }

            });
        });
    </script>
@endsection
