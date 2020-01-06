<?php
class AllOrders
{
    private $Order_ID;
    private $Table_Number;
    private $First_Name;
    private $Quantity;
    private $Order_Description;
    private $Order_Date;
    private $Items_ID;


public function __construct($Order_ID,$Table_Number,$First_Name,$Items_ID_Items,$Quantity,$Order_Description, $Order_Date)
{
    $this->Order_ID = $Order_ID;
    $this->Table_Number = $Table_Number;
    $this->First_Name = $First_Name;
    $this->Quantity = $Quantity;
    $this->Order_Description = $Order_Description;
    $this->First_Name = $First_Name;
    $this->Items_ID_Items = $Items_ID_Items;
    $this->Order_Date = $Order_Date;
}


public function Order_ID()
{
    return $this->Order_ID;
}

public function  Table_Number()
{
    return $this->Table_Number;
}

public function  Order_Description()
{
    return $this->Order_Description;
}

public function  First_Name()
{
    return $this->First_Name;
}

public function  Order_Date()
{
    return $this->Order_Date;
}
    public function Items_ID_Items()
    {
        return $this->Items_ID_Items;
    }

    public function Quantity()
    {
        return $this->Quantity;
    }
}

