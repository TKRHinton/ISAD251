<?php
include_once 'items.php';
include_once 'orders.php';
include_once 'order_items.php';


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
            if ($this->connection == null) {
                $this->dataSourceName = 'mysql:dbname' . $this->dbDatabase. ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }

        }
        catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }

    }

    public function View_items()
    {
        $sql = "SELECT * FROM `[ISAD251_THinton].[dbo].[Items]`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $View_Items = [];

        if($resultSet)
        {

            foreach ($resultSet as $row)
            {
                $View_Item = new View_Items($row['Item_ID'],$row['Item_Name'],$row['Item_Description'],$row['Price']);
                $View_Items[] = $View_Item;
            }

        }
        return $View_Items;

    }

    public function View_All_Orders()
    {
        $sql = "SELECT * FROM [ISAD251_THinton].[dbo].[All_Orders]";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $View_All_Orders = [];

        if($resultSet)
        {
            foreach ($resultSet as $row)
            {
                $View_Order = new View_All_Orders($row['Order_ID'],$row['First_Name'],$row['Order_Date'],$row['Items_ID_Items'],$row['Quantity'],$row['Order_Description']);
                $View_All_Orders[] = $View_Order;
            }
        }
        return $View_All_Orders;


    }

    public function Customer_items()
    {


    }









}
