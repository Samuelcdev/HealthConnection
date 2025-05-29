<?php
class AppointmentModel extends Orm
{
    public function __construct(PDO $connection)
    {
        parent::__construct('appointmentId', 'Appointment', $connection);
    }

    public function getAppointments($page, $limit, $dateFilter = '', $search = '', $status = '')
    {
        $offset = ($page - 1) * $limit;

        $sql = "SELECT a.*, at.appointmentTypeName, CONCAT(u.userDocument, '-', u.userName, ' ', u.userLastname) AS userFullName, CONCAT(d.doctorDocument, '-', d.doctorName, ' ', d.doctorLastname) AS doctorFullName
                FROM appointment a
                INNER JOIN appointmentType at ON a.appointmentAppointmentType = at.appointmentTypeId
                INNER JOIN user u ON a.appointmentUserDocument = u.userDocument
                INNER JOIN doctor d ON a.appointmentDoctorDocument = d.doctorDocument
                WHERE 1 = 1";
        $params = [];

        if (!empty($status)) {
            $sql .= " AND a.appointmentStatus = :status";

            switch ($status) {
                case 'Pendiente':
                    $params[':status'] = 'Pending';
                    break;
                case 'Confirmado':
                    $params[':status'] = 'Confirmed';
                    break;
                case 'Cancelado':
                    $params[':status'] = 'Canceled';
                    break;
                case 'Finalizado':
                    $params[':status'] = 'Finished';
                    break;
            }
        }

        if (!empty($dateFilter)) {
            $sql .= " AND a.appointmentDate = :dateFilter";
            $params[':dateFilter'] = '%' . $dateFilter . '%';
        }

        if (!empty($search)) {
            $sql .= " AND (
                    u.userDocument LIKE :search OR
                    CONCAT(u.userName, ' ', u.userLastname) LIKE :search
                    )";

            $params[':search'] = '%' . $search . '%';
        }

        $sql .= " LIMIT :offset, :limit";
        $stmt = $this->database->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFilteredAppointments($status = '', $dateFilter = '', $search = '')
    {
        $sql = "SELECT COUNT(*) as total
                FROM appointment a
                INNER JOIN appointmentType at ON a.appointmentAppointmentType = at.appointmentTypeId
                INNER JOIN user u ON a.appointmentUserDocument = u.userDocument
                INNER JOIN doctor d ON a.appointmentDoctorDocument = d.doctorDocument
                WHERE 1 = 1";

        $params = [];

        if (!empty($status)) {
            $sql .= " AND a.appointmentStatus = :status";

            switch ($status) {
                case 'Pendiente':
                    $params[':status'] = 'Pending';
                    break;
                case 'Confirmado':
                    $params[':status'] = 'Confirmed';
                    break;
                case 'Cancelado':
                    $params[':status'] = 'Canceled';
                    break;
                case 'Finalizado':
                    $params[':status'] = 'Finished';
                    break;
            }
        }

        if (!empty($dateFilter)) {
            $sql .= " AND a.appointmentDate = :dateFilter";
            $params[':dateFilter'] = '%' . $dateFilter . '%';
        }

        if (!empty($search)) {
            $sql .= " AND (
                    u.userDocument LIKE :search OR
                    CONCAT(u.userName, ' ', u.userLastname) LIKE :search
                    )";

            $params[':search'] = '%' . $search . '%';
        }

        $stmt = $this->database->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
}