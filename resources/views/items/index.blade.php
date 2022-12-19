@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif
    <h1>Items</h1>
    <button id="addItemButton" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#modal">Add Item <i class="fas fa-plus"></i></button>
    <div class="row">
        <div class="table-responsive col-12">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Item Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sell Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->sell_price }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td class="d-flex gap-2">
                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <button class="btn btn-warning" id="updateItemButton" data-bs-toggle="modal" data-bs-target="#modal" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-sellPrice="{{ $item->sell_price }}"><i class="fas fa-pen"></i></button>
                            <form action="/items/{{ $item->id }}" method="POST">
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
                    <label for="name">Item Name</label>
                    <input type="text" id="itemName" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Item Name" required autofocus>

                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Item Price</label>
                    <input type="text" id="itemPrice" name="price" class="form-control form-control-user @error('price') is-invalid @enderror" placeholder="Price" required autofocus>
                    @error('price')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sell_price">Sell Price</label>
                    <input type="text" id="itemSellPrice" name="sell_price" class="form-control form-control-user @error('sell_price') is-invalid @enderror" placeholder="Sell Price" required autofocus>
                    @error('sell_price')
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