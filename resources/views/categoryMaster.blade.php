@extends('layouts.app')

@section('content')
<div class="container-fluid">
      <!-- Page Heading -->
 
  <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
    <h1 class="h3 mb-0 text-gray-800">Category List</h1>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Categories</div>
                <div><a href="{{ route('category.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Add Category Item</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i>Edit</a>
                                <form action="{{ route('category.destroy', $category) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu item?')"><i class="fas fa-trash"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
