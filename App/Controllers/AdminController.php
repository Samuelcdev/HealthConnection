<?php
require_once(__DIR__ . "/../Models/UserModel.php");
class AdminController extends Controller
{
    private $userModel;
    public function __construct(PDO $connection)
    {
        $this->userModel = new UserModel($connection);
    }

    public function users()
    {
        $statusFilter = $_GET['status'] ?? '';
        $planFilter = $_GET['plan'] ?? '';
        $search = $_GET['search'] ?? '';
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 10;

        $users = $this->userModel->getFilteredPaginatedUsers($currentPage, $limit, $statusFilter, $planFilter, $search);

        $this->render('Admin', 'users', [
            'users' => $users,
            'statusFilter' => $statusFilter,
            'planFilter' => $planFilter,
            'search' => $search,
            'currentPage' => $currentPage
        ], 'site');
    }

    public function createUser()
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
            empty($name) ||
            empty($email) ||
            empty($lastname) ||
            empty($password)
            ) 
        {
            $_SESSION['error'] = "Todos los campos son Obligatorios";
            header("Location: " . BASE_URL . "/Admin/users");
            exit;
        }

        if (!ctype_digit($numberDocument)) 
        {
            $_SESSION['error'] = "El numero de documento debe contener unicamente numeros";
            header("Location:" . BASE_URL . "/Admin/users");
            exit;
        }

        $existingUser = $this->userModel->getById($numberDocument);

        if ($existingUser) 
        {
            $_SESSION['error'] = "El usuario ya existe. Por favor intente de nuevo";
            header("Location: " . BASE_URL . "/Admin/users");
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
        $this->render('Admin', 'users', [], 'site');
        exit;
    }
}