<?php
include 'conexion_be.php'; 

if (isset($_POST['correo'], $_POST['contrasena'])) {

    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $validar_login = mysqli_query($conexion, $query);

    if ($validar_login && mysqli_num_rows($validar_login) > 0) {
        $usuario = mysqli_fetch_assoc($validar_login);


        $contrasena_encriptada = hash('sha512', $contrasena);

      
        if ($contrasena_encriptada === $usuario['contraseña']) {
            echo '
                <script>
                    window.location = "../index.html"; 
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Contraseña incorrecta, intenta de nuevo");
                    window.location = "../index2.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("El correo no está registrado");
                window.location = "../index2.php";
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Por favor verificar todos los campos.");
            window.location = "../index2.php";
        </script>
    ';
}

mysqli_close($conexion);

