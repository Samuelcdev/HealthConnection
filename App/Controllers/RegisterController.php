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

        $typeDocument = $_POST['typeDocument'];
        $numberDocument = $_POST['numberDocument'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];

        if (empty($typeDocument) || empty($numberDocument) || empty($email) || empty($name) || empty($lastname) || empty($password)) {
            $_SESSION['error'] = "Todos los campos son obligatorios";
            header("Location: showRegister");
            exit;
        }

        $existingUser = $this->userModel->getById($numberDocument);
        if ($existingUser) {
            $_SESSION['error'] = "El usuario ya existe";
            header("Location: showRegister");
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

        $this->userModel->insert($data);

        $_SESSION['success'] = "El usuario ha sido registrado correctamente";
        $this->render('Auth', 'Register', [], 'guest');
        exit;
    }

}