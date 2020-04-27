@extends('layout')
@section('content')

<h2>Contact Create</h2>

<form action="{{ route('contact.store') }}" method="POST">
	@csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputName">First Name</label>
        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name.." required autofocus>
	        @if ($errors->has('first_name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('first_name') }}</strong>
	            </span>
	        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputName">Last Name</label>
        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name..." required autofocus>
	        @if ($errors->has('last_name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('last_name') }}</strong>
	            </span>
	        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputName">Date Of Birth</label>
        <input type="date" class="form-control" name="date_of_birth" id="exampleInputEmail1" >
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email Address.." required autofocus>
	        @if ($errors->has('email'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
	        @endif
      </div>
      


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
       <a href="{{route('contact.index')}}" class="btn btn-danger">Cancel</a>

      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


@endsection