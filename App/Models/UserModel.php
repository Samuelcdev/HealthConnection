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
}