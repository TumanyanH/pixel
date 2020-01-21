@extends('multiauth::layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
    <form action="{{ route('admin.product-other.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="brand_category_id" value="{{ $category_id }}">
        <div class="form-group bmd-form-group">
            <label for="exampleProductNameLabel" class="bmd-label-floating">Ապրանքի անունը</label>
            <input type="text" class="form-control" id="exampleProductNameLabel" name="name">
        </div>
        <div class="form-group bmd-form-group">
            <label for="examplePriceLabel" class="bmd-label-floating">Գինը</label>
            <input type="number" class="form-control" id="examplePriceLabel" name="price">
        </div>
        <div class="form-group bmd-form-group">
            <label for="exampleSaleLabel" class="bmd-label-floating">Զեղջ</label>
            <input type="number" class="form-control" id="exampleSaleLabel" name="sale_price">
        </div>
        
        <h3>Գույները</h3>
        <div class="colors">
            <label>Ընտրել գույնը</label>
            <div class="example-color">
                <input type="color" name="colors[]">

                <div class="form-group bmd-form-group">
                    <label for="exampleSaleLabel" class="bmd-label-floating">Գույնի անունը</label>
                    <input type="text" class="form-control" id="exampleSaleLabel" name="color_names[]">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 offset-4">
                        <h4 class="title">Գույնի նկարը </h4>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="color_images[]">
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <button type="button" class="add-color-input btn btn-success">+ Ավելացնել գույն</button>
        </div>
        <button class="btn btn-lg btn-primary float-right" type="submit">Ավելացնել</button>
    </form>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        
        $('.add-color-input').click(function() {
            var example_color = $('.example-color').clone();
            example_color.removeClass('example-color');
            $('.colors').append(example_color);
        })
    })
</script>
@endsection