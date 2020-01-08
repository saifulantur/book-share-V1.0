@extends('layouts.backendapp')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Area Edit Form</div>
                <div class="card-body">
                    <form action="{{ route('areaUpdate', ['id'=>Crypt::encrypt($area->id)]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="area_name">Area Name</label>
                                <input type="text" name="area_name" id="area_name" placeholder="Enter Area Name" value="{{ $area->area_name }}"
                                       class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city_id">City Name</label>
                                <select class="form-control" name="city_id" id="city_id">
                                <option value="{{ $area->city_id }}">{{ $area->relationToCities->city_name }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                                </select>
                            </div>
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
