@extends('multiauth::layouts.app')

@section('content')
    <h3>Հաճախ տրվող հարցեր</h3>
    @foreach($hths as $hth)
    <form action="{{ route('admin.info.update', ['info' => $hth->id]) }}" >
    @csrf
    @method('PATCH')
        <div class="form-group bmd-form-group">
            <textarea name="{{ $hth->prefix }}" class="froala">{{ $hth->text }}</textarea>
        </div>
        <button class="btn btn-success float-right">Պահպանել</button>
    </form>
    <br>
    @endforeach
    
    <h3>Բանկերի պայմաններ</h3>
    @foreach($banks as $bank)
    <form action="{{ route('admin.info.update', ['info' => $bank->id]) }}" >
    @csrf
    @method('PATCH')
        <div class="form-group bmd-form-group">
            <textarea name="{{ $bank->prefix }}" class="froala">{{ $bank->text }}</textarea>
        </div>
        <button class="btn btn-success float-right">Պահպանել</button>
    </form>
    <br>
    @endforeach
    


@endsection

@section('scripts')
<script>
    var editor = new FroalaEditor('.froala')
</script>
@endsection