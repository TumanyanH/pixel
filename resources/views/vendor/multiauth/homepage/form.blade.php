<form action="{{ $url ?? ''}}" method="POST" enctype="multipart/form-data">
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

    <div class="row">
        <div class="col-md-4 col-sm-4 offset-md-4 offset-sm-4 text-center">
            <h4 class="title">Նկար</h4>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <img class="image-edit" src="/assets/img/image_placeholder.jpg">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
            <div>
                <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new fileinput-new-btn">Ընտրեք նկար</span>
                <span class="fileinput-exists fileinput-exists-btn">Փոփոխել</span>
                <input type="hidden"><input type="file" name="adImage">
                </span>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 offset-md-3 offset-sm-3">
            <div class="form-group bmd-form-group">
                <label for="exampleAdLink" class="bmd-label-floating">Հղումը</label>
                <input type="text" class="form-control" name="adLink" id="exampleAdLink">
            </div>
        </div>
    </div>
    <div class="row select-ad-type">
        <div class="col-md-6 col-sm-6 offset-md-3 offset-sm-3 text-center">
            <div class="form-group">
                <select class="selectpicker" name="isSlider">
                    <option disabled>Տեսակ</option>
                    <option value="1">Սլայդ</option>
                    <option value="0">Գովազդ</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
        <button type="submit" class="btn btn-fill btn-rose">Հաստատել<div class="ripple-container"></div></button>
        </div>
    </div>
</form>