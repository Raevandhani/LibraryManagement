<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('member.index', compact('books'));
    }

    public function borrow()
    {
        $borrow = BorrowBook::where('user_id', Auth::id())->where('status', 'borrowed')->get();

        return view('member.borrow', compact('borrow'));
    }

    public function history()
    {
        $history = BorrowBook::where('user_id', Auth::id())->where('status', 'available')->get();

        return view('member.history', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $books = Book::findorFail($request->book_id);

        if(!$books->status)
        {
            return back();
        }

        BorrowBook::create([
            'user_id' => Auth::id(),
            'book_id' => $books->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $books->update([
            'status' => false,
            'status_pinjaman' => 'borrowed',
        ]);

        return redirect()->back()->with('success','Buku Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status_pinjaman = BorrowBook::findOrFail($id);
        
        $status_pinjaman->update([
            'status' => 'available',
        ]);

        $book = Book::findOrFail($status_pinjaman->book_id);

        $book->update([
            'status' => true,
            'status_pinjaman' => 'available',
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
