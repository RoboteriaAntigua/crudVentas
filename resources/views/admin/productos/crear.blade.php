@vite(['resources/js/app.js']) <!--directiva para los estilos -->

<!-- form para el crear, la ruta va al web.php y de ahi al metodo del controlador -->
<form method="POST" action="{{ route('admin/productos/store') }}" role="form" enctype="multipart/form-data">

    <!--Le digo que es put, equivalente a @ method('put')-->
    <input type="hidden" name="_method" value="PUT">

    <!--Mando el token de seguridad, equivalente a @ scrf
        Cross-site Request Forgery o en español Falsificación de Petición en Sitios Cruzados-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


<!--incluyo el formulario parte -->
    @include('admin.productos.form.parte')

  </form>
