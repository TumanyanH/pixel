@extends('multiauth::layouts.app')

@section('content')

<a href="{{ route('admin.product.create', ['category_id' => $category->id]) }}" class="btn btn-success">+ Ավելացնել ապրանք</a>

@foreach($category->products as $product)
<div class="card" style="width: 18rem;">
    <img src="/uploads/products/{{ $product->colors[0]->color_image }}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->sale_price }} դրամ</p>
        @if($product->sale_discount != 0)
        <p style="text-decoration: line-through;" class="card-text">{{ $product->price }} դրամ</p>
        @endif
        <a href="{{ route('admin.product.show', ['product' => $product->id]) }}" class="btn btn-primary">Մանրամասներ</a>
    </div>
</div>

@endforeach

@endsection