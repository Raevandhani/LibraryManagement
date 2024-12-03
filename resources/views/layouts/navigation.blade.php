{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 duration-300 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<style>
    i{
        font-size: 1.1rem;
    }
</style>

{{-- Sidebar --}}
<nav class="bg-white border-b border-teal-800/50 px-3 sm:px-6 py-4">
    <div class="flex justify-between sm:justify-end items-center sm:pl-64">
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 duration-300 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <div class="flex items-center gap-4 text-gray-500 text-sm lg:text-base">
            <p>{{ now()->format('l, d M Y | H:m') }}</p>
            <i class="fa-regular fa-calendar"></i>
            <button id="theme-toggle" class="flex items-center">
                <i id="theme-toggle-icon" class="fas fa-sun"></i>
            </button>
        </div>
    </div>
</nav>
 
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
   <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-teal-800/50">
       <ul class="space-y-2">
           <li>
               <a href="/" class="flex items-center text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 duration-300 group">
                    <span class="">
                        <img src="/assets/LOGO-SMK-PESAT-IT-XPRO.webp" alt="" class="w-[125px]">
                    </span>
               </a>
           </li>

           <li>
               <a href="/dashboard" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 duration-300 group">
                    <i class="fa-solid fa-dice-d20"></i>
                    <span class="ml-3">Home</span>
               </a>
           </li>

            @auth
           @if(Auth::user()->role == 'admin')
           <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300" aria-controls="lemari-dropdown" data-collapse-toggle="lemari-dropdown">
                    <i class="fa-solid fa-book pr-1"></i>                    
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Lemari</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="lemari-dropdown" class="hidden py-2 space-y-2">
                <li>
                    <a href="{{ route('books.create') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Tambah Buku</a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Lemari Buku</a>
                </li>
               </ul>
           </li>

           <li>
               <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300" aria-controls="anggota-dropdown" data-collapse-toggle="anggota-dropdown">
                    <i class="fa-solid fa-users"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
               </button>
               <ul id="anggota-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('users.admin') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Anggota</a>
                    </li>
               </ul>
           </li>

            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300" aria-controls="riwayat-dropdown" data-collapse-toggle="riwayat-dropdown">
                    <i class="fa-solid fa-layer-group"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Peminjaman</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="riwayat-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('books.borrow') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Lemari Buku</a>
                    </li>
                </ul>
            </li>

           @elseif ( Auth::user()->role == 'member')
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300" aria-controls="bookshelf-member" data-collapse-toggle="bookshelf-member">
                    <i class="fa-solid fa-layer-group"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Lemari Buku</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="bookshelf-member" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('member.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Daftar Buku</a>
                    </li>
                    <li>
                        <a href="{{ route('member.borrow') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Buku Saya</a>
                    </li>
                    <li>
                        <a href="{{ route('member.history') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition group hover:bg-gray-100 duration-300">Riwayat</a>
                    </li>
                </ul>
            </li>

            @endif
            @endauth

       </ul>
       <ul class="pt-5 mt-5 space-y-2 border-t border-gray-400">
           <li>
               <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition hover:bg-gray-100 duration-300 group">
                    <i class="fa-solid fa-circle-question pl-1"></i>
                   <span class="ml-3">Help</span>
               </a>
           </li>
           <li>
                <div class="flex items-center p-2 hover:bg-gray-100 duration-300">
                    <i class="fa-solid fa-right-from-bracket pl-1"></i>
                    <form action="{{ route('logout')}}" method="POST">
                         @csrf
                         <button type="submit">
                             <span class="ml-3 flex items-center text-base font-normal text-gray-900 rounded-lg transition">Keluar</span>
                         </button>
                    </form>
                </div>
           </li>
       </ul>
   </div>
</aside>

{{--  --}}