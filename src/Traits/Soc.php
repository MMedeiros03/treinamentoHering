<?php

namespace Nbwdigital\Abcmedseg\Traits;

use GuzzleHttp\Client;

trait Soc
{
    use Utils, DB;
    private $socUrl = "https://ws1.soc.com.br/WebSoc/exportadados?parametro=";
    private $params = [
        "tipoSaida" => "json"
    ];

    /**
     * Get all employees in company
     * @param array $params
     * 
     * @return array|null
     */
    function getAllEmployees(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "EMPLOYEES - GENERAL ERROR");
        return null;
    }

    /**
     * @param array $params
     * 
     * @return array|null
     */
    function getExpiredExams(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "EXAMS - GENERAL ERROR");
        return null;
    }

    /**
     * @param array $params
     * 
     * @return array|null
     */
    public function getExpiredEquipment(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "EQUIPMENT - GENERAL ERROR");
        return null;
    }

    public function getAllCompanies(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "COMPANYES - GENERAL ERROR");
        return null;
    }

    public function getInconsistencies(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "Inconsistencies - GENERAL ERROR");
        return null;
    }

    public function getContactsRH(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "Contact - GENERAL ERROR");
        return null;
    }

    public function getExams(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "Exams - GENERAL ERROR");
        return null;
    }

    public function getCommitments(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "Commitments - GENERAL ERROR");
        return null;
    }

    public function getParecerASO(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "PARECER - GENERAL ERROR");
        return null;
    }

    public function getContactFilial(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "CONTATO FILIAL - GENERAL ERROR");
        return null;
    }

    public function getDoctorAso(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "CONTATO FILIAL - GENERAL ERROR");
        return null;
    }

    public function getCodeGed(array $params = [])
    {
        if ($params) {
            $params = array_merge($params, $this->params);
        }

        $urlParams = $this->socUrl . json_encode($params);
        $response = $this->getRequest($urlParams);

        if ($response) {
            return $response;
        }

        $this->writeToLog("A pesquisa não retornou resultados.", "CODIGOGED - GENERAL ERROR");
        return null;
    }

}
