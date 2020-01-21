@extends('multiauth::layouts.app')

@section('content')

@foreach($languages as $language)
<a href="{{ route('admin.privacy-policy.edit', ['privacy_policy' => $language->prefix]) }}" class="btn btn-success text-uppercase">{{ $language->prefix }}</a>
@endforeach

@endsection