
DROP TABLE [dbo].[Order_Items]
DROP TABLE [dbo].[Items]
DROP TABLE [dbo].[Orderss]
 GO


CREATE TABLE dbo.Items
(
    Item_ID INT NOT NULL,
    Item_Name VARCHAR(20) NOT NULL,
    Item_Description VARCHAR(80) NULL,
    Price FLOAT(20) NOT NULL

    CONSTRAINT pk_Items PRIMARY KEY (Item_ID)

);


INSERT INTO dbo.Items
VALUES (10000, 'Vodka', 'Very Strong', 3.99),
        (10001, 'Brandy', 'Quite Smoth', 2.99),
        (10002, 'Beer', 'Carling Beer', 2.49),
        (10003, 'Rum', 'Old Fashined', 2.99),
        (10004, 'Spiced Rum', 'Best With some Lemonade', 2.99),
        (10005, 'Coke', 'Pepsi Brand', 1.99),
        (10006, 'Crisps', 'Home Made', 0.99),
        (10007, 'Pork Scratching', 'Quite Crunchy', 0.99)




CREATE TABLE dbo.Orderss
(
    Order_ID INT NOT NULL,
    Table_Number INT NOT NULL,
    Order_Descriptiom VARCHAR(80) NOT NULL,
    First_Name VARCHAR(20) NOT NULL,
    Order_Date DATE NOT NULL
    
    CONSTRAINT pk_Order PRIMARY KEY (Order_ID)
);

INSERT INTO dbo.Orderss
VALUES (20001, 42 , 'With Ice', 'James', GETDATE()),
    (20002, 42 , 'In 5 Mins', 'John', GETDATE()),
    (20003, 42 , 'With lemon', 'Leah', GETDATE()),
    (20004, 42 , 'IN 20mins time', 'Caleb', GETDATE())




CREATE TABLE dbo.Order_Items 
(
    Order_ID_Items INT NOT NULL,
    Items_ID_Items INT NOT NULL,
    Quantity INT NOT NULL

    CONSTRAINT FK_Order_ID_Items FOREIGN KEY (Order_ID_Items) REFERENCES Orderss(Order_ID),
    CONSTRAINT FK_Items_ID_Items FOREIGN KEY (Items_ID_Items) REFERENCES Items(Item_ID),
    CONSTRAINT PK_Order_Items PRIMARY KEY(Items_ID_Items, Order_ID_Items)

)

INSERT INTO dbo.Order_Items
VALUES (20001, 10001, 2),
    (20002, 10001, 2),
    (20003, 10004, 4),
    (20004, 10003, 1),
    (20002, 10005, 2)



