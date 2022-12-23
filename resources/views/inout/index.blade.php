@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>In Out Records</h1>
        <div class="row">
            <div class="col-6">
                <form action="/inout/search" method="POST" class="gap-3">
                    @csrf
                    <div class="d-flex gap-3 align-items-center">
                        <label for="start_date">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ (isset($request)) ? $request : ''}}">
                        <button class="btn btn-info" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary my-3" id="addInOutButton" data-bs-toggle="modal" data-bs-target="#modal">Add Records <i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="row">
            @if($inouts->count() == 0)
                <tr>
                    <td>
                        <h3>No Results Found</h3>
                    </td>
                </tr>
            @else
            <div class="table-responsive col-10">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Item Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach ($inouts as $inout)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inout->items_id }}</td>
                                <td>{{ $inout->category->name }}</td>
                                <td>{{ $inout->name }}</td>
                                <td>{{ $inout->in }}</td>
                                <td>{{ $inout->out }}</td>
                                <td>{{ $inout->inout_date }}</td>
                                {{-- <td>{{ date('d-m-Y', strtotime($inout->created_at))}}</td> --}}
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <th>No</th>
                        <th>Item Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Date</th>
                    </tfoot>
                </table>
                <div class="mt-4">
                    {{ $inouts->links() }}
                </div>
            </div>
            @endif
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
                    <select name="items_id" id="itemsId" class="form-select mb-3" @error('name') is-invalid @enderror">
                        @foreach($items as $item)
                            <option value="{{ $item->id }},{{ $item->category_id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror

                    <input type="date" id="date" name="inout_date" class="form-control form-control-user @error('date') is-invalid @enderror mb-3" placeholder="In Out Date" required autofocus>

                    @error('date')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror

                    <input type="number" id="in" name="in" class="form-control form-control-user @error('in') is-invalid @enderror mb-3" placeholder="Item In" required autofocus>

                    @error('in')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                    <input type="number" id="out" name="out" class="form-control form-control-user @error('out') is-invalid @enderror" placeholder="Item Out" required autofocus>

                    @error('out')
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