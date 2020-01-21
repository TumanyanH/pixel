@extends('multiauth::layouts.app')

@section('content')

<form action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group bmd-form-group">
        <label for="exampleProductNameLabel" class="bmd-label-floating">Ապրանքի անունը</label>
        <input type="text" class="form-control" id="exampleProductNameLabel" name="name" value="{{ $product->name }}">
    </div>
    <div class="form-group bmd-form-group">
        <label for="exampleProductPriceLabel" class="bmd-label-floating">Գինը</label>
        <input type="text" class="form-control" id="exampleProductPriceLabel" name="price" value="{{ $product->price }}">
    </div>
    <div class="form-group bmd-form-group">
        <label for="exampleProductSaleLabel" class="bmd-label-floating">Զեղջ</label>
        <input type="text" class="form-control" id="exampleProductSaleLabel" name="sale_price" value="{{ $product->sale_price }}">
    </div>
    <h3>Տարբերակներ ըստ հիշողության</h3>
    <div class="storages">
        @foreach($product->storages->sortBy('storage') as $storage)
        <div class="form-group bmd-form-group row">
            <div class="col-10">
                <label class="bmd-label-floating">Տարբերակներ ըստ հիշողության</label>
                <input type="text" class="form-control" name="storages[]" value="{{ $storage->storage }}">
            </div>
            <div class="col-2">
                <button onclick="$(this).parent().parent().remove()" class="btn btn-danger"><i class="material-icons">delete_forever</i></button>
            </div>
        </div>
        @endforeach
    </div>
    
    

    <div class="row">
        <div class="col-10">
            <div class="form-group bmd-form-group example-storage row" style="display:none">
                <div class="col-10">
                    <label class="bmd-label-floating">Տարբերակներ ըստ հիշողության</label>
                    <input type="text" class="form-control storage-naming">
                </div>
                <div class="col-2">
                    <button onclick="$(this).parent().parent().remove()" class="btn btn-danger"><i class="material-icons">delete_forever</i></button>
                </div>
            </div>
        </div>
        <div class="col-2">
            <button type="button" class="add-storage-input btn btn-success">+</button>
        </div>
    </div>

    <h3>Գույները</h3>
    <div class="colors">
        @foreach($product->colors as $color)
        <label>Ընտրել գույնը</label>
        <div>
            <input type="color" name="colors[]" value="{{ $color->color }}">

            <div class="form-group bmd-form-group">
                <label for="example{{ $color->color_name }}Label" class="bmd-label-floating">Գույնի անունը</label>
                <input type="text" class="form-control" id="example{{ $color->color_name }}Label" name="color_names[]" value="{{ $color->color_name }}">
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 offset-4">
                    <h4 class="title">Գույնի նկարը </h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img src="/uploads/products/{{ $color->color_image }}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="hidden" class="color-image-has-image" name="image_ids[]" value="{{ $color->id }}">
                        <input type="file" class="color-images-naming" name="color_images[]">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                    </div>
                </div>
            </div>
            <button onclick="$(this).parent().remove()" class="btn btn-danger"><i class="material-icons">delete_forever</i></button>

        </div>
        @endforeach
        <div class="example-color" style="display: none">
            <input type="color" class="input-color-naming">

            <div class="form-group bmd-form-group">
                <label for="exampleSaleLabel" class="bmd-label-floating">Գույնի անունը</label>
                <input type="text" class="form-control input-color-name-naming" id="exampleSaleLabel">
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 offset-4">
                    <h4 class="title">Գույնի նկարը </h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img src="/assets/img/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" class="input-color-image-naming">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                    </div>
                </div>
            </div>
            <button onclick="$(this).parent().remove()" class="btn btn-danger"><i class="material-icons">delete_forever</i></button>
            
        </div>
    </div>
    <button type="button" class="add-color-input btn btn-success">+ Ավելացնել գույն</button>


    <button class="btn btn-lg btn-primary float-right" type="submit">Ավելացնել</button>
</form>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.add-storage-input').click(function() {
        var example_storage = $('.example-storage').clone();
        example_storage.removeClass('example-storage');
        example_storage.css({'display' : 'block'});
        example_storage.find('.storage-naming').attr('name', 'storages[]');
        $('.storages').append(example_storage);
    })
    $('.add-color-input').click(function() {
        var example_color = $('.example-color').clone();
        example_color.removeClass('example-color');
        example_color.css({
            'display' : 'block'
        })
        example_color.find('.input-color-naming').attr('name', 'colors[]')
        example_color.find('.input-color-name-naming').attr('name', 'color_names[]')
        example_color.find('.input-color-image-naming').attr('name', 'color_images[]')
        $('.colors').append(example_color);
    })
})
</script>
@endsection