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
          class="form-control"
          name="name"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Price</label>
        <input
          placeholder="Smith"
          type="text"
          class="form-control"
          name="price"
          value="{{$product->price}}"
        />
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer03" class="form-label">Description</label>
        <input
          placeholder="Becker"
          type="text"
          name="description"
          class="form-control"
          value="{{$product->description}}"
        />
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