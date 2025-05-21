<?php
require_once(__DIR__ . "/../Models/UserModel.php");
class LoginController extends Controller
{
    private $userModel;
    public function __construct(PDO $connection)
    {
        $this->userModel = new UserModel($connection);
    }

    public function showLogin(){
        $this->render('Auth', 'login', [], 'guest');
    }
}