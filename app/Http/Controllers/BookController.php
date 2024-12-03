<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => "required",
            'penulis' => "required",
            'kategori' => "required",
            'desc' => "required",
            'tahun_terbit' => "required",
            'stock' => "required",
            'status' => "required|boolean",
        ]);

        Book::create($request->all());
        
        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::findorFail($id);

        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_buku' => "required",
            'penulis' => "required",
            'kategori' => "required",
            'desc' => "required",
            'tahun_terbit' => "required",
            'stock' => "required",
            'status' => "required|boolean",
        ]);

        $books = Book::findorFail($id);
        $books->update($request->all());
        
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::findorFail($id);
        $books->delete();

        return redirect('books');
    }

    // Borrow
    public function borrow()
    {
        $borrow = BorrowBook::all();

        return view('books.borrow', compact('borrow'));
    }

    public function status(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggal_kembali' => 'required|after_or_equal:tanggal_kembali'
        ]);

        $status_pinjaman = BorrowBook::findOrFail($id);
        
        $status_pinjaman->update([
            'status' => $request->status,
            'tanggal_kembali' => $request->tanggal_kembali
        ]);

        $book = Book::findOrFail($status_pinjaman->book_id);

        $book->update([
            'status' => $request->status === 'available',
            'status_pinjaman' => $request->status,
        ]);
        
        return redirect()->route('books.borrow')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
