@extends('multiauth::layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Add slider image</h2>
    @include('multiauth::homepage.form', [
        'url' => route('admin.homepage.store'),
        'isSlider' => '1',
    ])
</div>
    

@if($ads->count() > 0)

<div class="container-fluid">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
            <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title ">Գովազդ</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>Նկար</th>
                        <th>Հղում</th>
                        <th colspan="2">Գործողություններ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $ad)
                    <tr>
                        <td><img width="200px" src="/uploads/ads/{{ $ad->image }}"></td>
                        <td><a href="{{ $ad->link }}">{{ $ad->link }}</a></td>
                        <td><button type="button" class="btn btn-primary editad" data-toggle="modal" data-id="{{ $ad->id }}" data-target="#exampleEdit">Խմբագրել</button></td>
                        <td><a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Ջնջել</a>
                            <form id="destroy-form" action="{{ route('admin.homepage.destroy', ['homepage' => $ad->id]) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form></td>
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
@endif


@if($sliders->count() > 0)
<div class="container-fluid">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
            <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title ">Սլայդներ</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th></th>
                        <th>Նկար</th>
                        <th>Հղում</th>
                        <th colspan="2">Գործողություններ</th>
                    </tr>
                </thead>
                <tbody id="slider-dragable" class="ui-sortable">
                    @foreach($sliders as $slider)
                    <tr class="slide">
                        <input type="hidden" class="slider_id" data-id="{{ $slider->id }}">
                        <td><img width="30px" src="/assets/img/move.png"></td>
                        <td><img width="200px" src="/uploads/ads/{{ $slider->image }}"></td>
                        <td><a href="{{ $slider->link }}">{{ $slider->link }}</a></td>
                        <td><button type="button" class="btn btn-primary editad" data-id="{{ $slider->id }}" data-toggle="modal" data-target="#exampleEdit">Խմբագրել</button></td>
                        <td><a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Ջնջել</a>
                         <form id="destroy-form" action="{{ route('admin.homepage.destroy', ['homepage' => $slider->id]) }}" method="POST" style="display: none;">
                             @method('DELETE')
                             @csrf
                         </form></td>
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
@endif  

{{-- Modal --}}
<div class="modal fade" id="exampleEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Խմբագրում</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body edit-modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            @include('multiauth::homepage.form')
        </form>
    </div>
    
    </div>
</div>
</div>
{{-- End Modal --}}

        

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $( "#slider-dragable" ).sortable();
        var ids = [];
        $( "#slider-dragable" ).sortable({
            update: function(event, ui) {
                var slide = $('.slide')
                ids = [];
                slide.each(function(e) {
                    ids.push($(this).children('input').data('id'));
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data : {
                        ids : ids,
                    },
                    url : '/admin/homepage/changeSort',
                    success : function (res) {
                        alert(res)
                    }
                })
            }
        });

        $( ".editad" ).click(function(){
            var id = $(this).data('id'); 
            // console.log();
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), 
                    id: id
                },
                url: '{{ route("admin.homepage.getDetails") }}',
                success: function(res){
                    $('.edit-modal-body').find('form').attr('action', res['updateUrl'] )
                    $('.edit-modal-body').find('form').prepend( '@method("PATCH")' );
                    $('.edit-modal-body').find('img').attr('src', '/uploads/ads/' + res['image']);
                    $('.edit-modal-body').find('.fileinput-new-btn').hide();
                    $('.edit-modal-body').find('.fileinput-exists-btn').show();
                    $('.edit-modal-body').find('input[name="adLink"]').val(res['link']);
                    $('.edit-modal-body').find('.select-ad-type').hide();
                }
            })
        })
    })
    
</script>
@endsection
