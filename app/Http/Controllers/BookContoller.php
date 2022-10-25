<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->paginate(10);
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:180|string|unique:books,title',
            'description' => 'required|min:20|max:350|string',
            'image' => 'required|image|mimes:png,jpg,jpeg,jfif|max:2000',
            'price' => 'required|min:1|max:100|string',
            'author' => 'required|min:5|max:180|string',
            'nombre_pages' => 'required|min:1|max:100|string'
        ]);

        $validateImg = $request->file('image')->store('books');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $validateImg,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'created_at' => now()
        ]);
        return redirect()
            ->route('home')
            ->with('status', 'Le livre a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($request->hasFile('image')) {
            Storage::delete($book->image);
            $book->image = $request->file('image')->store('books');
        }

        $request->validate([
            'title' => 'required|min:5|max:180|string',
            'description' => 'required|min:20|max:350|string',
            'image' => 'required|image|sometimes|mimes:png,jpg,jpeg,jfif|max:2000',
            'price' => 'required|min:1|max:180|string',
            'author' => 'required|min:5|max:180|string',
            'nombre_pages' => 'required|min:1|max:6|string'
        ]);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $book->image,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'updated_at' => now()
        ]);

        return redirect()
            ->route('books.show', $book->id)
            ->with('status', 'Le livre a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('home')
            ->with('status', "Le livre a bien été supprimé");
    }
}
