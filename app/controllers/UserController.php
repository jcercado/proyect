
<?php
class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role']; // Guardar el rol

                header('Location: /home'); // Redirigir a la página principal
            } else {
                $error = "Usuario o contraseña incorrectos.";
            }
        }

        include 'views/login.php'; // Mostrar la vista de login
    }

    public function logout() {
        session_start();
        session_destroy(); // Cerrar sesión
        header('Location: /login'); // Redirigir a la página de login
    }
}
