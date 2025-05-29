<?php
require_once(__DIR__ . "/../Models/UserModel.php");
class LoginController extends Controller
{
    private $userModel;
    public function __construct(PDO $connection)
    {
        $this->userModel = new UserModel($connection);
    }

    public function showLogin()
    {
        $this->render('Auth', 'login', [], 'guest');
    }

    public function login()
    {
        $typeDocument = $_POST['typeDocument'];
        $numberDocument = $_POST['numberDocument'];
        $password = $_POST['password'];

        if (empty($typeDocument) || empty($numberDocument) || empty($password)) {
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("Location:" . BASE_URL . "/Login/showLogin");
            exit;
        }

        if (!ctype_digit($numberDocument)) {
            $_SESSION['error'] = "El numero de documento debe contener unicamente numeros";
            header("Location:" . BASE_URL . "/Login/showLogin");
            exit;
        }

        $user = $this->userModel->getUserWithRole($numberDocument);

        if (!$user) {
            $_SESSION['error'] = "El usuario no existe. Por favor registrese";
            header("Location:" . BASE_URL . "/Register/showRegister");
            exit;
        }

        if ($user['userDocumentType'] != $typeDocument) {
            $_SESSION['error'] = "El tipo de documento no coincide. Vuelva a intentarlo";
            header("Location:" . BASE_URL . "/Login/showLogin");
            exit;
        }

        if (!password_verify($password, $user['userPassword'])) {
            $_SESSION['error'] = "La contraseña no coincide. Vuelva a intentarlo";
            header("Location:" . BASE_URL . "/Login/showLogin");
            exit;
        }

        $_SESSION['user'] = [
            'id' => $user['userDocument'],
            'typeDocument' => $user['userDocumentType'],
            'name' => $user['userName'],
            'lastname' => $user['userLastname'],
            'email' => $user['userEmail'],
            'plan' => $user['userPlan'],
            'role' => $user['userRoleName']
        ];

        try {
            $_SESSION['success'] = "El inicio de sesion se completo exitosamente";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al iniciar sesion" . $e->getMessage();
        }
        $this->render('Auth', 'Login', [], 'guest');
        exit;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location:" . BASE_URL);
        exit;
    }
}