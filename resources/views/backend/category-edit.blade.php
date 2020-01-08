@extends('layouts.backendapp')
@section('backend_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Category Form</div>
                <div class="card-body">
                    <form action="{{ route('categoryUpdate', ['id'=>Crypt::encrypt($category->id) ]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input placeholder="Enter Category Name" type="text" name="category_name" value="{{ $category->category_name }}" id="category_name" class="form-control">

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
