@extends('layouts.home')

@section('content')
<div class="container-fluid">
    <home :csrf="{{json_encode(csrf_token())}}" :files="{{json_encode($files)}}" ></home>
</div>
@endsection
