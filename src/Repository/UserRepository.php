<?php

namespace Nbwdigital\Abcmedseg\Repository;

use Nbwdigital\Abcmedseg\Traits\Utils;
use Nbwdigital\Abcmedseg\Traits\DB;

class UserRepository
{
    use Utils, DB;
    public function VerifyLogin(array $data)
    {
        $query = "SELECT * FROM users WHERE  login = '{$data['login']}' AND password = '{$data['senha']}'";

        $response = $this->ExecCommand($query);

        if ($response) {
            return $response;
        }
    }

    public function Add(array $data)
    {
        $id_random = rand(0, 99999);

        $query = "INSERT INTO users VALUES(
            {$id_random}, '{$data['email']}', '{$data['login']}', '{$data['senha']}'  
        );";

        $response = $this->ExecCommand($query);
        return $response;
    }


    public function GetAll()
    {
        $query = "SELECT * FROM users";

        $response = $this->ExecQuery($query);
        return $response;
    }

    public function GetById(int $id)
    {
        $query = "SELECT * FROM users WHERE id = {$id}";

        $response = $this->ExecQuery($query);
        return $response;
    }

    public function Delete(int $id)
    {
        $query = "DELETE FROM users where user_id = {$id}";

        $response = $this->ExecCommand($query);
        return $response;
    }
}
