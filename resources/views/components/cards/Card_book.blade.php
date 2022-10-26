@props(['title', 'price', 'author', 'id'])

<div class="overflow-x-auto">
		<table class="table w-full">
				<!-- head -->
				<thead>
						<tr>
								<th></th>
								<th>Nom du livre</th>
								<th>Prix</th>
								<th>Auteur</th>
								<th>Editer</th>
						</tr>
				</thead>
				<tbody>
						<!-- body-->
						<tr>
								<th>1</th>
								<td>{{ $title }}</td>
								<td>{{ $price }}</td>
								<td>{{ $author }}</td>
								<td><a href="books/{{$id}}">Voir</a></td>
						</tr>
				</tbody>
		</table>
</div>
