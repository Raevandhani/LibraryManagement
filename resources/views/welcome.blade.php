<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Icon --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.min.css">


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased lg:overflow-hidden">

    <nav class="bg-white border-b border-teal-800 p-4 drop-shadow-lg">
        <div class="flex flew-warp justify-end items-center mx-auto max-w-screen-xl gap-6">
            <p>{{ now()->format('l, d M Y | H:1') }}</p>
            <i class="fa-regular fa-calendar"></i>
            <button id="theme-toggle">
                <i id="theme-toggle-icon" class="fas fa-sun"></i>
            </button>
        </div>
    </nav>

    <section class="bg-white flex justify-center items-center min-h-[90dvh]">
        <div
            class="gap-8 flex flex-col lg:flex-row justify-center items-center py-8 px-32 mx-auto max-w-screen-xl xl:gap-12 sm:py-16 lg:px-10">
            <img class="w-[425px] lg:w-[525px]"
                src="/assets/3_siswa.png"
                alt="welcome-image"
                >
            <div class="mt-4 md:mt-0 flex flex-col items-center lg:items-start ">
                <h1 class="mb-2 text-2xl font-semibold text-gray-700 text-center lg:text-start">Selamat Datang Di <span class="text-teal-800">Perpustakaan ITXPRO</span></h1>
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 leading-[50px] text-center lg:text-start">Menemukan Pengetahuan untuk Meningkatkan Karir Anda</h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg text-center lg:text-start">Akses koleksi buku, jurnal, dan sumber daya digital terkemuka di dunia teknologi dan IT. Temukan wawasan baru, pelajari keterampilan baru, dan buka peluang untuk masa depan yang lebih cerah.</p>

                 @if (Route::has('login'))
                            <nav class="flex flex-1 justify-start gap-4">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-8 py-2 text-white bg-teal-600 ring-1 ring-transparent transition border hover:bg-white hover:text-teal-600 hover:border-teal-600"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-8 py-2 text-white bg-teal-600 ring-1 ring-transparent transition border hover:bg-white hover:text-teal-600 hover:border-teal-600"
                                    >
                                        Log in
                                    </a>

                                    {{-- @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black bg-slate-500 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif --}}
                                @endauth
                            </nav>
                        @endif
            </div>
        </div>
    </section>
</body>

</html>