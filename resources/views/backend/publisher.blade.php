@extends('layouts.backendapp')
@section('backend_content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Publisher Form</div>
                <div class="card-body">
                    <form action="{{ route('publisherStore') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="publisher">Publisher Name</label>
                            <input placeholder="Enter Publisher Name" type="text" name="publisher" id="publisher" class="form-control">

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
                <div class="card-header bg-primary text-white">Publishers List</div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Publisher Name</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publishers as $publisher)
                            <tr>
                                <td>{{ $publisher->publisher }}</td>
                                <td>{{ $publisher->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $publisher->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('publisherEdit', ['id'=>Crypt::encrypt($publisher->id) ] ) }}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('publisherDestroy', ['id'=>Crypt::encrypt($publisher->id) ]) }}"><i class="far fa-trash-alt"></i></a>
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
                <div class="card-header bg-warning text-white">Deleted Publishers List</div>
                <div class="card-body">
                    <table id="author1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Publisher Name</th>
                            <th>Created Time</th>
                            <th>Deleted Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($softDeletedPublishers as $softDeletedPublisher)
                            <tr>
                                <td>{{ $softDeletedPublisher->publisher }}</td>

                                <td>{{ $softDeletedPublisher->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedPublisher->created_at->diffForHumans() }}
                                </td>

                                <td>{{ $softDeletedPublisher->deleted_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedPublisher->deleted_at->diffForHumans() }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('publisherRestore', ['id'=>Crypt::encrypt($softDeletedPublisher->id) ]) }}" class="mr-2 btn btn-success btn-sm">Restore</a>
                                    <a href="{{ route('publisherPermanentDelete', ['id'=>Crypt::encrypt($softDeletedPublisher->id) ]) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
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
