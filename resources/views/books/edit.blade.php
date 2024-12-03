<x-app-layout>
    <section class="bg-white min-h-screen py-4 sm:py-8 sm:pl-64">
        <div class="py-8 px-10 mx-auto max-w-2xl lg:py-12 md:border md:border-slate-300 rounded-xl space-y-5">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Update</h2>
            <hr class="border border-gray-200">
            <form action="{{ route('books.update', $books->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 grid-cols-2 sm:gap-6">
                    <div>
                        <label for="judul_buku" class="block mb-2 text-sm font-medi um text-gray-900">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" value="{{ $books->judul_buku }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5" placeholder="Judul Buku" required="">
                    </div>
                    <div>
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                        <input type="text" name="penulis" id="penulis"  value="{{ $books->penulis }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5" placeholder="Penulis" required="">
                    </div>
                    <div>
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                        <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            <option value="{{ $books->kategori }}"> -- {{ Str::ucFirst($books->kategori) }} --</option>
                            <option value="Novel">Novel</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Biografi">Biografi</option>
                        </select>
                    </div>
                    <div>
                        <?php
                            $status = $books->status == '0' ? '1' : '0';
                        ?>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            <option value="{{ $books->status }}">{{ $books->status == '1' ? 'Instock' : 'Out Of Stock'}}</option>
                            <option value="{{ $status }}">{{ $status == '0' ? 'Out Of Stock' : 'Instock'}}</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit"  value="{{ $books->tahun_terbit }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5" placeholder="Tahun Terbit" required="">
                    </div> 
                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Stock</label>
                        <input type="number" name="stock" id="stock"  value="{{ $books->stock }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5" placeholder="Stock" required="">
                    </div> 
                    <div class="col-span-full">
                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="desc" name="desc" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500" placeholder="Your description here">{{ $books->desc }}</textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-900 hover:bg-teal-800">
                    Update Buku
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
