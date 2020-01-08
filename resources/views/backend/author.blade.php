@extends('layouts.backendapp')
@section('backend_content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Author Form</div>
            <div class="card-body">
                <form action="{{ route('authorStore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="author_name">Author Name</label>
                        <input placeholder="Enter Author Name" type="text" name="author_name" id="author_name" class="form-control">

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
            <div class="card-header bg-primary text-white">Authors List</div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Created Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->created_at->format('d-M-Y h:i:s A') }}
                            <br>
                            {{ $author->created_at->diffForHumans() }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('authorEdit', ['id'=>Crypt::encrypt($author->id) ]) }}" class="mr-2"><i class="far fa-edit"></i></a>
                            <a href="{{ route('authorDestroy', ['id'=>Crypt::encrypt($author->id) ]) }}"><i class="far fa-trash-alt"></i></a>
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
            <div class="card-header bg-warning text-white">Deleted Authors List</div>
            <div class="card-body">
                <table id="author1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Created Time</th>
                        <th>Deleted Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($softDeletedAuthors as $softDeletedAuthor)
                        <tr>
                            <td>{{ $softDeletedAuthor->author_name }}</td>

                            <td>{{ $softDeletedAuthor->created_at->format('d-M-Y h:i:s A') }}
                                <br>
                                {{ $softDeletedAuthor->created_at->diffForHumans() }}
                            </td>

                            <td>{{ $softDeletedAuthor->deleted_at->format('d-M-Y h:i:s A') }}
                                <br>
                                {{ $softDeletedAuthor->deleted_at->diffForHumans() }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('authorRestore', ['id'=>Crypt::encrypt($softDeletedAuthor->id) ]) }}" class="mr-2 btn btn-success btn-sm">Restore</a>
                                <a href="{{ route('authorPermanentDelete', ['id'=>Crypt::encrypt($softDeletedAuthor->id) ]) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
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
