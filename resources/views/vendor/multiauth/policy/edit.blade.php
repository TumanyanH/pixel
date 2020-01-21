@extends('multiauth::layouts.app')

@section('content')

<form action="{{ route('admin.privacy-policy.update', ['privacy_policy' => $privacy->id]) }}" method="POST">
    @csrf 
    @method('PATCH')
    <div class="form-group bmd-form-group">
        <label for="exampleTitle" class="bmd-label-floating">Վերնագիր</label>
        <input type="text" name="title" class="form-control" id="exampleTitle" value="{{ $privacy->title }}">
    </div>

    <textarea  name="content" class="froala">{{ $privacy->content }}</textarea>

    <button type="submit" class="btn btn-success float-right">Փոփոխել</button>
</form>
    

@endsection

@section('scripts')
<script>
    var editor = new FroalaEditor('.froala')
</script>
@endsection