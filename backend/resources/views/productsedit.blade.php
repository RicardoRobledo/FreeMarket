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
          pattern="^([A-Z]{1}[a-z]*)(\s{1}([a-z]+)(\s{1}([0-9]+))*)*$"
          required
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
          pattern="^([0-9]*\.{0,1}[0-9]*)$"
          name="price"
          value="{{$product->price}}"
          required
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
          pattern="^([A-Z]{1}[a-z]+)(\s{1}[a-z]+)*$"
          required
        />
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4">
        <label htmlFor="validationServer04" class="form-label">Image</label>
        <textarea name="image" id="" cols="70" rows="10" required>{{$product->image}}</textarea>
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
<script>
function validarFormulario(event) {
  event.preventDefault(); // Evitar el envío del formulario
  // Obtener referencia al formulario
  var form = document.getElementById("myForm");

  // Obtener los valores de los campos del formulario
  var name = document.getElementById("name").value;
  var price = document.getElementById("price").value;
  var description = document.getElementById("description").value;


  // Expresiones regulares para validar cada campo
  var nameRegex = /^([A-Z]{1}[a-z]*)(\s{1}([a-z]+)(\s{1}([0-9]+))*)*$/;
  var priceRegex = /^([0-9]*\.{0,1}[0-9]*)$/;
  var descriptionRegex = /^([A-Z]{1}[a-z]+)(\s{1}[a-z]+)*/;


  // Validar cada campo
  if (!name.match(nameRegex) ||
      !price.match(priceRegex) ||
      !description.match(descriptionRegex)) {
    alert("Alguno(s) de los campos tienen un formato incorrecto. Por favor, revisa los datos ingresados.");
  }
  event.currentTarget.submit();
}

</script>
@stop