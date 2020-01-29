@extends('multiauth::layouts.app')

@section('content')

@foreach($languages as $language)
<a href="{{ route('admin.about-us.edit', ['about_us' => $language->prefix]) }}" class="btn btn-success text-uppercase">{{ $language->prefix }}</a>
@endforeach

@endsection