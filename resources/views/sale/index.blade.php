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
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sell Price</th>
                        <th>Amount</th>
                        <th>Total</th>

                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->sell_price }}</td>
                            <td>@php
                                $itemOut = $item->inout->map(function($i){
                                    return collect($i->toArray())->only('out')->all();
                                });

                                $resultOut = 0;

                                foreach($itemOut as $out){
                                    foreach($out as $o){
                                        $resultOut += $o;
                                    }
                                }

                                echo $resultOut;

                                // echo number_format($item->sell_price * $resultOut, 2, '.', ',');
                        @endphp</td>
                            <td id="total">{{ $item->sell_price * $resultOut }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>Grand Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>1000</th>
                        <th id="grandTotal"></th>
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
                    <select name="name" id="itemName" class="form-select" @error('name') is-invalid @enderror">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                    <input type="number" id="amount" name="amount" class="form-control form-control-user @error('amount') is-invalid @enderror" placeholder="Item Amount" required autofocus>

                    @error('amount')
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

  <script>
    const total = document.querySelectorAll('#total');
    let result = 0;

    total.forEach((item)=>{
        result += parseInt(item.innerHTML);
    })

    const grandTotal = document.querySelector('#grandTotal');
    grandTotal.innerHTML = result;
  </script>
@endsection