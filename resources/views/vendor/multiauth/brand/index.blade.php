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
                <tbody>
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


<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Բրենդներ</h4>
        </div>
        <div class="card-body">
          <div id="accordion" role="tablist">
            @php $a = 1; @endphp
            @foreach($brands as $brand)
            <div class="card-collapse">
              <div class="card-header" role="tab" id="heading-{{ $a }}">
                <h5 class="mb-0">
                  <a data-toggle="collapse" href="#collapse-{{ $a }}" aria-expanded="@if($a == 1) true @else false @endif" aria-controls="collapseOne" class="@if($a == 1) collapsed @endif">
                    <img width="15px" src="/assets/img/move.png">
                    {{ $brand->name }}
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </h5>
              </div>
              <div id="collapse-{{ $a }}" class="collapse @if($a == 1) show @endif" role="tabpanel" aria-labelledby="heading-{{ $a }}" data-parent="#accordion" style="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <a class="btn btn-success" href="#"> + Ավելացնել կատեգորիա</a>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Ջնջել</a>
                            <form id="destroy-form" action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>
                    
                </div>
              </div>
            </div>

            @php $a++; @endphp
            @endforeach
            

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title">Navigation Pills Icons -
            <small class="description">Vertical Tabs</small>
          </h4>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
              <ul class="nav nav-pills nav-pills-rose nav-pills-icons flex-column" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                    <i class="material-icons">dashboard</i> Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                    <i class="material-icons">schedule</i> Settings
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-8">
              <div class="tab-content">
                <div class="tab-pane active" id="link110">
                  Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                  <br>
                  <br> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                  <br>
                  <br> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                </div>
                <div class="tab-pane" id="link111">
                  Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                  <br>
                  <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
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
    $('#accordion').sortable();
    $('#accordion').sortable({
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