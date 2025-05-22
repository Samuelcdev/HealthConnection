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
        session_start();

        $typeDocument = $_POST['typeDocument'];
        $numberDocument = $_POST['numberDocument'];
        $password = $_POST['password'];

        if (empty($typeDocument) || empty($numberDocument) || empty($password)) {
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("Location: showLogin");
            exit;
        }

        if (!ctype_digit($numberDocument)) {
            $_SESSION['error'] = "El numero de documento debe contener unicamente numeros";
            header("Location: showLogin");
            exit;
        }

        $user = $this->userModel->getById($numberDocument);

        if (!$user) {
            $_SESSION['error'] = "El usuario no existe";
            header("Location: showRegister");
            exit;
        }

        if ($user['userDocumentType'] != $typeDocument) {
            $_SESSION['error'] = "El tipo de documento no coincide. Vuelva a intentarlo";
            header("Location: showLogin");
            exit;
        }

        if (!password_verify($password, $user['userPassword'])) {
            $_SESSION['error'] = "La contraseña no coincide. Vuelva a intentarlo";
            header("Location: showLogin");
            exit;
        }

        $_SESSION['user'] = [
            'id' => $user['userDocument'],
            'typeDocument' => $user['userDocumentType'],
            'name' => $user['userName'],
            'lastname' => $user['userLastname'],
            'email' => $user['userEmail'],
            'plan' => $user['userPlan']
        ];

        header('Location: /HealthConnection/Public');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: /HealthConnection/Public");
        exit;
    }
}