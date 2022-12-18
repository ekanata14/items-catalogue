@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello, {{ auth()->user()->name }}</h1>
        </div>
    </div>
</div>
@endsection
