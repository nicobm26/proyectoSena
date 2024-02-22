<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="bg-menu">
        <nav class="nav contenedor">
            <ul class="nav__menu">
                <li class="menu__item">
                    <a href="#" class="item__link">
                        <img class="menu__inicio" src="../build/img/logo.png" alt="Logo de Apicola Genesis">
                    </a>
                </li>
                <li class="menu__item"><a class="item__link" href="/nosotros">Apícola Génesis</a></li>
                <li class="menu__item"><a class="item__link" href="#">Productos</a></li>
                <li class="menu__item"><a class="item__link" href="#">Contáctenos</a></li>
                <li class="menu__item"><a class="item__link" href="/login">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <div class="contenedor-app">
        <div class="app">
            <?php echo $contenido; ?>            
        </div>
    </div>

    <?php
        echo $script ?? '';
    ?>      
</body>
</html>



<!-- La variable $contenido que se encuentra en el archivo Layout.php y se utiliza para representar el contenido dinámico que será insertado en la página web.

Aquí, $contenido es una variable que se espera que contenga el contenido específico (valga la redundancia) de la página que se está renderizando. Esta variable se define en el método render() de la clase Router en el archivo Router.php. El método render() se encarga de incluir el contenido de una vista específica en el diseño general de la página.



public function render($view, $datos = [])
{
    // ...
 
    // entonces incluimos la vista en el layout
    include_once __DIR__ . "/views/$view.php";
    $contenido = ob_get_clean(); // Limpia el Buffer
    include_once __DIR__ . '/views/layout.php';
}


Dentro de este método, el contenido de la vista se obtiene al incluir el archivo de vista específico ("$view.php") y capturando su contenido con el uso de ob_get_clean(). Luego, este contenido se almacena en la variable $contenido, que finalmente se utiliza en el archivo Layout.php para insertar el contenido dinámico en el diseño general de la página. -->