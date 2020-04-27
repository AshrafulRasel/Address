 @extends('layout')
@section('content')
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif

	<div class="row">
		<div class="col-md-6">
			@foreach($contact as $con)
				<h1 style="color:skyblue;">Details of {{ $con->first_name }} {{ $con->last_name }} 	<a href="{{route('contact.index')}}" class="btn btn-danger">Back</a></h1>

			@endforeach
		</div>
		
		
	</div>


	<h2>Phone List</h2>

	<table class="table table-bordered">
		<thead>
			<th>Phone Name</th>
			<th>Number</th>
			
		</thead>
		<tbody>
			@foreach($contact as $con)
				@foreach($con->phones as $phone)
					<tr>
						<td>{{ $phone->name }}</td>
						<td>{{ $phone->number }}</td>
					</tr>
				@endforeach
			@endforeach
		</tbody>
		 
	</table>

		<h2>Address List</h2>

	<table class="table table-bordered">
		<thead>
			<th>Address Name</th>
			<th>Street</th>
			<th>City</th>
			<th>Country</th>
			<th>State</th>
			<th>Zip</th>
			
		</thead>
		<tbody>
			@foreach($contact as $con)
				@foreach($con->addresses as $address)
					<tr>
						<td>{{ $address->name }}</td>
						<td>{{ $address->street }}</td>
						<td>{{ $address->city }}</td>
						<td>{{ $address->country }}</td>
						<td>{{ $address->state }}</td>
						<td>{{ $address->zip }}</td>
					</tr>
				@endforeach
			@endforeach
		</tbody>		 
	</table>

	
	


	
 

@endsection