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
<form action="{{ route('admin.brand.store') }}" method="POST">
    @csrf
    <select class="selectpicker" name="isCategory">
      <option disabled selected>Տեսակը</option>
      <option value="1">Կատեգորիա</option>
      <option value="0">Բրենդ</option>
    </select>
    <div class="form-group bmd-form-group">
        <label for="add-brand" class="bmd-label-floating">Կատեգորիայի անուն</label>
        <input id="add-brand" name="name" type="text" class="form-control">
    </div>
    <button class="btn btn-success">Ավելացնել</button>
</form>



<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Կատեգորիաներ</h4>
        </div>
        <div class="card-body">
          <div id="accordion" role="tablist">
            @php $a = 1; @endphp
            @foreach($brands as $brand)
              <div class="card-collapse brand" data-id="{{ $brand->id }}">
                <div class="card-header" role="tab" id="heading-{{ $a }}">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-{{ $a }}" aria-expanded="false" aria-controls="collapseOne">
                    <img width="15px" src="/assets/img/move.png">
                    <form id="edit-brand-name" action="{{ route('admin.brand.update', ['brand' => $brand->id]) }}" method="post">
                      @csrf
                      @method('PUT')
                      <span id="brand-name-{{ $brand->id }}">{{ $brand->name }}</span>
                    </form>
                    <i class="material-icons">keyboard_arrow_down</i>
                  </a>
                </h5>
              </div>
              <div id="collapse-{{ $a }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $a }}" data-parent="#accordion" style="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-success addSubCategory" data-toggle="modal" data-id="{{ $brand->id }}" data-target="#addSubcategoryModal"> + Ավելացնել կատեգորիա</a>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary editBrand" data-id="{{ $brand->id }}" > Փոփոխել կատեգորիան</a>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Ջնջել</a>
                            <form id="destroy-form" action="{{ route('admin.brand.destroy', ['brand' => $brand->id]) }}" method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                          </div>
                        @if($brand->categories->count() > 0)
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Նկար</th>
                                <th>Անուն (Հայ)</th>
                                <th>Անուն (Ռուս)</th>
                                <th>Անուն (Անգլ)</th>
                                <th colspan="2">Գործողություններ</th>
                              </tr>
                            </thead>
                            <tbody class="category_sortable">
                              @foreach($brand->categories->sortBy('sort') as $category)
                                <tr class="category" data-id="{{ $category->id }}">
                                <td><img width="15px" src="/assets/img/move.png"></td>
                                <td><img width="200px" src="/uploads/brand-categories/{{ $category->image }}"></td>
                                @foreach($category->translations as $translation)
                                <td>{{ $translation->name }}</td>
                                @endforeach
                                <td><button class="btn btn-primary editCategory" data-id="{{ $category->id }}">Խմբագրել</button></td>
                                <td>
                                  <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('destroy-subcategory-form').submit();">Ջնջել</a>
                                  <form id="destroy-subcategory-form" action="{{ route('admin.brand.destroySubcategory', ['category' => $category->id]) }}" method="POST" style="display: none;">
                                      @method('DELETE')
                                      @csrf
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        @endif
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
  </div>
  
<!-- Modal -->
<div class="modal fade" id="addSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ավելացնել կատեգորիա</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.brand.storeSubcategory') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="modal_brand_id" name="brand_id">
        @csrf
        <div class="modal-body">
          <div class="card ">
            <div class="card-header ">
              <h4 class="card-title">Ավելացնել Կատեգորիա</h4>
              </div>
              <div class="row">
                  <div class="col-md-4 col-sm-4 offset-4">
                    <h4 class="title">Regular Image</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        <img src="../../assets/img/image_placeholder.jpg" class="modal_brand_image" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="image" class="modal_brand_image">
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="card-body ">
                <ul class="nav nav-pills nav-pills-warning" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                      Հայերեն
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                      Ռուսերեն
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                      Անգլերեն
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-space">
                  <div class="tab-pane active" id="link1">
                      <div class="form-group bmd-form-group">
                          <label for="add-brand" class="bmd-label-floating">Կատեգորիայի անունը</label>
                          <input id="add-brand" name="am[name]" type="text" class="form-control brand_name_am">
                      </div>
                  </div>
                  <div class="tab-pane" id="link2">
                      <div class="form-group bmd-form-group">
                          <label for="add-brand" class="bmd-label-floating">Կատեգորիայի անունը</label>
                          <input id="add-brand" name="ru[name]" type="text" class="form-control brand_name_ru">
                      </div>
                  </div>
                  <div class="tab-pane" id="link3">
                      <div class="form-group bmd-form-group">
                          <label for="add-brand" class="bmd-label-floating">Կատեգորիայի անունը</label>
                          <input id="add-brand" name="en[name]" type="text" class="form-control brand_name_en">
                      </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
    </form>
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
        brands_ids = [];
        brand.each(function(e) {
            brands_ids.push($(this).data('id'));
        });
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                brand_ids : brands_ids
            },
            url: '{{ route("admin.brand.changeSort") }}',
            success: function(res) {

            }
        })
      }
    });

    $('.addSubCategory').click(function() {
      $('#addSubcategoryModal').find('.modal_brand_id').attr('name', 'brand_id').val($(this).data('id'))
    })

    $('.editBrand').click(function() {
      var brandname = $('#brand-name-' + $(this).data('id')).text();
      $('#brand-name-' + $(this).data('id')).replaceWith('<input name="name" type="text" value="' +brandname+ '"> ');
      $(this).removeClass('.editBrand').attr('onclick', 'event.preventDefault(); document.getElementById("edit-brand-name").submit();')
    })

    $('.category_sortable').sortable();

    $('.category_sortable').sortable({
      update: function(event, ui){
        var category = $('.category')
        categories_ids = [];
        category.each(function(e) {
          categories_ids.push($(this).data('id'));
        });
        $.ajax({
          type: 'post',
          dataType: 'json',
          data: {
              category_ids : categories_ids
          },
          url: '{{ route("admin.brand.changeCategorySort") }}',
          success: function(res) {

          }
        })
      }
    });

    $('.editCategory').click(function() {
      var category_id = $(this).data('id');
      $.ajax({
        type: 'post',
        dataType: 'json',
        data: {
          id : category_id
        },
        url: '{{ route("admin.brand.getCategoryDetails") }}',
        success: function(res) {
          $( "#addSubcategoryModal" ).find('.modal_brand_id').val(res['id']);
          $( "#addSubcategoryModal" ).find('form').attr('action', '/admin/brand/'+ res["id"] +'/updateSubcategory');
          $( "#addSubcategoryModal" ).find('.modal_brand_image').attr('src', '/uploads/brand-categories/'+res['image']);
          $( "#addSubcategoryModal" ).find('.brand_name_am').val(res['translations'][0]['name']);
          $( "#addSubcategoryModal" ).find('.brand_name_ru').val(res['translations'][1]['name']);
          $( "#addSubcategoryModal" ).find('.brand_name_en').val(res['translations'][2]['name']);
          $( "#addSubcategoryModal" ).modal('show');
        }
      })
    })
</script>
@endsection