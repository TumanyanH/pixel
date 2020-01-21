@extends('multiauth::layouts.app')

@section('content')
@php
  $_COOKIE['config_id'] = '';    
@endphp
{{-- sweetalert --}}
<div class="alert alert-success" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="material-icons">close</i>
  </button>
  <span class="success-text">
    <b> Success - </b> This is a regular notification made with ".alert-success"</span>
</div>

<div class="alert alert-danger" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="material-icons">close</i>
  </button>
  <span class="success-text">
    <b> Success - </b> This is a regular notification made with ".alert-success"</span>
</div>
{{-- endsweetalert --}}

<div class="card">
    <div class="card-header card-header-icon card-header-rose">
      <div class="card-icon">
        <i class="material-icons">assignment</i>
      </div>
      <h4 class="card-title ">Հնարավոր կոնֆիգուրացիաներ</h4>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr>
                <th>Մոդել</th>
                <th>Գույն</th>
                <th>Գին</th>
                <th>Զեղջված գին</th>
                <th>Առկա քանակ</th>
                <th>Գործողույուն</th>
            </tr>
          </thead>
          <tbody>

            @foreach($configs as $config)
            <tr>
              <td>{{ $config->product->name }}</td>
              <td>{{ $config->color->color_name }}</td>
              <td><input type="number" class="price" value="{{ $config->price }}"></td>
              <td><input type="number" class="sale_price" value="{{ $config->sale_price }}"></td>
              <td><input type="number" class="in_stock" value="{{ $config->in_stock }}"></td>
              <td><button class="save-config btn btn-success" data-id="{{ $config->id }}">Պահպանել</button></td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.save-config').click(function() {
            var id = $(this).data('id');
            
              $.ajax({
                type: 'PATCH', 
                data: {
                  price : $(this).parent().siblings().find('.price').val(),                     
                  sale_price : $(this).parent().siblings().find('.sale_price').val(),                    
                  in_stock : $(this).parent().siblings().find('.in_stock').val(),
                },
                
                url: '/admin/product-other/configuration/'+id,
                success: function(res) {
                  if(res == 'success') {
                    $('.alert-success').find('.success-text').text('Հաջողությամբ փոփոխվեց');
                    $('.alert-success').fadeIn(200);
                  } else {
                    $('.alert-danger').find('.success-text').text('Հաջողությամբ փոփոխվեց');
                    $('.alert-danger').fadeIn(200);
                  }
                } 
            })

        })
    })
</script>
@endsection