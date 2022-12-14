<?php

class bd
{
    protected $conexio;
    public function __construct()
    {
        $sqlConfig = include(__DIR__ . "/bd_config.php");
        $this->conexio = new mysqli($sqlConfig['sql_server'], $sqlConfig['sql_user'], $sqlConfig['sql_pass'], $sqlConfig['sql_bd_name']);
        unset($sqlConfig);
        $this->conexio->query("SET NAMES 'utf8'");
    }
    public function __destruct()
    {
        $this->conexio->close();
    }
}

class data extends bd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }



    public function setValue($value)
    {
        $output = null;
        $sql = "INSERT INTO dades (value) VALUES (?);";


        if ($this->conexio->connect_errno) {
            return false;
        } else {
            $query = $this->conexio->prepare($sql);
            $query->bind_param("s", $value);
            $query->execute();
            $query->store_result();

            mysqli_stmt_fetch($query);
            $query->close();
            return $output;
        }
    }

    public function getValues()
    {
        $output = null;
        $count = 0;
        $sql = "SELECT value, date FROM dades ORDER BY date DESC";

        if ($this->conexio->connect_errno) {
            return false;
        } else {
            $query = $this->conexio->prepare($sql);
            $query->execute();
            $query->store_result();

            mysqli_stmt_bind_result($query, $value, $date);
            while (mysqli_stmt_fetch($query)) {
                $output[$count]["value"] = $value;
                $output[$count]["date"] = $date;

                $count++;
            }
            $query->close();
            return $output;
        }
    }


    public function getLastValue()
    {
        $output = null;
        $sql = "SELECT value, date FROM dades ORDER BY date DESC LIMIT 1";
        if ($this->conexio->connect_errno) {
            return false;
        } else {
            $query = $this->conexio->prepare($sql);
            $query->execute();
            $query->store_result();

            mysqli_stmt_bind_result($query, $value, $date);
            while (mysqli_stmt_fetch($query)) {
                $output['value'] = $value;
                $output['date'] = $date;
            }
            $query->close();
            return $output;
        }
    }


    public function getLast10RecodsBD()
    {
        $index = 0;
        $output = null;
        $sql = "SELECT value, date FROM dades ORDER BY date DESC LIMIT 10";
        if ($this->conexio->connect_errno) {
            return false;
        } else {
            $query = $this->conexio->prepare($sql);
            $query->execute();
            $query->store_result();

            mysqli_stmt_bind_result($query, $value, $date);
            while (mysqli_stmt_fetch($query)) {
                $output[$index]['value'] = $value;
                $output[$index]['date'] = $date;

                $index++;
            }
            $query->close();
            return $output;
        }
    }


    public function getStatsBD()
    {
        $output = null;
        $sql = "SELECT min(value), max(value) FROM dades";
        if ($this->conexio->connect_errno) {
            return false;
        } else {
            $query = $this->conexio->prepare($sql);
            $query->execute();
            $query->store_result();

            mysqli_stmt_bind_result($query, $min, $max);
            while (mysqli_stmt_fetch($query)) {
                $output['min'] = $min;
                $output['max'] = $max;
            }
            $query->close();
            return $output;
        }
    }
}
