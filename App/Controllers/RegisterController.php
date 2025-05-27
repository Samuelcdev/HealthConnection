<?php
require_once(__DIR__ . '/../Models/UserModel.php');
class RegisterController extends Controller
{
    private $userModel;

    public function __construct(PDO $connection)
    {
        $this->userModel = new UserModel($connection);
    }
    public function showRegister()
    {
        $this->render('Auth', 'register', [], 'guest');
    }
    public function register()
    {
        session_start();

        $typeDocument = $_POST['typeDocument'] ?? null;
        $numberDocument = $_POST['numberDocument'] ?? null;
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $lastname = $_POST['lastname'] ?? null;
        $password = $_POST['password'] ?? null;

        if (
            empty($typeDocument) ||
            empty($numberDocument) ||
            empty($email) ||
            empty($name) ||
            empty($lastname) ||
            empty($password)
        ) {
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("Location: " . BASE_URL . "/Register/showRegister");
            exit;
        }

        if (!ctype_digit($numberDocument)) {
            $_SESSION['error'] = "El numero de documento debe contener unicamente numeros";
            header("Location:" . BASE_URL . "/Register/showRegister");
            exit;
        }

        $existingUser = $this->userModel->getById($numberDocument);

        if ($existingUser) {
            $_SESSION['error'] = "El usuario ya existe. Por favor intente de nuevo";
            header("Location:" . BASE_URL . "/Register/showRegister");
            exit;
        }

        $data = [
            'userDocumentType' => $typeDocument,
            'userDocument' => $numberDocument,
            'userEmail' => $email,
            'userName' => $name,
            'userLastname' => $lastname,
            'userPlan' => 1,
            'userPassword' => password_hash($password, PASSWORD_BCRYPT)
        ];

        try {
            $this->userModel->insert($data);
            $_SESSION['success'] = "El usuario ha sido registrado correctamente";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al registrar el usuario" . $e->getMessage();
        }
        $this->render('Auth', 'Register', [], 'guest');
        exit;
    }
}