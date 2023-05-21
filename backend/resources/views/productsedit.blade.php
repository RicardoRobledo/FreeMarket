@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="text-center">Product info</h2>
@stop

@section('content')
<div class="container rounded p-3">
    <form action="{{ route('products.update', $product->id) }}" class="row g-3 p-3" method="POST">
      @csrf
      @method('PUT')
      <div class="col-md-4">
        <label htmlFor="validationServer01">Name</label>
        <input type="text"
          placeholder="Albert"
          value="{{$product->name}}"
          class="form-control is-valid"
          name="name"
          regex="^([A-Z]{1}[a-z]*)(\s{1}([a-z]+)(\s{1}([0-9]+))*)*$"
        />
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Price</label>
        <input
          placeholder="Smith"
          type="text"
          class="form-control is-valid"
          regex="^([0-9]*\.{0,1}[0-9]*)$"
          name="price"
          value="{{$product->price}}"
        />
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer03" class="form-label">Description</label>
        <input
          placeholder="Becker"
          type="text"
          name="description"
          class="form-control is-valid"
          value="{{$product->description}}"
          regex="^([A-Z]{1}[a-z]+)(\s{1}[a-z]+)*$"
        />
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Image</label>
        <textarea name="image" id="" cols="70" rows="10">{{$product->image}}</textarea>
      </div>
      <div class="col-12 mt-5 text-center">
        <button class="btn btn-primary w-100" type="submit">Modify</button>
      </div>
    </form>
  </div>
@stop

@section('css')
@stop

@section('js')
@stop