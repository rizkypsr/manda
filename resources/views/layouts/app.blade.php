<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables/datatables.min.css') }}" rel="stylesheet">
    <style>
        /*Overrides for Tailwind CSS */

        #kelas-table > thead > tr > * {
            background-color: #7166F9;
            color: white;
        }

        #kelas-table_length {
            width: 20%;
        }

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        #kelas-table_length > label > select {
            width: 30%;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>

    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        {{-- Navbar && Sidebar --}}
        @include('sidebar')

        {{-- Main Body --}}
        <main class="flex-1">
            <div class="justify-end hidden p-6 md:flex">
                <div class="flex items-center space-x-2">
                    <img class="inline object-cover w-12 h-12 mr-2 rounded-lg"
                        src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        alt="Profile image" />
                    <p class="font-semibold">Pebi Irawan</p>
                    <div
                        class="flex items-center justify-center w-6 h-6 bg-gray-200 rounded-lg shadow-md cursor-pointer">
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('vendors/jquery/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('vendors/swiper/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/tw-elements/index.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/datatables.min.js') }}"></script>
    @yield('script')
</body>

</html>
