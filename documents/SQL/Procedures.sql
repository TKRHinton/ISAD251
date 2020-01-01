





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