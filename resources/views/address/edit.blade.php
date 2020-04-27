@extends('layout')
@section('content')

<h2>Contact Create</h2>

<form action="{{ route('address.update', $address->id) }}" method="POST">
  @csrf
  @method('PUT')
    <div class="card-body">

      <div class="form-group">
        <label for="exampleInputPassword1">Model</label>
        <select  class="form-control" name="contact" id="contact">      
          @forelse(App\Contact::orderBy('id', 'desc')->get() as $contact)
                <option value="{{ $contact->id }}"@if($address->contact->id=== $contact->id) selected='selected' @endif>{{ $contact->first_name }}</option>
          @empty
              No Model
          @endforelse 

        </select>
      </div>
                  
      <div class="form-group">
        <label for="exampleInputName">Address Name</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $address->name }}" placeholder="Enter Address Name.." required autofocus>
	        @if ($errors->has('name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
	        @endif
      </div>
      <div class="form-group">
        <label for="exampleInputName">Street</label>
        <input id="last_name" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ $address->street }}" placeholder="Enter Street..." required autofocus>
	        @if ($errors->has('street'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('street') }}</strong>
	            </span>
	        @endif
      </div>

      <div class="form-group">
        <label for="exampleInputName">City</label>
        <input type="text" class="form-control" value="{{$address->city}}" name="city" id="exampleInputEmail1" >
      </div>

      <div class="form-group">
        <label for="exampleInputName">State</label>
        <input type="text" class="form-control" name="state" value="{{$address->state}}" id="exampleInputEmail1" >
      </div>

      <div class="form-group">
        <label for="exampleInputName">Zip</label>
        <input type="text" class="form-control" name="zip" value="{{$address->zip}}" id="exampleInputEmail1" >
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Country</label>
        <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $address->zip }}" placeholder="Enter  Country name.." required autofocus>
	        @if ($errors->has('country'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('country') }}</strong>
	            </span>
	        @endif
      </div>
      


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
       <a href="{{ URL::previous() }}"" class="btn btn-danger">Cancel</a>

      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


@endsection