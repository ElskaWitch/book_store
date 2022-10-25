<x-main-layout title="Show">
		<div class="">
				<h2 class="text-center text-4xl py-10 font-semibold text-[#6d5ba1]">{{ $book->title }}</h2>
				<div class="grid place-items-center">
						<img alt="{{ $book->title }}" class="rounded-xl w-96 " src="{{ asset('storage/' . $book->image) }}">
						<p class="text-center px-96 py-10">{!! nl2br(e($book->description)) !!}</p>
						<p>{!! nl2br(e($book->author)) !!}</p>
						<p>{!! nl2br(e($book->price)) !!}</p>
						<p>{!! nl2br(e($book->nombre_pages)) !!}</p>
				</div>
				@auth
						<div class="pt-6 flex justify-center space-x-5">
								<div>
										<x-btn-delete :item="$book" routeItem="books.destroy" />
								</div>
								<div>
										<a class="btn btn-success" href="{{ $book->id }}/edit">Modifier</a>
								</div>
						</div>
				@endauth
		</div>
</x-main-layout>
