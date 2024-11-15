<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Sin titulo'}}</title>
        <!-- Scripts JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="mb-3">
            <x-layouts.navigation/>
        </div>
        <div style="margin: 70px;">
            @if(session('status'))
                <div class="alert {{ session('status-class') ?? 'alert-success' }}">
                    {{ session('status') }}
                </div>
            @endif        
        {{$slot}}
        </div>
    </body>
</html>
