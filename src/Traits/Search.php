<?php

namespace Nbwdigital\Abcmedseg\Traits;

trait Search
{
    use Utils, DB;

    private $endereco = "localhost";
    private $banco = "TreinamentoPHP";
    private $user = "sa";
    private $password = "23080903";

    public function Search(string $query)
    {
        $DBConnection = [
            "endereco" => $this->endereco,
            "banco" => $this->banco,
            "user" => $this->user,
            "password" => $this->password,
        ];
        $query = "SELECT * FROM users WHERE login ILIKE '%{$query}%'";

        $response = $this->ExecQuery($query, $DBConnection);

        if ($response) {
            return $response;
        }
    }

}
