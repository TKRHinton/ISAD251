





CREATE PROCEDURE [View_Customer_Orders] (@OrderID AS INT)
AS
BEGIN
SELECT Order_ID, Table_Number, First_Name, Order_Date,Item_Name, Quantity, Order_Description
    FROM Order_Items, Orderss, Items
    WHERE Orderss.Order_ID = Order_Items.Order_ID_Items
    AND Items_ID_Items = Item_ID
    AND Order_ID = @OrderID

    END;
GO

CREATE PROCEDURE [Make_Order] (@OrderID as INT, @Table_Number as INT, @First_Name as VARCHAR(20), @Quantity as INT, @Order_Description as VARCHAR(80), @Item as INT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY

            

            INSERT INTO dbo.Orderss (Order_ID, Table_Number, Order_Description, First_Name, Order_Date)
            VALUES (@OrderID, @Table_Number, @Order_Description, @First_Name, GETDATE())

            INSERT INTO dbo.Order_Items (Order_ID_Items, Items_ID_Items, Quantity)
            VALUES(@OrderID, @Item, @Quantity)

            IF @@TRANCOUNT > 0 COMMIT;        
        END TRY

        BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;
END;
GO

CREATE PROCEDURE [Add_Order] (@OrderID as INT, @Item as INT, @Quantity as INT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY
            

            INSERT INTO dbo.Order_Items (Order_ID_Items, Items_ID_Items, Quantity)
            VALUES(@OrderID, @Item, @Quantity)

            IF @@TRANCOUNT > 0 COMMIT;
        END TRY

   BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;

END;
GO

CREATE PROCEDURE [Delete_Order] (@OrderID as INT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY

            DELETE FROM dbo.Orderss
            WHERE Order_ID = @OrderID

            DELETE FROM dbo.Order_Items
            WHERE Order_ID_Items = @OrderID

            IF @@TRANCOUNT > 0 COMMIT;
      
        END TRY

    BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;

END;
GO


CREATE PROCEDURE [Add_Item] (@ItemID AS INT, @ItemName as VARCHAR(20), @ItemDescription AS VARCHAR(80), @Price AS FLOAT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY

            INSERT INTO dbo.Items (Item_ID, Item_Name, Item_Description, Price)
            VALUES (@ItemID, @ItemName, @ItemDescription, @Price)

            IF @@TRANCOUNT > 0 COMMIT;

        
        END TRY

    BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;

END;
GO



CREATE PROCEDURE [Edit_Item] (@ItemID AS INT, @ItemName as VARCHAR(20), @ItemDescription AS VARCHAR(80), @Price AS FLOAT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY

            UPDATE dbo.Items
            SET Item_ID = @ItemID, Item_Name = @ItemName, Item_Description = @ItemDescription, Price = @Price
            WHERE @ItemID = Item_ID;

            IF @@TRANCOUNT > 0 COMMIT;

        
        END TRY

     BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;

END;
GO

CREATE PROCEDURE [Delete_Item] (@ItemID AS INT)
AS
BEGIN
    BEGIN TRANSACTION

        DECLARE @Error NVARCHAR(Max);

        BEGIN TRY

            DELETE FROM dbo.Items
            WHERE Item_ID = @ItemID

            IF @@TRANCOUNT > 0 COMMIT;

        
        END TRY

      BEGIN CATCH
            SET @Error = 'AN error was encountered, Order could not happen';

            IF @@TRANCOUNT > 0
                ROLLBACK TRANSACTION;
            RAISERROR(@Error,1,0)
        END CATCH;

END;
GO

DELIMITER //
CREATE PROCEDURE `Make_Order` (IN `OrderID` int,  IN `Table_Number`int , IN `First_Name` VARCHAR(20), In `Quantity` int, In `Order_Description` VARCHAR(80), In `items` int)
Begin
            INSERT INTO `Orderss` (`Order_ID`, `Table_Number`, `Order_Description`, `First_Name`, `Order_Date`)
            VALUES (`OrderID`, `Table_Number`, `Order_Description`, `First_Name`, CURRENT_DATE());

            INSERT INTO `Order_Items` (`Order_ID_Items`, `Items_ID_Items`, `Quantity`)
            VALUES(`OrderID`, `Item`, `Quantity`);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `Add_Order` (IN `OrderID` int, In `Quantity` int, In `items` int)
Begin

            INSERT INTO `Order_Items` (`Order_ID_Items`, `Items_ID_Items`, `Quantity`)
            VALUES(`OrderID`, `Item`, `Quantity`);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `Delete_Order` (IN `OrderID` int)
Begin
			DELETE FROM `Orderss`
            WHERE `Order_ID` = `OrderID`;

            DELETE FROM `Order_Items`
            WHERE `Order_ID_Items` = `OrderID`;

END //
DELIMITER ;
DELIMITER //
CREATE PROCEDURE `Add_Item` (IN `ItemID` int , IN `ItemName` VARCHAR(20), In `ItemDescription` VARCHAR(80), In `Price` float)
Begin
            INSERT INTO `Items` (`Item_ID`, `Item_Name`, `Item_Description`, `Price`, `Order_Date`)
            VALUES (`ItemID`, `ItemName`, `ItemDescription`,`Price`);

END //
DELIMITER ;
DELIMITER //
CREATE PROCEDURE `Edit_Item` (IN `ItemID` int , IN `ItemName` VARCHAR(20), In `ItemDescription` VARCHAR(80), In `ItemPrice` float)
Begin
			UPDATE `items`
            SET `Item_ID` = `ItemID`, `Item_Name` = `ItemName`,`Item_Description` = `ItemDescription`,`Price` = `ItemPrice`
            WHERE `ItemID` = `Item_ID`;

END //
DELIMITER ;
DELIMITER //
CREATE PROCEDURE `Delete_Item` (IN `ItemID` int)
Begin
			DELETE FROM `Items`
            WHERE `Item_ID` = `ItemID`;

END //
DELIMITER ;

use isad251_thinton;
CREATE VIEW `All_Orders` AS

    SELECT `Order_ID`, `Table_Number`, `First_Name`, `Order_Date`, `Items_ID_Items`, `Quantity`, `Order_Description`
    FROM `Order_Items`, `Orderss`
    WHERE `Order_ID` = `Order_ID_Items`;