<x-app-layout>

    <section class="bg-gray-100 p-3 sm:p-5 md:pl-64 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 space-y-5 py-8">
            <h1 class="text-gray-700 text-3xl font-semibold">Buku yang Dipinjam</h1>
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
                                <th scope="col" class="px-4 py-3">Aksi</th>
                                <th scope="col" class="px-4 py-3">Pengingat</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($borrow as $data)

                                <?php
                                    $current_time = date('Y-m-d');
                                    $tanggal_kembali = $data->tanggal_kembali;

                                    $date_current = new DateTime($current_time);
                                    $date_return = new DateTime($tanggal_kembali);

                                    $diff = $date_current->diff($date_return);
                                    $days = $diff->days;

                                    if( $days > $tanggal_kembali AND $data->status === 'borrowed' ) {
                                        $hari = $days.' Hari Lagi';
                                        $color = 'text-gray-800 bg-slate-200';
                                    } elseif( $days <= $tanggal_kembali AND $data->status === 'borrowed') {
                                        $hari = 'Segera Kembalikan';
                                        $color = 'text-red-600 bg-red-100';
                                    } else {
                                        $hari = 'Sudah Dikembalikan';
                                        $color = 'text-blue-600 bg-blue-100';
                                    };
                                ?>

                                <tr class="border-b border-gray-300">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $data->book->judul_buku }}</td>
                                    <td class="px-4 py-3">{{ $data->book->penulis }}</td>
                                    <td class="px-4 py-3">{{ $data->tanggal_pinjam }}</td>
                                    <td class="px-4 py-3">{{ $data->tanggal_kembali ?? '-' }}</td>
                                    <td class="px-4 py-3"><button data-modal-target="modal-{{ $data->id }}" data-modal-toggle="modal-{{ $data->id }}"><span class="px-2 py-1 rounded-md bg-teal-400 text-teal-800">Kembalikan Buku</span></button></td>
                                    <td class="px-4 py-3"><span class="px-2 py-1 rounded-md font-medium {{ $color }}">{{ $hari }}</span></td>
                                </tr>

                                <div id="modal-{{$data->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                            
                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                   Konfirmasi
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-{{$data->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <div>
                                                <p>Kamu akan Kembalikan Buku :</p>
                                                <h4 class="text-2xl">{{ $data->book->judul_buku }}</h4>
                                            </div>
                                            <form action="{{ route('member.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="w-full px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-teal-800">
                                                    Kembalikan
                                                </button>
                                            </form>
                                    </div>
                                </div>
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
