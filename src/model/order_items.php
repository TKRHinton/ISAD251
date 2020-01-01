<?php

class Order_Items
{
    private $Order_ID_Items;
    private $Items_ID_Items;
    private $Quantity;



    public function __construct($Order_ID_Items,$Items_ID_Items,$Quantity)
    {
        $this->Order_ID_Items = $Order_ID_Items;
        $this->Items_ID_Items = $Items_ID_Items;
        $this->Quantity = $Quantity;
    }

    public function Order_ID_Items()
    {
        return $this->Order_ID_Items;
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