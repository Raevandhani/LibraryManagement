<?php
  use App\Models\Book;
  use App\Models\BorrowBook;

  $book_count = count(Book::all());

  $borrow_count = BorrowBook::where('status', 'borrowed')->count();
  $return_count = BorrowBook::where('status', 'available')->distinct('book_id')->count('book_id');  
  $total_borrowed = BorrowBook::count();
?>

<x-app-layout>
    <section class="bg-white sm:pl-64 min-h-screen">
        <div class="p-8">
            <div class="py-10 px-7 md:px-10 lg:px-16 bg-slate-50 flex items-center gap-7 rounded-xl border-b-2 shadow-md border-teal-500">
                <img src="/assets/hero-library.png" alt="tes" class='lg:max-w-sm hidden lg:block'/>
                <div class='space-y-6 w-full lg:w-4/5 text-center lg:text-start'>
                  <h1 class='font-medium text-4xl'><span class='font-extrabold'>Selamat Datang,</span> {{ Auth::user()->name }}</h1>
                  <p>Perpustakaan ini menyediakan koleksi buku lengkap, ruang baca nyaman, dan fasilitas untuk mendukung pembelajaran, menjadikannya tempat ideal untuk menambah pengetahuan.</p>
                  <div class="flex justify-center lg:justify-start items-center gap-3 text-xs sm:text-sm lg:text-base">
                    @if (Auth::user()->role == 'admin')
                      <a href="{{ route('books.index') }}" class='px-7 py-2 bg-slate-300 rounded-full hover:bg-slate-400 transition-all duration-150'>Daftar Buku</a>
                      <a href="{{ route('books.borrow') }}" class='px-7 py-2 bg-teal-700 rounded-full text-white hover:bg-teal-800 transition-all duration-150'>Cek Riwayat</a>
                    @elseif (Auth::user()->role == 'member')
                      <a href="{{ route('member.borrow') }}" class='px-7 py-2 bg-slate-300 rounded-full hover:bg-slate-400 transition-all duration-150'>Baca Buku</a>
                      <a href="{{ route('member.index') }}" class='px-7 py-2 bg-teal-700 rounded-full text-white hover:bg-teal-800 transition-all duration-150'>Pinjam Buku</a>
                    @endif

                  </div>
                </div>
            </div>
        
            <div>
                <div class='flex items-center justify-between my-7'>
                    <div>
                        <h3 class='text-xl font-medium'>Info Dashboard Buku</h3>
                        <p>Dashboard ini menampilkan statistik terkini mengenai jumlah buku yang tersedia, kategori, serta rating rata-rata dari pembaca.</p>
                    </div>
                    <a href="" class='px-5 py-1.5 bg-slate-300 rounded-full hover:bg-slate-400 transition-all duration-150 font-medium'>Kelola</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7 p-2">
                    <div class='text-9xl bg-[#6e987c] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
                      <div class='flex items-center justify-between w-full px-5'>
                        <h2 class='text-5xl me-2'><?= $book_count ?></h2>
                        <i class="ri-book-shelf-fill text-5xl"></i>
                      </div>
                      <h4 class='text-lg'>Total Buku</h4>
                    </div>
        
                    <div class='text-9xl bg-[#22615D] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
                      <div class='flex items-center justify-between w-full px-5'>
                        <h2 class='text-5xl me-2'><?= $borrow_count ?></h2>
                        <i class="ri-git-repository-commits-fill text-5xl"></i>
                      </div>
                      <h4 class='text-lg'>Sedang Dipinjam</h4>
                    </div>
        
                    <div class='text-9xl bg-[#FBC78F] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
                      <div class='flex items-center justify-between w-full px-5'>
                        <h2 class='text-5xl me-2'><?= $return_count ?></h2>
                        <i class="ri-git-repository-fill text-5xl"></i>  
                      </div>
                      <h4 class='text-lg'>Sudah Dikembalikan</h4>
                    </div>
        
                    <div class='text-9xl bg-[#AC455E] rounded-2xl text-white flex flex-col items-center justify-center p-6 space-y-10 shadow-md'>
                      <div class='flex items-center justify-between w-full px-5'>
                        <h2 class='text-5xl me-2 '><?= $total_borrowed ?></h2>
                        <i class="ri-book-fill text-5xl"></i>
                      </div>
                      <h4 class='text-lg'>Total Peminjaman</h4>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>
</x-app-layout>
