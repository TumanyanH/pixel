@extends('multiauth::layouts.app')

@section('content')

<form action="{{ route('admin.product.description.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <input type="hidden" name="product_id" value="{{ $product_id }}">
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
                    <input type="file" name="image">
                    </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body ">
            <ul class="nav nav-pills nav-pills-warning" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#lang1" role="tablist">
                    Հայերեն
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#lang2" role="tablist">
                    Ռուսերեն
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#lang3" role="tablist">
                    Անգլերեն
                </a>
                </li>
            </ul>
            <div class="tab-content tab-space">
                <div class="tab-pane active" id="lang1">
                    <div class="form-group bmd-form-group">
                        <label for="add-brand" class="bmd-label-floating">Նկարագրության անուն</label>
                        <input id="add-brand" name="am[name]" type="text" class="form-control">
                    </div>
                    <textarea  name="am[description]" class="froala"></textarea>
                </div>
                <div class="tab-pane" id="lang2">
                    <div class="form-group bmd-form-group">
                        <label for="add-brand" class="bmd-label-floating">Նկարագրության անուն</label>
                        <input id="add-brand" name="ru[name]" type="text" class="form-control">
                    </div>
                    <textarea  name="ru[description]" class="froala"></textarea>                
                </div>
                <div class="tab-pane" id="lang3">
                    <div class="form-group bmd-form-group">
                        <label for="add-brand" class="bmd-label-floating">Նկարագրության անուն</label>
                        <input id="add-brand" name="en[name]" type="text" class="form-control">
                    </div>
                    <textarea  name="en[description]" class="froala"></textarea>
                </div>
            </div>
            </div>
        </div>
        </div>
</div>
    

    <button type="submit" class="btn btn-success float-right">Հաստատել</button>
</form>

@endsection

@section('scripts')
<script>
    var editor = new FroalaEditor('.froala')
</script>
@endsection