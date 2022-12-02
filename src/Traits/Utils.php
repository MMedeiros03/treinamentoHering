<?php

namespace Nbwdigital\Abcmedseg\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use FilesystemIterator;

date_default_timezone_set('America/Sao_Paulo');

trait Utils
{
    function writeToLog($data, $title = ''): void
    {
        if (!file_exists(getcwd() . "/logs")) {
            mkdir(getcwd() . "/logs", 0777, true);
        }

        $log = date("Y.m.d h:i:s") . " | ";
        $log .= (strlen($title) > 0 ? $title : 'DEBUG') . " | ";
        $log .= print_r($data, 1) . "\n";

        if ($fp = fopen(getcwd() . "/logs/insert_time_work.log", "a+")) {
            fwrite($fp, $log);
            fclose($fp);
        }
    }

    function dateNowAndAddDays(int $numDays = 0): array
    {
        $date = date("Y-m-d");
        $date = date_create($date);
        $finalDate = date_add($date, date_interval_create_from_date_string("{$numDays} days"));

        $inicitalDate = date("d/m/Y");
        $finalDate = date_format($finalDate, "d/m/Y");

        return array("initialDate" => $inicitalDate, "finalDate" => $finalDate);
    }

    function getEmployee(array $employees, string $codeEmployee)
    {
        $employee = array_filter($employees, function ($object) use ($codeEmployee) {
            return $object['CODIGO'] === $codeEmployee;
        });

        foreach ($employee as $item) {
            $return = $item;
        }

        return $return;
    }

    function nextCardStage($stage)
    {
        switch ($stage) {
            case "C1:NEW":
                return "C1:1";

            case "C1:1":
                return "C1:PREPARATION";

            case "C1:PREPARATION":
                return "C1:PREPAYMENT_INVOICE";

            case "C1:PREPAYMENT_INVOICE":
                return "C1:EXECUTING";

            case "C1:EXECUTING":
                return "C1:LOSE";

            case "C1:WON":
                return "C1:WON";

            default:
                return "C1:NEW";
        }
    }

    function isRangeOfDaysMoreThanMonth($date)
    {
        $date = explode("/", $date);
        $date = $date[2] . "-" . $date[1] . "-" . $date[0];
        $start_date = strtotime(date('Y-m-d'));
        $end_date = strtotime($date);

        $days = ($start_date - $end_date) / 60 / 60 / 24;

        if ($days > 30) {
            return true;
        }

        return false;
    }

    function verifyEmail(string $endereço = null)
    {
        $email = $email = strtolower($endereço);
        $email = str_replace([",", " "], ";", $email);
        $email = str_replace(".br", ".br;", $email);
        $email_f = explode(";", $email);

        return $email_f[0];
    }

    function setPrestador(string $cod = '')
    {
        switch ($cod) {
            case "60913" || "1303651":
                $prestador = '137';
                break;
            default:
                $prestador = '';
                break;
        }
        return $prestador;
    }

    private function generatePasswordDigest()
    {
        $this->nonce = mt_rand();
        $this->timestamp = gmdate('Y-m-d\TH:i:s\Z');

        $h =  strtotime($this->timestamp);
        $temp = strtotime("+1 minutes", $h);
        $this->expire = gmdate('Y-m-d\TH:i:s\Z', $temp);

        $hash = sha1($this->nonce . $this->timestamp . '248c9bb251', true);

        return base64_encode($hash);
    }

    function setTypeExam(string $tipoficha)
    {
        switch ($tipoficha) {
            case '1':
                $tipoficha = 'Admissional';
                break;
            case '2':
                $tipoficha = 'Periódico';
                break;
            case '3':
                $tipoficha = 'Retorno ao Trabalho';
                break;
            case '4':
                $tipoficha = 'Mudança de Função';
                break;
            case '5':
                $tipoficha = 'Demissional';
                break;
            default:
                $tipoficha = 'Outro';
                break;
        }
        return $tipoficha;
    }


    public function deletePath($pasta)
    {
        $iterator     = new RecursiveDirectoryIterator($pasta, FilesystemIterator::SKIP_DOTS);
        $rec_iterator = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($rec_iterator as $file) {
            $file->isFile() ? unlink($file->getPathname()) : rmdir($file->getPathname());
        }
    }
}
