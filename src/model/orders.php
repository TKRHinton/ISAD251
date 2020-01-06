<?php

class Orders
{
    private $Order_ID;
    private $Table_Number;
    private $Order_Description;
    private $First_Name;
    private $Order_Date;


    public function __construct($Order_ID,$Table_Number,$Order_Description,$First_Name)
    {
        $this->Order_ID = $Order_ID;
        $this->Table_Number = $Table_Number;
        $this->Order_Description = $Order_Description;
        $this->First_Name = $First_Name;
        $this->Order_Date = getdate();
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


}