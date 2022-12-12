<?php

namespace Nbwdigital\Abcmedseg\Repository;

use Nbwdigital\Abcmedseg\Traits\Utils;
use Nbwdigital\Abcmedseg\Traits\DB;

class ProductRepository
{
    use Utils, DB;

    public function Search(string $query)
    {
        $query = "SELECT * FROM products WHERE Name ILIKE '%{$query}%'";
        $response = $this->ExecQuery($query);
        if ($response) {
            return $response;
        }
    }

    public function Add(array $data)
    {
        $id_random = rand(0, 99999);

        $query = "INSERT INTO products VALUES(
            {$id_random}, '{$data['brand']}', '{$data['name']}', '{$data['value']}', '{$data['stock']}', '{$data['description']}'   
        );";

        $response = $this->ExecCommand($query);
        return $response;
    }


    public function GetAll()
    {
        $query = "SELECT * FROM products";

        $response = $this->ExecQuery($query);
        return $response;
    }

    public function GetById(int $id)
    {
        $query = 'SELECT * FROM products WHERE "CodProduct" = '. $id;

        $response = $this->ExecQuery($query);
        return $response;
    }

    public function Delete(int $id)
    {
        $query = 'DELETE FROM products WHERE "CodProduct" = '. $id;

        $response = $this->ExecCommand($query);
        return $response;
    }

}
