<x-main-layout title="Accueil">
		<div class="">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">Book_store</h2>
				<div class="" id="container_card">
						@forelse ($books as $book)
								<div class="">
										<x-cards.Card_book :title="$book->title" :price="$book->price" :author="$book->author" />
								</div>
						@empty
								<p class="text-xl text-[#0e0037]">Pas de livre actuellement</p>
						@endforelse
				</div>
				<div class="pt-10">
						{{ $books->links('pagination::tailwind') }}
				</div>
		</div>
</x-main-layout>
