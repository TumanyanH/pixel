@extends('multiauth::layouts.app')

@section('content')

<form action="{{ route('admin.brand.store') }}" method="POST">
    @csrf
    <div class="form-group bmd-form-group">
        <label for="add-brand" class="bmd-label-floating">Բրենդի անուն</label>
        <input id="add-brand" name="name" type="text" class="form-control">
    </div>
    <button class="btn btn-success">Ավելացնել</button>
</form>

<div class="container-fluid">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
            <i class="material-icons">branding_watermark</i>
            </div>
            <h4 class="card-title ">Բրենդներ</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th></th>
                        <th>Անուն</th>
                        <th colspan="2">Գործողություններ</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach($brands as $brand)
                    <tr class="brand">
                        <input type="hidden" class="brand_id" data-id="{{ $brand->id }}">
                        <td><img width="20px" src="/assets/img/move.png"></td>
                        <td><b>{{ $brand->name }}</b></td>
                        <td>
                            <div class="dropdown show">
                                <button class="dropdown-toggle btn btn-primary btn-round btn-block" type="button" id="dropdownMenuButton-{{ $brand->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Կատեգորիաներ
                                    <div class="ripple-container"></div>
                                </button>
                                <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton-{{ $brand->id }}" x-placement="top-start" style="position: absolute; top: -163px; left: 1px; will-change: top, left;">
                                    <h6 class="dropdown-header"></h6>
                                    <a class="dropdown-item">Ավելացնել</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Ջնջել</a>
                            <form id="destroy-form" action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
        

@endsection

@section('scripts')
<script>
    $('#sortable').sortable();
    $('#sortable').sortable({
        update: function(event, ui) {
            var brand = $('.brand')
            ids = [];
            brand.each(function(e) {
                ids.push($(this).children('input').data('id'));
            });
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    ids : ids
                },
                url: '{{ route("admin.brand.changeSort") }}',
                success: function(res) {

                }
            })
        }
    });
</script>
@endsection