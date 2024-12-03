<x-app-layout>

    <section class="bg-gray-100 p-3 sm:p-5 md:pl-64 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 space-y-5 py-8">
            <h1 class="text-gray-700 text-3xl font-semibold">Riwayat Peminjaman Buku</h1>
            <div class="bg-white relative shadow-md sm:rounded-lg">
                <div class="flex md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-200">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Penulis</th>
                                <th scope="col" class="px-4 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($history as $data)

                                <?php
                                    $current_time = date('Y-m-d');
                                ?>

                                <tr class="border-b border-gray-300 ">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $data->book->judul_buku }}</td>
                                    <td class="px-4 py-3">{{ $data->book->penulis }}</td>
                                    <td class="px-4 py-3">{{ $data->tanggal_pinjam }}</td>
                                    <td class="px-4 py-3">{{ $data->tanggal_kembali ?? '-' }}</td>
                                    <td class="px-4 py-3"><span class="bg-green-300 text-green-600 rounded-md px-2 py-1">Telah Dikembalikan</span></td>
                                </tr>

                                
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">


                </nav>
            </div>
        </div>
    </section>
    
</x-app-layout>
