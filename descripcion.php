<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- Estilos css -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <!-- navbar -->
        <?php
        include 'navbar.php';
        ?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="images/itza.png" class="img-fluid" alt="Imagen">
                </div>
                <div class="col-lg-6">
                    <h2>Detalles</h2>
                    <p>Nombre tour</p>
                    <h4>Reserva</h4>
                    <div class="mb-3">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="adultos">Adultos:</label>
                        <input type="number" id="adultos" name="adultos" class="form-control" min="0" max="25">
                        <span id="precioAdultos" hidden>$0</span>
                    </div>
                    <div class="mb-3">
                        <label for="ninos">Niños:</label>
                        <input type="number" id="ninos" name="ninos" class="form-control" min="0" max="20">
                        <span id="precioNinos" hidden>$0</span>
                    </div>
                    <div class="mb-3">
                        <label for="infantes">Infantes:</label>
                        <input type="number" id="infantes" name="infantes" class="form-control" min="0" max="15">
                        <span id="precioInfantes" hidden>$0</span>
                    </div>
                    <div class="mb-3">
                        <h5>Resumen:</h5>
                        <p id="resumenAdultos" style="display: none;">Adultos: <span id="cantidadAdultos">0</span> (<span id="precioTotalAdultos">$0</span>)</p>
                        <p id="resumenNinos" style="display: none;">Niños: <span id="cantidadNinos">0</span> (<span id="precioTotalNinos">$0</span>)</p>
                        <p id="resumenInfantes" style="display: none;">Infantes: <span id="cantidadInfantes">0</span> (<span id="precioTotalInfantes">$0</span>)</p>
                    </div>
                    <h5>Total: <span id="precioTotal">$0</span></h5>
                    <a class="btn btn-primary" href="carrito.php" role="button">Reservar</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script>
        // Calcular el precio total en tiempo real
        document.addEventListener("DOMContentLoaded", function() {
            const inputAdultos = document.getElementById("adultos");
            const inputNinos = document.getElementById("ninos");
            const inputInfantes = document.getElementById("infantes");

            const spanPrecioAdultos = document.getElementById("precioAdultos");
            const spanPrecioNinos = document.getElementById("precioNinos");
            const spanPrecioInfantes = document.getElementById("precioInfantes");

            const spanResumenAdultos = document.getElementById("resumenAdultos");
            const spanResumenNinos = document.getElementById("resumenNinos");
            const spanResumenInfantes = document.getElementById("resumenInfantes");

            const spanPrecioTotalAdultos = document.getElementById("precioTotalAdultos");
            const spanPrecioTotalNinos = document.getElementById("precioTotalNinos");
            const spanPrecioTotalInfantes = document.getElementById("precioTotalInfantes");

            const spanPrecioTotal = document.getElementById("precioTotal");

            function calcularPrecio() {
                const cantidadAdultos = parseInt(inputAdultos.value);
                const cantidadNinos = parseInt(inputNinos.value);
                const cantidadInfantes = parseInt(inputInfantes.value);

                const precioAdultos = cantidadAdultos > 0 ? cantidadAdultos * 100 : 0; // Precio por Adulto
                const precioNinos = cantidadNinos > 0 ? cantidadNinos * 50 : 0; // Precio por Niño
                const precioInfantes = cantidadInfantes > 0 ? cantidadInfantes * 25 : 0; // Precio por Infante

                spanPrecioAdultos.textContent = "$" + precioAdultos;
                spanPrecioNinos.textContent = "$" + precioNinos;
                spanPrecioInfantes.textContent = "$" + precioInfantes;

                spanResumenAdultos.style.display = cantidadAdultos > 0 ? "block" : "none";
                spanResumenNinos.style.display = cantidadNinos > 0 ? "block" : "none";
                spanResumenInfantes.style.display = cantidadInfantes > 0 ? "block" : "none";

                document.getElementById("cantidadAdultos").textContent = cantidadAdultos;
                document.getElementById("cantidadNinos").textContent = cantidadNinos;
                document.getElementById("cantidadInfantes").textContent = cantidadInfantes;

                spanPrecioTotalAdultos.textContent = "$" + precioAdultos;
                spanPrecioTotalNinos.textContent = "$" + precioNinos;
                spanPrecioTotalInfantes.textContent = "$" + precioInfantes;

                const precioTotal = precioAdultos + precioNinos + precioInfantes;
                spanPrecioTotal.textContent = "$" + precioTotal;
            }

            inputAdultos.addEventListener("input", calcularPrecio);
            inputNinos.addEventListener("input", calcularPrecio);
            inputInfantes.addEventListener("input", calcularPrecio);
        });
    </script>
</body>

</html>
