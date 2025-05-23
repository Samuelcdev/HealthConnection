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

    public function getUsers()
    {
        $sql = "SELECT u.*, dt.documentTypeName AS documentTypeName, hp.healthPlanName AS healthPlanName, 
                CONCAT(u.userName, ' ' ,u.userLastname) AS fullName
                FROM user u
                JOIN documentType dt ON u.userDocumentType = dt.documentTypeId
                JOIN healthPlan hp ON u.userPlan = hp.healthPlanId";

        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}