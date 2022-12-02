<?php

namespace Nbwdigital\Abcmedseg\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PDO;
use PDOException;

trait DB
{
    use Utils;

    function ExecCommand(string $query, array $DBConnection)
    {
        try {
            $teste = "pgsql:host={$DBConnection['endereco']};port=5432;dbname={$DBConnection['banco']}";
            $teste3 = $DBConnection['user'];
            $teste4 =  $DBConnection['password'];
            
            $pdo = new PDO("pgsql:host={$DBConnection['endereco']};port=5432;dbname={$DBConnection['banco']}", $DBConnection['user'], $DBConnection['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $data = $pdo->query($query)->fetch();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return $e->getMessage();
        }
    }

}
