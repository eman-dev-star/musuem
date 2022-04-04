
@if($errors->any())
	
	<div class="alert alert-danger">
		
		@foreach($errors->all() as $error)

			<p class="text-light"> {{ $error }} </p>

		@endforeach

	</div>

@endif