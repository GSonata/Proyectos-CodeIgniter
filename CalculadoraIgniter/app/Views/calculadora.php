<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body {
            display:flex;
            flex-direction: column;
            justify-content: center;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            align-items: center;
            margin: 20px;
            background-color: dimgray;
        }

        .calculadora {
            display: inline-block;
            border: 1px solid rgb(35, 36, 35);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(50, 51, 50);
        }

        .pantalla {
            width: 90%;
            height: 50px;
            font-size: 24px;
            text-align: right;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgb(76, 153, 69);
            color: white;
            font-family: 'Courier New', Courier, monospace;
        }

        .botones {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button:not(.igual) {
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #f0f0f0;
            cursor: pointer;
            border: 2px solid gray;
        }

        button:hover {
            background-color: #ddd;
        }

        .igual {
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: rgb(197, 127, 22);
            color: white;
            transition: 0.5s all;
        }

        .igual:hover {
            background-color: rgb(167, 102, 18);
        }

        .flavor {
            text-align: right;
            color: rgb(167, 102, 18);
            font-size: 1.2rem;
            padding-right: 20px;
            font-weight: 500;
        }

        .resultado {
            width: 500px;
            height: 50px;
            font-size: 12px;
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgb(76, 153, 69);
            color: white;
            font-family: 'Courier New', Courier, monospace;
            margin-top: 20px;
        }
    </style>
</head>
<div class="calculadora">
    <form id="calcForm" action="/CodeIgniter/CalculadoraIgniter/public/calculadora/operar" method="post">
        <p class="flavor">Casio</p>
        <input type="text" id="pantalla" class="pantalla" name="expresion" value="<?= isset($expresion) ? $expresion : '' ?>" readonly>
        <div class="botones">
            <button type="button" onclick="agregarNumero('7')">7</button>
            <button type="button" onclick="agregarNumero('8')">8</button>
            <button type="button" onclick="agregarNumero('9')">9</button>
            <button type="button" onclick="agregarOperacion('/')">/</button>

            <button type="button" onclick="agregarNumero('4')">4</button>
            <button type="button" onclick="agregarNumero('5')">5</button>
            <button type="button" onclick="agregarNumero('6')">6</button>
            <button type="button" onclick="agregarOperacion('*')">*</button>

            <button type="button" onclick="agregarNumero('1')">1</button>
            <button type="button" onclick="agregarNumero('2')">2</button>
            <button type="button" onclick="agregarNumero('3')">3</button>
            <button type="button" onclick="agregarOperacion('-')">-</button>

            <button type="button" onclick="agregarNumero('0')">0</button>
            <button type="button" onclick="agregarOperacion('.')">.</button>
            <button type="button" onclick="limpiarPantalla()">C</button>
            <button type="button" onclick="agregarOperacion('+')">+</button>

            <button class="igual" style="grid-column: span 4;" type="button" onclick="calcular()">=</button>
        </div>
    </form>
</div>
<div class="resultado">
    <?php if (isset($resultado) && $resultado !== ""): ?>
        <h2>Resultado: <?= $resultado ?></h2>
    <?php endif; ?>
</div>

<script>
    let currentExpression = '';

    function agregarNumero(numero) {
        currentExpression += numero;
        document.getElementById('pantalla').value = currentExpression;
    }

    function agregarOperacion(operacion) {
        currentExpression += operacion;
        document.getElementById('pantalla').value = currentExpression;
    }

    function limpiarPantalla() {
        currentExpression = '';
        document.getElementById('pantalla').value = '';
    }

    function esOperador(char) {
        return ['+', '-', '*', '/'].includes(char);
    }

    function calcular() {
        if (esOperador(currentExpression[currentExpression.length - 1])) {
            currentExpression = currentExpression.slice(0, -1);
        }

        document.getElementById('pantalla').value = currentExpression;
        document.getElementById('calcForm').submit();

    }
</script>
</body>

</html>