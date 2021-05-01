

<label for="nombre" >Nombre</label>
<input type="text" name="nombre" id="nombre" value="{{isset($datos->nombre)? $datos->nombre: ''}}"  required>
<br>
<label for="categoria" >Categoria</label>
<input type="text" name="categoria" id="categoria"  value="{{isset($datos->categoria)? $datos->categoria: ''}}" required>
<br>
<label for="ingredientes" >Ingredientes</label>
<input type="text" name="ingredientes" id="ingredientes"  value="{{isset($datos->ingredientes)? $datos->ingredientes: ''}}" required>
<br>
<label for="preparacion" >Preparacion</label>
<input type="text" name="preparacion" id="preparacion"  value="{{isset($datos->preparacion)? $datos->preparacion: ''}}" required>
<br>
@if(isset($datos->foto))
<img src="{{asset('storage').'/'.$datos->foto}}"   width="162" height="162">
@endif

<input type="file" name="foto" id="foto"  required>
<br>
<input type="submit" value="{{$modo}} la receta">
<br>



<div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
