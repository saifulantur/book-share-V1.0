@extends('layouts.backendapp')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Author Form</div>
                <div class="card-body">
                    <form action="{{ route('authorUpdate', ['id'=>Crypt::encrypt($author->id)]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="author_name">Author Name</label>
                            <input placeholder="Enter Author Name" type="text" name="author_name" value="{{ $author->author_name }}" id="author_name" class="form-control">

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
