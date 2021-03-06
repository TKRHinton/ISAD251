<?php
include_once 'items.php';
include_once 'orders.php';
include_once 'order_items.php';
include_once 'AllOrders.php';

class DbContext
{
    private $db_server = 'proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser = 'ISAD251_THinton';
    private $dbPassword = 'ISAD251_22214614';
    private  $dbDatabase = 'ISAD251_thinton';

    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try{
            if ($this->connection == null) {
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase. ';host=' . $this->db_server;
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



    public function Customers_Order($request)
    {
        $sql = "SELECT * FROM `all_orders` WHERE `Order_ID` = :request,";
        //$sql = "SELECT * FROM `all_orders`,";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Order_ID', $request->Order_ID(), PDO::PARAM_STR);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $View_All_Orders = [];

        if($resultSet)
        {
            foreach ($resultSet as $row)
            {
                $View_Order = new AllOrders($row['Order_ID'],$row['Table_Number'],$row['First_Name'],$row['Order_Date'],$row['Items_ID_Items'],$row['Quantity'],$row['Order_Description']);
                $View_All_Orders[] = $View_Order;
            }
        }
        return $View_All_Orders;
    }


    public function View_items()
    {
        $sql = "SELECT * FROM `items`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $View_Items = [];

        if($resultSet)
        {
            foreach ($resultSet as $row)
            {
                $View_Item = new items($row['Item_ID'],$row['Item_Name'],$row['Item_Description'],$row['Price']);
                $View_Items[] = $View_Item;
            }
        }
        return $View_Items;
    }

    public function View_All_Orders()
    {
        $sql = "SELECT * FROM `all_orders`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $View_All_Orders = [];

        if($resultSet)
        {
            foreach ($resultSet as $row)
            {
                $View_Order = new AllOrders($row['Order_ID'],$row['Table_Number'],$row['First_Name'],$row['Order_Date'],$row['Items_ID_Items'],$row['Quantity'],$row['Order_Description']);
                $View_All_Orders[] = $View_Order;
            }
        }
        return $View_All_Orders;
    }



    public function Customers_Make_Order($request)
    {
        $sql = "CALL Make_Order(:Order_ID, :Table_Number, :First_Name, :Order_Description, :Order_Date, :Item, :Quantity) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Order_ID', $request->Order_ID(), PDO::PARAM_STR);
        $statement->bindParam(':Table_Number', $request->Table_Number(), PDO::PARAM_INT);
        $statement->bindParam(':First_Name', $request->First_Name(), PDO::PARAM_STR);
        $statement->bindParam(':Order_Description', $request->Order_Description(), PDO::PARAM_STR);
        $statement->bindParam(':Order_Date', $request->Order_Date(), PDO::PARAM_STR);


        $statement->bindParam(':Item', $request->Items_ID_Items(), PDO::PARAM_STR);
        $statement->bindParam(':Quantity', $request->Quantity(), PDO::PARAM_INT);

        $return = $statement->execute();
        return $return;
    }

    public function Customers_Add($request)
    {
        $sql = "CALL Add_Order(:Order_ID, :Items_ID_Items, :Quantity) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Order_ID', $request->Order_ID_Items(), PDO::PARAM_STR);
        $statement->bindParam(':Items_ID_Items', $request->Items_ID_Items(), PDO::PARAM_STR);
        $statement->bindParam(':Quantity', $request->Quantity(), PDO::PARAM_INT);

        $return = $statement->execute();
        return $return;
    }

    public function Customers_Delete($request)
    {
        $sql = "CALL Delete_Order(:Order_ID) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Order_ID', $request->Order_ID(), PDO::PARAM_INT);

        $return = $statement->execute();
        return $return;
    }

    public function Admin_Add($request)
    {
        $sql = "CALL Add_Item(:Item, :ItemName, :ItemDescription, :Price) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Item', $request->Item_ID(), PDO::PARAM_INT);
        $statement->bindParam(':ItemName', $request->Item_Name(), PDO::PARAM_STR);
        $statement->bindParam(':ItemDescription', $request->Item_Description(), PDO::PARAM_STR);
        $statement->bindParam(':Price', $request->Price(), PDO::PARAM_STR);

        $return = $statement->execute();
        return $return;
    }

    public function Admin_Edit($request)
    {
        $sql = "CALL Edit_Item(:Item, :ItemName, :ItemDescription, :Price) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':Item', $request->Item_ID(), PDO::PARAM_INT);
        $statement->bindParam(':ItemName', $request->Item_Name(), PDO::PARAM_STR);
        $statement->bindParam(':ItemDescription', $request->Item_Description(), PDO::PARAM_STR);
        $statement->bindParam(':Price', $request->Price(), PDO::PARAM_STR);

        $return = $statement->execute();
        return $return;
    }
    public function Admin_Delete($request)
    {
        $sql = "CALL Delete_Item(:ItemID) ";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(':ItemID', $request->Item_ID(), PDO::PARAM_INT);

        $return = $statement->execute();
        return $return;
    }

    public function getAll($tableName)
    {
        $sql = "SELECT * FROM ";
        switch ($tableName)
        {
            case "items" : $sql = $sql." items";
                break;
            case "orderss" : $sql = $sql." orderss";
                break;
            case "order_items" : $sql = $sql." order_items";
                break;
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $resultSet;
    }









}
