<div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full md:w-52 text-d-dark bg-blue-50"
    x-data="{ open: false }">
    <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4 md:justify-center">
        <a href="#"
            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Manda</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    <nav :class="{'block': open, 'hidden': !open}" class="pb-4 md:block md:pb-0 md:overflow-y-auto">


        <a href="{{ url('dashboard') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('dashboard') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
        <a href="{{ url('informasi') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('informasi') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-info-circle"></i>
            <p>Informasi Sekolah</p>
        </a>
        <a href="{{ url('kelas') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('kelas') || request()->is('detail-kelas') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-users"></i>
            <p>Kelas</p>
        </a>
        <a href="{{ url('mapel') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('mapel') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-book"></i>
            <p>Mata Pelajaran</p>
        </a>
        <a href="{{ url('guru') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('guru') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Guru</p>
        </a>
        <a href="{{ url('siswa') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('siswa') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-user-graduate"></i>
            <p>Siswa</p>
        </a>
        <a href="{{ url('penilaian') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('penilaian') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-sort-numeric-up-alt"></i>
            <p>Penilaian</p>
        </a>
        <a href="{{ url('nilai') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('nilai') ? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100' : 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-sort-numeric-down-alt"></i>
            <p>Nilai</p>
        </a>
        <a href="{{ url('profilguru') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('profilguru')? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100': 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Profil Guru</p>
        </a>
        <a href="{{ url('profilsiswa') }}"
            class="flex items-center space-x-2 px-4 py-3 mt-2 text-sm text-gray-90  {{ request()->is('profilsiswa')? 'border-r-4 border-indigo-500 text-indigo-500 bg-indigo-100': 'bg-transparent' }} hover:text-indigo-600 focus:text-gray-900 hover:bg-indigo-200 cursor-pointer">
            <i class="fas fa-user-graduate"></i>
            <p>Profil Siswa</p>
        </a>
    </nav>
</div>
