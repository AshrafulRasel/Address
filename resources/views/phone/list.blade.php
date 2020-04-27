@extends('layout')
@section('content')
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h1>Phone List Of {{$contact->first_name}}</h1>
		</div>
		<div class="col-md-6">
			<a href="{{route('contact.index')}}" class="btn btn-info">Contact List</a>
		</div>
		
		
	</div>
	<table class="table table-bordered">
		<thead>
			<th>Phone Name</th>
			<th>Number</th>
			
			<th><a href="{{route('phone.create')}}" class="btn btn-primary">Add New</a></th>
		</thead>
		<tbody>
			@foreach($phones as $phone)
			<tr>
				<td>{{ $phone->name }}</td>
				<td>{{ $phone->number }}</td>
				
				<td>
					<a href="{{route('phone.edit', $phone->id)}}" class="btn btn-warning">Edit</a>

					<button class="btn btn-danger waves-effect" type="button" onclick="deletephone({{ $phone->id }})"><i class="material-icons">Delete</i></button>
                        <form id="delete-form-{{ $phone->id }}" action="{{ route('phone.destroy',$phone->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
				</td>

			</tr>
			@endforeach
		</tbody>
		 
	</table>

	


	<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

	<script type="text/javascript">
		function deletephone(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }	
	</script>
 

@endsection