@extends('multiauth::layouts.app')

@section('content')
<form action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="post">
    @csrf
    <input type="text" name="name" value="{{  }}">
</form>

@endsection