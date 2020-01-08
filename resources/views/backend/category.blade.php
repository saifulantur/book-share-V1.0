@extends('layouts.backendapp')
@section('backend_content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Category Form</div>
                <div class="card-body">
                    <form action="{{ route('categoryStore') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input placeholder="Enter Category Name" type="text" name="category_name" id="category_name" class="form-control">

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
                <div class="card-header bg-primary text-white">Categories List</div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $category->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('categoryEdit', ['id'=>Crypt::encrypt($category->id) ]) }}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('categoryDestroy', ['id'=>Crypt::encrypt($category->id) ]) }}"><i class="far fa-trash-alt"></i></a>
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
                            <th>Category Name</th>
                            <th>Created Time</th>
                            <th>Deleted Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($softDeletedCategories as $softDeletedCategory)
                            <tr>
                                <td>{{ $softDeletedCategory->category_name }}</td>

                                <td>{{ $softDeletedCategory->created_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedCategory->created_at->diffForHumans() }}
                                </td>

                                <td>{{ $softDeletedCategory->deleted_at->format('d-M-Y h:i:s A') }}
                                    <br>
                                    {{ $softDeletedCategory->deleted_at->diffForHumans() }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('categoryRestore', ['id'=>Crypt::encrypt($softDeletedCategory->id) ]) }}" class="mr-2 btn btn-success btn-sm">Restore</a>
                                    <a href="{{ route('categoryPermanentDelete', ['id'=>Crypt::encrypt($softDeletedCategory->id) ]) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
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
