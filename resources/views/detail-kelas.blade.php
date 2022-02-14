@extends('layouts.app')
@section('content')
    <!--Container-->
    <div class="container w-full px-2 mx-auto">

        <div class="flex justify-between mb-3">
            <div class="px-6 py-3 font-medium text-white rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-400">Kelas
                11 Ipa</div>
            <div></div>
            <div class="flex items-center justify-between px-6 py-3 space-x-2 font-medium text-white shadow-md cursor-pointer hover:shadow-lg rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-400">
                <div>Pindah Kelas</div>
                <i class="fas fa-angle-double-right"></i>
            </div>
        </div>

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">
            <table id="kelas-table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Nama Lengkap</th>
                        <th data-priority="3">Jenis Kelamin</th>
                        <th data-priority="4">Nama Ayah</th>
                        <th data-priority="5">Nama Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#kelas-table').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();

                $('#kelas-table tbody').on('click', 'tr', function() {
                    $(this).toggleClass('selected');
                });
            });
        });
    </script>
@endsection
