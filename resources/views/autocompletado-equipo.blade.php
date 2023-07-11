<!-- autocompletado-script.blade.php -->
<script>
    $(document).ready(function() {
        $('#tipo_de_equipo').on('keyup', function(){
            var value = $(this).val();
            if(value != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                url:"{{ route('BuscarTipoDeEquipo') }}",
                method: "POST",
                data:{value:value, _token:_token},
                success:function(data){
                    $('#tipo_de_equipo_lista').fadeIn();
                    $('#tipo_de_equipo_lista').html(data);
                }
                })
            }
        })
    });
</script>
