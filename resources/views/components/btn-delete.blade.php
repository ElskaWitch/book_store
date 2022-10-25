@props(['item', 'routeItem'])

<div class="">
		<form action="{{ route($routeItem, $item->id) }}" method="POST"
				onsubmit="return confirm('Es-tu sûr de vouloir supprimer?')">
				@csrf
				@method('DELETE')
				<button class="btn btn-error">Supprimer</button>
		</form>
</div>
