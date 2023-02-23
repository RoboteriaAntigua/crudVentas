@if ( !empty ( $productos->id) )


<!--Este formulario es para crear o actualizar registros en la tabla productos -->
<div class="mb3">
    <label for="nombre" class="negrita">Nombre:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="nombre" type="text" id="nombre" value="{{ $productos->nombre }}">
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">Precio:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="precio" type="text" id="precio" value="{{ $productos->precio }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">Stock:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="stock" type="text" id="stock" value="{{ $productos->stock }}">
    </div>
</div>

<div class="mb3">
    <label for="img" class="negrita">Selecciona una imagen:</label>
<div>
<input name="img" type="file" id="img">
<br>
<br>

<!--Este if es para ver si el producto tiene imagen, si es asi mostrarla con un span -->
@if ( !empty ( $productos->img) )

<span>Imagen Actual: </span>
<br>
<img src="../../../uploads/{{ $productos->img }}" width="200" class="img-fluid">

@else

    <!-- Aún no se ha cargado una imagen para este producto -->

@endif
</div>

</div>

@else
<div class="mb-3">
    <label for="nombre" class="negrita">Nombre:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="nombre" type="text" id="nombre">
    </div>
</div>

<div class="mb-3">
    <label for="precio" class="negrita">Precio:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="precio" type="text" id="precio">
    </div>
</div>

<div class="mb-3">
    <label for="stock" class="negrita">Stock:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="stock" type="text" id="stock">
    </div>
</div>

<div class="mb-3">
    <label for="img" class="negrita">Selecciona una imagen:</label>
    <div>
        <input name="img" type="file" id="img">
    </div>
</div>

@endif

<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('admin/productos') }}" class="btn btn-warning">Cancelar</a>

<br>
<br>

</div>
</section>
</div>
</div>
