<x-app-layout>
    <section class="bg-white sm:pl-64 min-h-screen">
        <div class="p-10">
            <h2 class="text-4xl font-semibold">Daftar Buku Library</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-gray-900 py-6">

                @foreach ($books as $book )
                <div class="bg-gray-200 p-4 rounded-md shadow-lg">
                    <h4 class="text-3xl mb-2 font-bold">{{ $book->judul_buku }}</h4>
                    <div class="mb-4 text-gray-800">
                        <div class="flex items-center justify-between w-full mb-2">
                            <h5 class=""><span class="font-semibold">Penulis:</span> {{ $book->penulis }}</h5>
                            <h5 class="text-gray-800"><span class="font-semibold">Status:</span> <span class="{{ $book->status ? 'bg-teal-300 text-teal-900 font-semibold px-2 py-1 rounded-md' : 'bg-rose-400 text-rose-700 px-2 py-1 rounded-md font-semibold'}}">{{ $book->status ? 'Instock' : 'Out of Stock'}}</span></h5>
                        </div>
                        <h4 class="font-semibold">Deskripsi:</h4>
                        <p class="text-gray-600">{{ Str::limit($book->desc, 10)}}</p>
                    </div>  
                    <div class="w-full">
                        <button class="{{ $book->status ? 'bg-teal-500 text-white' : 'bg-gray-400 text-white' }} px-4 py-2 rounded-md" data-modal-target="modal-{{ $book->id }}" data-modal-toggle="modal-{{ $book->id }}" {{ $book->status ? '' : 'disabled' }}>{{ $book->status ? 'Pinjam Buku' : 'Tidak Tersedia' }}</button>
                    </div>
                </div>

                <div id="modal-{{ $book->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                            <div class="flex justify-between items-center rounded-t border-b sm:mb-5">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Pinjam Buku
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="modal-{{$book->id}}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <form class="p-4 md:p-5" action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <div class="grid gap-4 mb-4 grid-cols-2">   
                                    <div class="sm:col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Anggota</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                                        <input type="text" value="{{ $book->judul_buku }}" name="judul_buku" id="judul_buku"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            readonly>
                                    </div>
                                    <div class="w-full">
                                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                                        <input type="text" name="penulis" value="{{ $book->penulis }}" id="penulis"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            readonly>
                                    </div>
                                    <div class="w-full">
                                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                        <input type="text" value="{{ $book->kategori }}" name="kategori" id="kategori"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            readonly>
                                    </div>
                                    <div class="w-full">
                                        <label for="tanggal_pinjam" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="tanggal_kembali" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                                            required>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-900 hover:bg-teal-800">
                                    Pinjam Buku
                                </button>
                                </div>
                            </form>
                    </div>
                </div>
                @endforeach

            </div>
            
            
        </div>
    </section>
</x-app-layout>