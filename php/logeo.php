<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "paltacate"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena']; 
        
        $sql = "SELECT contrasena FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("location: bienvenido.php"); 
        } else {
            // La contraseña es incorrecta
            echo "Nombre de usuario o contraseña incorrectos";
        }        
    }

    $conn->close();
?>
