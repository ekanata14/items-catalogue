@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif
    <h1>Category</h1>
    <button id="addCategoryButton" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modal">Add Item <i class="fas fa-plus"></i></button>
    <div class="row">
        <div class="table-responsive col-6">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex gap-2">
                            <button class="btn btn-warning" id="updateCategoryButton" data-bs-toggle="modal" data-bs-target="#modal" data-id="{{ $category->id }}" data-name="{{ $category->name }}"><i class="fas fa-pen"></i></button>
                            <form action="/category/{{ $category->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="modalBody" class="modal-body">
            <form method="POST" id="modalForm">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" id="categoryName" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Category Name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="buttonSubmit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>



@endsection
