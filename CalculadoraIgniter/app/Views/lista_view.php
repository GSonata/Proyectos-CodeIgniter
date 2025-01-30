<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista con AJAX</title>

    <link rel="stylesheet" href="../public/css/estiloLista.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../public/js/scriptLista.js"></script>
</head>

<body>

    <h2>Lista de Elementos</h2>

    <!-- Formulario -->
    <form id="form-agregar">
        <input type="text" id="texto" name="texto" placeholder="Escribe un texto">
        <button type="submit">Agregar</button>
    </form>


    <!--- COMPRUEBA SI LA PROPIEDAD $LISTA ESTA VACIA CADA VEZ QUE SE REFRESCA LA PAGINA ---->
    <h3 id="mensaje-vacio" style="display: <?= empty($lista) ? 'block' : 'none' ?>;">
        ¡Agrega una tarea para empezar a trabajar!
    </h3>

    <ul id="lista">
        <?php foreach ($lista as $index => $item): ?>
            <li>
                Tarea #<?= $index + 1 ?> - <i> <?= $item ?> </i>
                <button class="delete" onclick="eliminar(<?= $index ?>)">X</button>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>