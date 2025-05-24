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
}