<?php

namespace Nbwdigital\Abcmedseg\Traits;

trait Login
{
    use Utils, DB;

    private $endereco = "localhost";
    private $banco = "TreinamentoPHP";
    private $user = "sa";
    private $password = "23080903";

    public function VerifyLogin(array $data)
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];
        $query = "SELECT * FROM users WHERE  login = '{$data['login']}' AND password = '{$data['senha']}'";

        $response = $this->ExecCommand($query, $DBConnection);

        if ($response) {
            return $response;
        }
    }

    public function Add(array $data)
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];

        $id_random = rand(0, 99999);

        $query = "INSERT INTO users VALUES(
            {$id_random}, '{$data['email']}', '{$data['login']}', '{$data['senha']}'  
        );";

        $response = $this->ExecCommand($query, $DBConnection);
        return $response;
    }


    public function GetAll()
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];

        $query = "SELECT * FROM users";

        $response = $this->ExecQuery($query, $DBConnection);
        return $response;
    }

    public function GetById(int $id)
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];

        $query = "SELECT * FROM users WHERE id = {$id}";

        $response = $this->ExecQuery($query, $DBConnection);
        return $response;
    }

    public function Delete(int $id)
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];

        $query = "DELETE FROM users where user_id = {$id}";

        $response = $this->ExecCommand($query, $DBConnection);
        return $response;
    }
}
