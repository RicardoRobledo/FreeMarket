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
      <select id="usSelect" class="form-select form-select-lg mb-3">
        <option value="">-------</option>
        @foreach ($us as $usuario)
          <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
        @endforeach
      </select>
      <div class="col-md-4">
        <label htmlFor="validationServer01">User_id</label>
        <input type="text"
          placeholder="Albert"
          class="form-control"
          name="user_id"
          value="{{ $shopping->user_id }}"
          readonly="readonly"
          id="usIdInput"
          required
        />
      </div>
      <select id="productSelect" class="form-select form-select-lg mb-3">
        <option value="">-------</option>
        @foreach ($product as $producto)
          <option value="{{ $producto->id }}">{{ $producto->name }}</option>
        @endforeach
      </select>
      <div class="col-md-4">
        <label htmlFor="validationServer02">Product_id</label>
        <input
          id="productIdInput"
          readonly="readonly"
          placeholder="Smith"
          type="text"
          class="form-control"
          name="product_id"
          value="{{ $shopping->product_id }}"
          required
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
<script>
  // Esperar a que se cargue completamente el DOM
  document.addEventListener('DOMContentLoaded', function() {

var select0 = document.getElementById('usSelect');
var usIdInput = document.getElementById('usIdInput');

// Capturar el evento de cambio del select
select0.addEventListener('change', function() {
  // Obtener el valor seleccionado (ID del producto)
  var selectedUsId = select0.value;

  // Insertar el valor seleccionado en el campo de texto
  usIdInput.value = selectedUsId;
});


// Obtener el elemento select y el campo de texto
var select = document.getElementById('productSelect');
var productIdInput = document.getElementById('productIdInput');

// Capturar el evento de cambio del select
select.addEventListener('change', function() {
  // Obtener el valor seleccionado (ID del producto)
  var selectedProductId = select.value;

  // Insertar el valor seleccionado en el campo de texto
  productIdInput.value = selectedProductId;
});
});
</script>
@stop