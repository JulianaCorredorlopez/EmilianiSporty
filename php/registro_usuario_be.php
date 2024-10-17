<?php
include 'conexion_be.php';

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset( $_POST['correo_register'], $_POST['usuario_register'], $_POST['pass_register'])) {
    $correo = mysqli_real_escape_string($conexion, $_POST['correo_register']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario_register']);
    
    $contrasena = hash('sha512', mysqli_real_escape_string($conexion, $_POST['pass_register']));

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
        <script> 
           alert("Este correo ya está registrado, intenta con uno diferente");
           window.location = "../index2.php"; 
        </script>';
        exit();
    }

    $query = "INSERT INTO usuarios (, correo, usuario, contraseña) VALUES ('$correo', '$usuario', '$contrasena')";

    // Ejecutar la consulta
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
                window.location = "../index.html";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Inténtalo de nuevo, Usuario no almacenado");
                window.location = "../registro.php"; 
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Por favor completa todos los campos.");
            window.location = "../registro.php";
        </script>
    ';
}

mysqli_close($conexion);

