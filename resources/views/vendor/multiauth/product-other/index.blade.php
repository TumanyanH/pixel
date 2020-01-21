@extends('multiauth::layouts.app')

@section('content')

    @foreach($brands as $brand)
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            {{ $brand->name }}            
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach($brand->categories as $category)
            @if(\App\Product::get_product_category_type($category->id) == 1)
            <li><a href="{{ route('admin.product-other.showAllProducts', ['id' => $category->id]) }}" class="open-category-btn">{{ $category->translate('am', 'name') }}</a></li>
            @else
            <li><a href="{{ route('admin.product.showAllProducts', ['id' => $category->id]) }}" class="open-category-btn">{{ $category->translate('am', 'name') }}</a></li>
            @endif
            @endforeach
        </ul>
    </div>
    @endforeach

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

    })
</script>
@endsection