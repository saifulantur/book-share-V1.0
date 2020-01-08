@extends('layouts.backendapp')
@section('backend_content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">City Form</div>
                <div class="card-body">
                    <form action="{{ route('cityStore') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="city_name">City Name</label>
                            <input placeholder="Enter City Name" type="text" name="city_name" id="city_name" class="form-control">

                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 my-2">
            <div class="card">
                <div class="card-header bg-primary text-white">Cities List</div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>City Name</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->city_name }}</td>
                                <td>{{ $city->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $city->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('cityEdit', ['id'=>Crypt::encrypt($city->id) ]) }}" class="mr-2 "><i class="far fa-edit"></i></a>
                                    <a href="{{ route('cityDestroy', ['id'=>Crypt::encrypt($city->id) ]) }}"><i class="far fa-trash-alt"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-2">
            <div class="card">
                <div class="card-header bg-warning text-white">Deleted Cities List</div>
                <div class="card-body">
                    <table id="author1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>City Name</th>
                            <th>Created Time</th>
                            <th>Deleted Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($softDeletedCities as $softDeletedCity)
                            <tr>
                                <td>{{ $softDeletedCity->city_name }}</td>

                                <td>{{ $softDeletedCity->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedCity->created_at->diffForHumans() }}
                                </td>

                                <td>{{ $softDeletedCity->deleted_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedCity->deleted_at->diffForHumans() }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('cityRestore', ['id'=>Crypt::encrypt($softDeletedCity->id)]) }}" class="mr-2 btn btn-success btn-sm">Restore</a>
                                    <a href="{{ route('cityPermanentDelete', ['id'=>Crypt::encrypt($softDeletedCity->id)]) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
