<?php

class Database
{
    //melakukan pengisian variable dengan konstanta yg sudah kita buat, serta merubahnya menjadi private agar yg bisa menggunakannya hanya pada class ini saja
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; //database-host
    private $stmt; //statement

    //melakukan __construct
    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . $this->host . "; dbname=";
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->dbh = new PDO($dsn . $this->db_name, $this->user, $this->pass, $option);
        } catch (PDOException $error) {
            die("Kesalahan :" . $error->getMessage());
        }
    }

    //function untuk query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    //function untuk binding
    public function bind($params, $value, $type = null)
    {

        if ($type == null) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($params, $value, $type);
    }

    //function untuk execute
    public function execute()
    {
        $this->stmt->execute();
    }

    //mendapat hasil yang banyak
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //mendapat hasil satuan
    public function singleSet()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //mengetahui apakah ada perubahan atau tidak
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
