
    CREATE View All_Orders AS
    SELECT Order_ID, Table_Number, First_Name, Order_Date, Items_ID_Items, Quantity, Order_Description
    FROM Order_Items, Orderss
    WHERE Orderss.Order_ID = Order_Items.Order_ID_Items
    ;
GO

    Create View Customer_Order AS
    SELECT Order_ID, Table_Number, First_Name, Order_Date,Item_Name, Quantity, Order_Description
    FROM Order_Items, Orderss, Items
    WHERE Orderss.Order_ID = Order_Items.Order_ID_Items
    AND Items_ID_Items = Item_ID
    AND Order_ID = '20002'
    ;

   
   