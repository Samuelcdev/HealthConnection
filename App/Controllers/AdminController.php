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
        $users = $this->userModel->getUsers();
        $this->render('Admin', 'users', ['users' => $users], 'site');
    }
}