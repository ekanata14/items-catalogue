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
        <div class="table-responsive col-10">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Item Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sell Price</th>
                    <th>Stock</th>
                    <th>Sold</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->sell_price }}</td>
                        <td>@php
                            $itemIn = $item->inout->map(function($i){
                                return collect($i->toArray())->only('in')->all();
                            });

                            $itemOut = $item->inout->map(function($o){
                                return collect($o->toArray())->only('out')->all();
                            });

                            $resultIn = 0;
                            $resultOut = 0;

                            foreach($itemIn as $in){
                                foreach($in as $i){
                                    $resultIn += (int)$i;
                                }
                            }

                            foreach($itemOut as $out){
                                foreach($out as $o){
                                    $resultOut += (int)$o;
                                }
                            }

                            $result = $resultIn - $resultOut;
                            echo $result;

                        @endphp</td>
                        <td>@php
                            $itemOut = $item->inout->map(function($o){
                                return collect($o->toArray())->only('out')->all();
                            });

                            $resultOut = 0;

                            foreach($itemOut as $out){
                                foreach($out as $o){
                                    $resultOut += (int)$o;
                                }
                            }

                            echo $resultOut;
                        @endphp</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                        <td class="d-flex gap-2">
                            <button class="btn btn-warning" id="updateItemButton" data-bs-toggle="modal" data-bs-target="#modal" data-id="{{ $item->id }}" data-catid = "{{ $item->category_id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-sellPrice="{{ $item->sell_price }}"><i class="fas fa-pen"></i></button>
                            <form action="/items/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>No</th>
                    <th>Item Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sell Price</th>
                    <th>Stock</th>
                    <th>Sold</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
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
                @php
                @endphp
                <div class="form-group">
                    <label for="category">Item Category</label>
                    <select name="category_id" id="category" class="form-select @error('category') is-invalid @enderror">
                        @foreach($categories as $category)
                            @if($_COOKIE['category_id'] == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category')
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
                {{-- <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control form-control-user @error('stock') is-invalid @enderror" placeholder="Stock" required autofocus >
                    @error('stock')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div> --}}
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
