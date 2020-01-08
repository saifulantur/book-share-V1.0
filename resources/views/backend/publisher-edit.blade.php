@extends('layouts.backendapp')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Publisher Form</div>
                <div class="card-body">
                    <form action="{{ route('publisherUpdate', ['id'=>Crypt::encrypt($publisher->id) ]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Publisher Name</label>
                            <input placeholder="Enter Publisher Name" type="text" name="publisher" value="{{ $publisher->publisher }}" id="publisher" class="form-control">

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
