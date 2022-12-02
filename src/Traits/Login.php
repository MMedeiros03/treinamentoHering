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

        $response = $this->ExecCommand($query,$DBConnection);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "PARECER - GENERAL ERROR");
        return null;
    }



    
}
