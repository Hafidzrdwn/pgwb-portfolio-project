@extends('layouts.admin', ['title' => 'Dashboard'])

@section('header', 'Dashboard')

@section('content')
@if($msg = Session::get('success'))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {!! $msg !!}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
@endif

@endsection
