@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="text-center">Product data</h2>
@stop

@section('content')
<div class="container rounded p-3">
    <form action="{{ route('shopping.update', $shopping->id) }}" class="row g-3 p-3" method="POST">
      @csrf
      @method('PUT')
      <div class="col-md-4">
        <label htmlFor="validationServer01">User_id</label>
        <input type="text"
          placeholder="Albert"
          class="form-control"
          name="user_id"
          value="{{ $shopping->user_id }}"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Product_id</label>
        <input
          placeholder="Smith"
          type="text"
          class="form-control"
          name="product_id"
          value="{{ $shopping->product_id }}"
        />
      </div>
      <div class="col-12 mt-5 text-center">
        <button class="btn btn-primary w-100" type="submit">Create</button>
      </div>
    </form>
  </div>
@stop

@section('css')
@stop

@section('js')
@stop