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
            $pdo = new PDO("pgsql:host={$DBConnection['endereco']};port=5432;dbname={$DBConnection['banco']}", $DBConnection['user'], $DBConnection['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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

    function ExecQuery(string $query, array $DBConnection)
    {
        try {
            $pdo = new PDO("pgsql:host={$DBConnection['endereco']};port=5432;dbname={$DBConnection['banco']}", $DBConnection['user'], $DBConnection['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $data = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            $this->writeToLog($e->getMessage(), "URL - ERROR");
            return $e->getMessage();
        }
    }
}
