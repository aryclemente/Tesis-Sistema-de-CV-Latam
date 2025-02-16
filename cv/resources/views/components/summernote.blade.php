<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Agregar los estilos y scripts de Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
<div class="container mt-5">
        <div>
            <div id="summernote" class="w-full p-4 mb-4 border rounded-lg text-slate-700 placeholder:text-slate-400"></div>

            @error('descripcion')
                <small class="text-red-500 mt-1 text-sm">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror
        </div>
        <input type="hidden" id="descripcion" name="descripcion">
</div>
<script>
    $(document).ready(function() {
        // Inicializar Summernote en el div con id "summernote"
        $('#summernote').summernote({
            placeholder: 'Descripción personal',
            tabsize: 2,
            height: 100
        });
        // Cuando se envíe el formulario, colocar el contenido de Summernote en el campo oculto
        $('form').on('submit', function() {
            var contenido = $('#summernote').summernote('code');  // Obtener el contenido HTML del editor
            $('#descripcion').val(contenido);  // Colocar el contenido en el campo oculto
        });
    });
</script>

</body>
</html>
