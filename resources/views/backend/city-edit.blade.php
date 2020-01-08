@extends('layouts.backendapp')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">City Form</div>
                <div class="card-body">
                    <form action="{{ route('cityUpdate', ['id'=>Crypt::encrypt($city->id)]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="city_name">City Name</label>
                            <input placeholder="Enter City Name" type="text" name="city_name" value="{{ $city->city_name }}" id="city_name" class="form-control">

                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-warning" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
