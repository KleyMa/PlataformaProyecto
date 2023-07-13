<x-layouts.app title="Estadisticas" meta-description="Pagina de estadisticas"> <!-- Para las etiquetas se usa kebab-case y para componentes camelCase, Laravel lo interpreta solo-->
    <div class="container">
        <h1>Estadisticas</h1>
        <div style="text-align:right">
            <button class="btn btn-primary" href="#"><i class="fa-solid fa-box-archive fa-lg"></i> Historiales</button>
        </div>
        <label>Cantidad de equipos en la plataforma: {{$equipos}} </label><br>
        <label>Cantidad de bitacoras en la plataforma: {{$bitacoras}}</label><br>
        <label>Cantidad de imagenes en la plataforma: {{$imagenes}}</label><br>
        <label>Cantidad de manuales en la plataforma: {{$manuales}}</label><br>
        <label>Cantidad de QRs en la plataforma: </label><br>
        <label>Cantidad de usuarios en la plataforma: {{$usuarios}}</label><br>
    </div>
</x-layout>