<?php
class UserModel extends Orm
{
    public function __construct(PDO $connection)
    {
        parent::__construct('userDocument', 'User', $connection);
    }

    public function getUserWithRole($numberDocument)
    {
        $sql = "SELECT u.*, r.roleName AS userRoleName 
                FROM user u 
                JOIN role r ON u.UserRoleId = r.roleId
                WHERE u.userDocument = :id";

        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $numberDocument);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFilteredPaginatedUsers($page, $limit, $status = '', $plan = '', $search = '')
    {
        $offset = ($page - 1) * $limit;

        $sql = "SELECT u.*, dt.documentTypeName, hp.healthPlanName,
                   CONCAT(u.userName, ' ', u.userLastname) AS fullName
            FROM user u
            INNER JOIN documentType dt ON u.userDocumentType = dt.documentTypeId
            INNER JOIN healthPlan hp ON u.userPlan = hp.healthPlanId
            WHERE 1 = 1";

        $params = [];

        if (!empty($status)) {
            $sql .= " AND u.userStatus = :status";
            $params[':status'] = $status === 'activo' ? 'Active' : 'Inactive';
        }

        if (!empty($plan)) {
            $sql .= " AND hp.healthPlanName LIKE :plan";
            $params[':plan'] = '%' . $plan . '%';
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

}