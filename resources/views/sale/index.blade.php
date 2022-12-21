@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Sale Records</h1>
        <div class="row">
            <div class="col-6">
                <form action="/sale" method="POST" class="gap-3">
                    @csrf
                    <div class="d-flex gap-3 align-items-center">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control">
                        <button class="btn btn-info" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary my-3" id="addRecordButton" data-bs-toggle="modal" data-bs-target="#modal">Add Records <i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sell Price</th>
                        <th>Amount</th>
                        <th>Total</th>

                    </thead>
                    <tbody>
                        {{-- @foreach ($items as $item)
                        
                        <td>{{ $loop->iteration }}</td>
                        @endforeach --}}
                    </tbody>
                    <tfoot>
                        <th>Grand Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>1000</th>
                        <th>10000</th>
                    </tfoot>
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