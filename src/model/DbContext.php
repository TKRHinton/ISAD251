<?php
include_once  'items.php';


class DbContext
{
    private $db_server = 'https://proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser = 'ISAD251_THinton';
    private $dbPassword = 'ISAD251_22214614';
    private  $dbDatabase = 'ISAD251_THinton';

    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try{

        }
        catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }

    }
}
