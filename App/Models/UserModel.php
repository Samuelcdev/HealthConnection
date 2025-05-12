<?php
class UserModel extends Orm
{
    public function __construct(PDO $connection)
    {
        parent::__construct('userDocument', 'User', $connection);
    }
}