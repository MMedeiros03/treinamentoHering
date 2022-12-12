<?php

namespace Nbwdigital\Abcmedseg\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PDO;
use PDOException;

trait DB
{
    use Utils;

    private $endereco = "localhost";
    private $banco = "TreinamentoPHP";
    private $user = "sa";
    private $password = "23080903";

    function ExecCommand(string $query)
    {
        try {
            $pdo = new PDO("pgsql:host={$this->endereco};port=5432;dbname={$this->banco}", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $data = $pdo->query($query)->fetch();

            $data = $data || gettype($data) == "array" ? true : false;

            if ($data) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return false;
        }
    }

    function ExecQuery(string $query)
    {
        try {
            $pdo = new PDO("pgsql:host={$this->endereco};port=5432;dbname={$this->banco}", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $data = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return $e->getMessage();
        }
    }
}
