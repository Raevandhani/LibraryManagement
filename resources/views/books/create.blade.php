<x-app-layout>
    <section class="bg-white min-h-screen py-4 sm:py-8 sm:pl-64">
        <div class="py-8 px-10 mx-auto max-w-2xl lg:py-12 md:border md:border-slate-300 rounded-xl space-y-5">
            <h2 class="text-2xl font-bold text-gray-900">Tambah Buku</h2>
            <hr class="border border-gray-200">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 grid-cols-2 sm:gap-6">
                    <div>
                        <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Judul Buku" required="">
                    </div>
                    <div>
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Penulis" required="">
                    </div>
                    <div>
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                        <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="Novel">Novel</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Sejarah">Sejarah</option>
                            <option value="Biografi">Biografi</option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="1">Instock</option>
                            <option value="0">Out of Stock</option>
                        </select>
                    </div>
                    <div>
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Tahun Terbit" required="">
                    </div> 
                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Stock</label>
                        <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Stock" required="">
                    </div>

                    <div class="col-span-full">
                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="desc" name="desc" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Your description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 hover:bg-teal-800">
                    Tambah Buku
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
