<x-main-layout title="Edit">
<div class="">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">Modifier Book</h2>
				<form action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data" method="POST">
						@csrf
						@method('PUT')
						<div class="px-96 space-y-5">
								{{-- title --}}
								<input class="block w-full rounded-xl border-gray-400" name="title" placeholder="Titre du livre"
										type="text" value="{{ old('title', $book->title) }}">
								<x-error-msg name="title" />
								{{-- description --}}
								<textarea class="mt-5 block w-full rounded-xl border-gray-400" cols="30" id="" name="description"
								  placeholder="Votre contenu..." rows="10">{{ old('description', $book->description) }}</textarea>
								<x-error-msg name="description" />
								{{-- price --}}
								<input class="block w-full rounded-xl border-gray-400" name="price" placeholder="prix"
										type="text" value="{{ old('price', $book->price) }}">
								<x-error-msg name="price" />
								{{-- nombre_pages --}}
								<input class="block w-full rounded-xl border-gray-400" name="nombre_pages" placeholder="nombre de pages"
										type="text" value="{{ old('nombre_pages', $book->nombre_pages) }}">
								<x-error-msg name="nombre_pages" />
								{{-- author --}}
								<input class="block w-full rounded-xl border-gray-400" name="author" placeholder="auteur" type="text"
										value="{{ old('author', $book->author) }}">
								<x-error-msg name="author" />
								{{-- imgage --}}
								<div class="py-3">
										<label for="">Choisir une image:</label>
										<input class="block" id="" name="image" type="file">
										<x-error-msg name="image" />
								</div>
								{{-- envoyer --}}
								<div class="text-center">
										<button class="btn btn-primary" type="submit">Envoyer</button>
								</div>
						</div>
				</form>
		</div>
</x-main-layout>