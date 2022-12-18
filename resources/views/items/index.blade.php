@extends('layouts.app')

@section('content')

<div class="container">
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
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                    <input type="text" name="name" class="form-control form-control-user" placeholder="Item Name" required autofocus>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection
