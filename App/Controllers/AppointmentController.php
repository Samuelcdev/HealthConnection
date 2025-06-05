<?php
require_once(__DIR__ . "/../Models/AppointmentModel.php");
class AppointmentController extends Controller
{
    private $appointmentModel;
    public function __construct(PDO $connection)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'Admin') {
            $_SESSION['error'] = "Acceso denegado. Debes iniciar sesion como administrador";
            header("Location: " . BASE_URL . "/Login/showLogin");
            exit;
        }

        $this->appointmentModel = new AppointmentModel($connection);
    }

    public function appointments()
    {
        $statusFilter = $_GET['statusAppointment'] ?? '';
        $dateFilter = $_GET['dateAppointment'] ?? '';
        $search = $_GET['searchAppointment'] ?? '';
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 10;

        $totalAppointments = $this->appointmentModel->countFilteredAppointments($statusFilter, $dateFilter, $search);
        $totalPages = ceil($totalAppointments / $limit);

        $appointments = $this->appointmentModel->getAppointments($currentPage, $limit, $dateFilter, $search, $statusFilter);

        $this->render('Admin', 'appointments', [
            'appointments' => $appointments,
            'statusFilter' => $statusFilter,
            'dateFilter' => $dateFilter,
            'search' => $search,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages
        ], 'site');
    }
}