<?php
 
 function conectarDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_autobuses";
     try {
         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;
     } catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
     }
 }
 
 // Modelo de usuario
 class ModeloUsuario {
     public function insertarUsuario($usuario, $password, $nombre) {
         $db = conectarDB();
 
         try {
             $stmt = $db->prepare("INSERT INTO tbl_usuarios (usuario, pass, nombre) VALUES (?, ?, ?)");
             $stmt->execute([$usuario, $password, $nombre]);
             return true;
         } catch(PDOException $e) {
             echo "Error: " . $e->getMessage();
             return false;
         }
     }
 }
 
 // Controlador de usuarios
 class ControladorUsuarios {
     public function registrarUsuario() {
         // Obtener los datos del formulario
         $nombre = $_POST['nombre'] ?? '';
         $usuario = $_POST['usuario'] ?? '';
         $password = $_POST['password'] ?? '';
 
         // Validación básica (ampliar según tus necesidades)
         if (empty($nombre) && empty($usuario) && empty($password)) {
             echo "<script>Por favor, completa todos los campos.</script>;";
             return;
         }
 
         // Hashear la contraseña
        // $BCRYPTpassword = password_hash($password, PASSWORD_DEFAULT);


                  // Instanciar el modelo e insertar el usuario
         $modeloUsuario = new ModeloUsuario();
         $resultado = $modeloUsuario->insertarUsuario($usuario, $password, $nombre);
 
         if ($resultado) {
            header('location: ../views/admin/usuarios.php');
                    
        } else {
             echo "Error al registrar al usuario.";
         }
     }
 }
 
 // Si el formulario se ha enviado, procesar los datos
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $controlador = new ControladorUsuarios();
     $controlador->registrarUsuario();
 }


?>