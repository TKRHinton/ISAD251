<?php

class Items
{
    private $Item_ID;
    private $Item_Name;
    private $Item_Description;
    private $Price;

    private function __construct($Item_ID,$Item_Name,$Item_Description,$Price)
    {
        $this->Item_ID = $Item_ID;
        $this->Item_Name = $Item_Name;
        $this->Item_Description = $Item_Description;
        $this->Price = $Price;
    }

    public function Item_ID()
    {
        return $this->Item_ID;
    }

    public function Item_Name()
    {
        return $this->Item_Name;
    }

    public function Item_Description()
    {
        return $this->Item_Description;
    }

    public function Price()
    {
        return $this->Price;
    }







}
