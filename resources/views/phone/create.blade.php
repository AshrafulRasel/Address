@extends('layout')
@section('content')

<h2>Contact Create</h2>

<form action="{{ route('phone.store') }}" method="POST">
	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputName">Phone Name</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter First Name.." required autofocus>
	        @if ($errors->has('name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
	        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contact</label>
        <select  class="form-control" name="contact" id="contact">
          <option hidden >Select Contact</option>
          @forelse(App\Contact::orderBy('id', 'desc')->get() as $contact)
                <option value="{{ $contact->id }}">{{ $contact->first_name }}</option>
          @empty
              No Model
          @endforelse 
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputName">Number</label>
        <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" placeholder="Enter Last Name..." required autofocus>
	        @if ($errors->has('number'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('number') }}</strong>
	            </span>
	        @endif
      </div>


      


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
       <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>

      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


@endsection