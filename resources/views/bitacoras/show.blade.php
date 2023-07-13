<x-layouts.app title="Bitacora {{$bitacora->numero_servicio}}" meta-description="Pagina de visualizacion de bitacoras"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container mt-5">
        <h1>Bitacora numero {{$bitacora->numero_servicio}}</h1>
        <label>Fecha: {{$bitacora->fecha}}</label><br>
        <label>Numero de servicio {{$bitacora->numero_servicio}}</label><br>
        <label>Numero de serie del equipo: {{$bitacora->numero_de_serie}}</label><br>
        <label>Modalidad: {{$bitacora->modalidad}}</label><br>
        <label>Descripcion de la falla: {{$bitacora->descripcion_falla}}</label><br>
        <label>Tipo de servicio: {{$bitacora->tipo_servicio}}</label><br>
        <label>Materiales utilizados:<br>{{$bitacora->materiales_utilizados}}</label><br>
        <label>Trabajo realizado:<br>{{$bitacora->trabajo_realizado}}</label><br>
        <label>Trabajo finalizado: {{$bitacora->trabajo_terminado}}</label><br>
        <a class="btn btn-warning btn-lg btn-block my-2 my-sm-0" href="{{ Session::get('urlAnterior') }}"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a><br>
    </div>
</x-layout>