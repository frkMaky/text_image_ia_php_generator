<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI GENERATOR</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
<header>
    <h1>AI GENERATOR</h1>
    <h3>Lo que quieras asistido por AI</h3>
</header>

<main>

    <section id="que_hacer">
                <h2>¿Qué quieres hacer?</h2>
                <p>Texto, imagenes...</p>
    </section>

    <div class="centrar_contenido">
        <nav>
            <ul>
                <li><a class="boton_opc" href="/">Texto</a></li>
                <li><a class="boton_opc" href="/imagen">Imagen</a></li>
            </ul>
        </nav>
    
        @yield('content');
    </div>


</main>

</body>
</html>