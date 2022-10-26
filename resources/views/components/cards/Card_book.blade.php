@props(['title', 'price', 'author', 'id'])

<div class="overflow-x-auto grid justify-items-center">
		<table class="table w-8/12 ">
				<!-- head -->
				<thead>
						<tr >
								<th class="bg-indigo-300 w-1/4">Nom du livre</th>
								<th  class="bg-indigo-300 w-1/4">Prix</th>
								<th  class="bg-indigo-300 w-1/4">Auteur</th>
								<th  class="bg-indigo-300 w-1/4 text-center">Editer</th>
						</tr>
				</thead>
				<tbody class="">
				  
						<!-- body-->
						<tr class="">
								<td class="font-bold italic">{{ $title }}</td>
								<td>{{ $price }}</td>
								<td>{{ $author }}</td>
								<td class="grid justify-items-center"><a href="books/{{$id}}" class="text-indigo-500 border px-2 rounded-xl font-semibold ">Voir</a></td>
						</tr>
				</tbody>
		</table>
</div>
