<?php    

//  include_once 'templates/header.php';
    if(isset($_SESSION)){
        //Se logio 
        $acceso=1;
        if(isset($_SESSION['rol'])){
            $acceso=2;
            include_once 'templates/headerAdmin.php';
        }else if(isset($_SESSION)){
            include_once 'templates/header.php';
        }
    }else{
        include_once 'templates/header.php';
    }
?>

    <!-- <div class="contenedor-app">
        <div class="app"> -->
            <?php echo $contenido; ?>            
        <!-- </div> -->
    <!-- </div> -->

    <?php
        echo $script ?? '';
    ?>      
    <!-- <script src="../build/js/bundle.min.js"></script> -->
</body>
</html>
