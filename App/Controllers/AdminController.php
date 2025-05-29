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

        $totalUsers = $this->userModel->countFilteredUsers($statusFilter, $planFilter, $search);
        $totalPages = ceil($totalUsers / $limit);

        $users = $this->userModel->getUsers($currentPage, $limit, $statusFilter, $planFilter, $search);

        $this->render('Admin', 'users', [
            'users' => $users,
            'statusFilter' => $statusFilter,
            'planFilter' => $planFilter,
            'search' => $search,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ], 'site');
    }

    public function createUser()
    {
        $typeDocument = $_POST['create-typeDocument'] ?? null;
        $numberDocument = $_POST['create-numberDocument'] ?? null;
        $name = $_POST['create-name'] ?? null;
        $email = $_POST['create-email'] ?? null;
        $lastname = $_POST['create-lastname'] ?? null;
        $password = $_POST['create-password'] ?? null;

        if (
            empty($typeDocument) ||
            empty($numberDocument) ||
            empty($name) ||
            empty($email) ||
            empty($lastname) ||
            empty($password)
        ) {
            $_SESSION['error'] = "Todos los campos son Obligatorios";
            header("Location: " . BASE_URL . "/Admin/users");
            exit;
        }

        if (!ctype_digit($numberDocument)) {
            $_SESSION['error'] = "El numero de documento debe contener unicamente numeros";
            header("Location:" . BASE_URL . "/Admin/users");
            exit;
        }

        if (strlen($numberDocument) > 10) {
            $_SESSION['error'] = "El numero de documento no puede exceder los 10 digitos";
            header("Location:" . BASE_URL . "/Admin/users");
            exit;
        }

        $existingUser = $this->userModel->getById($numberDocument);

        if ($existingUser) {
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

        try {
            $this->userModel->insert($data);
            $_SESSION['success'] = "El usuario ha sido registrado correctamente";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al registrar el usuario" . $e->getMessage();
        }
        header("Location: " . BASE_URL . "/Admin/users");
        exit;
    }

    public function editUser()
    {
        $typeDocument = $_POST['typeDocument'] ?? null;
        $numberDocument = $_POST['numberDocument'] ?? null;
        $name = $_POST['name'] ?? null;
        $lastname = $_POST['lastname'] ?? null;
        $email = $_POST['email'] ?? null;
        $address = $_POST['address'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $gender = $_POST['sex'] ?? null;
        $status = $_POST['userStatus'] ?? null;
        $role = $_POST['rol'] ?? null;
        $birthdate = $_POST['birthdate'] ?? null;
        $plan = $_POST['plan'] ?? null;

        $data = [
            'userDocumentType' => $typeDocument,
            'userDocument' => $numberDocument,
            'userEmail' => $email,
            'userName' => $name,
            'userLastname' => $lastname,
            'userAddress' => $address,
            'userPhone' => $phone,
            'userSex' => $gender,
            'userStatus' => $status,
            'userRoleId' => $role,
            'userBirthdate' => $birthdate,
            'userPlan' => $plan
        ];

        try {
            $this->userModel->updateById($numberDocument, $data);
            $_SESSION['success'] = "Usuario actualizado correctamente.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al actualizar el usuario: " . $e->getMessage();
        }
        header("Location: " . BASE_URL . "/Admin/users");
        exit;
    }
}