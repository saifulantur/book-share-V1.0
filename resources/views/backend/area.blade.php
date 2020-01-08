@extends('layouts.backendapp')
@section('backend_content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Area Form
                </div>
                <div class="card-body">
                    <form action="{{ route('areaStore') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="area_name">Area Name</label>
                                <input type="text" name="area_name" id="area_name" placeholder="Enter Area Name"
                                       class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="city_id">Select City</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                <div class="card-header bg-primary text-white">Areas List</div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>City Name</th>
                            <th>Area Names</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->city_name }}</td>
                                <td>
                                    @foreach($city->relationToAreas as $area)
                                        {{ $area -> area_name }}
                                        <a href="{{ route('areaEdit', ['id'=>Crypt::encrypt($area->id) ]) }}" class="mr-2"><i class="far fa-edit"></i></a>
                                        <a href="{{ route('areaDestroy', ['id'=>Crypt::encrypt($area->id) ]) }}"><i class="far fa-trash-alt"></i></a>
                                        <br>
                                    @endforeach
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
                <div class="card-header bg-warning text-white">Deleted Areas List</div>
                <div class="card-body">
                    <table id="author1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Area Name</th>
                            <th>Created Time</th>
                            <th>Deleted Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($softDeletedAreas as $softDeletedArea)
                            <tr>
                                <td>{{ $softDeletedArea->area_name }}</td>

                                <td>{{ $softDeletedArea->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedArea->created_at->diffForHumans() }}
                                </td>

                                <td>{{ $softDeletedArea->deleted_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedArea->deleted_at->diffForHumans() }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('areaRestore', ['id'=>Crypt::encrypt($softDeletedArea->id)]) }}" class="mr-2 btn btn-success btn-sm">Restore</a>
                                    <a href="{{ route('areaPermanentDelete', ['id'=>Crypt::encrypt($softDeletedArea->id)]) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
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
