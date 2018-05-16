@extends('layouts.home')

@section('content')
<div class="container-fluid">
    <home :csrf="{{json_encode(csrf_token())}}" :files="{{json_encode($files)}}" :folders="{{json_encode($folders)}}" :root_folder_id="{{$root_folder_id}}"></home>
</div>
@endsection
