<div @click.away="open = false"
    class="flex flex-col w-full md:w-52 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
    x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between md:justify-center">
        <a href="#"
            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Manda</a>
        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
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

    <nav :class="{'block': open, 'hidden': !open}" class="md:block px-2 pb-4 md:pb-0 md:overflow-y-auto">
        <div class="flex flex-col items-center w-full space-y-3 mb-6">
            <img class="inline object-cover w-16 h-16 mr-2 rounded-full"
                src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                alt="Profile image" />
            <div class="py-1 px-2 bg-purple-600 text-xs rounded-xl text-white">Admin</div>
            <a href="#">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>

        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('dashboard') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-home"></i>
            <a class="" href="{{ url('dashboard') }}">Dashboard</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('informasi') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-info-circle"></i>
            <a class="" href="{{ url('informasi') }}">Informasi Sekolah</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('kelas') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-users"></i>
            <a class="" href="{{ url('kelas') }}">Kelas</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('mapel') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-book"></i>
            <a class="" href="{{ url('mapel') }}">Mata Pelajaran</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('guru') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-chalkboard-teacher"></i>
            <a class="" href="{{ url('guru') }}">Guru</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('siswa') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-user-graduate"></i>
            <a class="" href="{{ url('siswa') }}">Siswa</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('penilaian') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-sort-numeric-up-alt"></i>
            <a class="" href="{{ url('penilaian') }}">Penilaian</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('nilai') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-sort-numeric-down-alt"></i>
            <a class="" href="{{ url('nilai') }}">Nilai</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('profilguru') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-chalkboard-teacher"></i>
            <a class="" href="{{ url('profilguru') }}">Profil Guru</a>
        </div>
        <div
            class="flex items-center space-x-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 {{ request()->is('profilsiswa') ? 'bg-gray-200' : 'bg-transparent' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <i class="fas fa-user-graduate"></i>
            <a class="" href="{{ url('profilsiswa') }}">Profil Siswa</a>
        </div>
    </nav>
</div>
