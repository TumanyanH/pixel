@extends('multiauth::layouts.app')

@section('content')

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
                <th>Ապրանք</th>
                <th>Քանակ</th>
                <th>Ստացման եղանակ</th>
                <th>Արժեք</th>
                <th>Անուն Ազգանուն</th>
                <th>Հասցե</th>
                <th>Հեռ․</th>
                <th>Էլ․ հասցե</th>
                <th>Կարգավիճակ</th>
                <th>Պատվիրված</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td><button type="button" class="btn btn-primary modal-product-details" data-products="{{ $order->id }}">Տեսնել</button></td>
              <td>{{ $order->quantity }}</td>
              <td>{{ $order->recieve_method }}</td>
              <td>{{ $order->amount }}</td>
              <td>{{ $order->fullname }}</td>
              <td>{{ $order->address }}</td>
              <td>{{ $order->phone_number }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->status }}</td>
              <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{ $orders->links() }}



{{-- Modal --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table">
            <thead>
                <th>
                    <tr>Ապրանք</tr>
                    <tr>Գին</tr>
                </th>
            </thead>
            <tbody>
                <td>
                    <tr id="product-model">Մոդել</tr>    
                    <tr id="product-price">դր.</tr>    
                </td>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</div>
</div>
{{-- end modal --}}

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.modal-product-details').click(function(){
            var id = $(this).data('id');

            $.ajax({
                dataType : 'json',
                type : 'get',
                url : '/admin/order/'+id+'/details',
                success : function(res) {
                    alert(res)
                }
            })
        })
    })
</script>
@endsection