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
CREATE PROCEDURE `Add_Item` (IN `ItemID` VARCHAR(11) , IN `ItemName` VARCHAR(20), In `ItemDescription` VARCHAR(80), In `Price` float)
Begin
            INSERT INTO `Items` (`Item_ID`, `Item_Name`, `Item_Description`, `Price`, `Order_Date`)
            VALUES (`ItemID`, `ItemName`, `ItemDescription`,`Price`);

END //
DELIMITER ;
DELIMITER //
CREATE PROCEDURE `Edit_Item` (IN `ItemID` VARCHAR(11)  , IN `ItemName` VARCHAR(20), In `ItemDescription` VARCHAR(80), In `ItemPrice` float)
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

use isad251_thinton;
DROP TABLE `order_Items`;
DROP TABLE `Items`;
DROP TABLE `orderss`;

CREATE TABLE `Items`
(
    `Item_ID` VARCHAR(11) NOT NULL,
    `Item_Name` VARCHAR(20) NOT NULL,
    `Item_Description` VARCHAR(80) NULL,
    `Price` FLOAT(20) NOT NULL,
    CONSTRAINT pk_Items PRIMARY KEY (`Item_ID`)

);


INSERT INTO `Items`
VALUES (10000, 'Vodka', 'Very Strong', 3.99),
        (10001, 'Brandy', 'Quite Smoth', 2.99),
        (10002, 'Beer', 'Carling Beer', 2.49),
        (10003, 'Rum', 'Old Fashined', 2.99),
        (10004, 'Spiced Rum', 'Best With some Lemonade', 2.99),
        (10005, 'Coke', 'Pepsi Brand', 1.99),
        (10006, 'Crisps', 'Home Made', 0.99),
        (10007, 'Pork Scratching', 'Quite Crunchy', 0.99);




CREATE TABLE `orderss`
(
    `Order_ID` VARCHAR(11) NOT NULL,
    `Table_Number` INT NOT NULL,
    `Order_Description` VARCHAR(80) NOT NULL,
    `First_Name` VARCHAR(20) NOT NULL,
    `Order_Date` VARCHAR(20) NOT NULL,

    CONSTRAINT pk_Order PRIMARY KEY (`Order_ID`)
);

INSERT INTO `orderss`
VALUES (20001, 42 , 'With Ice', 'James', '12/12/2020'),
    (20002, 42 , 'In 5 Mins', 'John', '12/12/2020'),
    (20003, 42 , 'With lemon', 'Leah', '12/12/2020'),
    (20004, 42 , 'IN 20mins time', 'Caleb', '12/12/2020');




CREATE TABLE `order_Items`
(
    `Order_ID_Items` VARCHAR(11) NOT NULL,
    `Items_ID_Items` VARCHAR(11) NOT NULL,
    `Quantity` INT NOT NULL,

    CONSTRAINT FK_Order_ID_Items FOREIGN KEY (`Order_ID_Items`) REFERENCES Orderss(`Order_ID`),
    CONSTRAINT FK_Items_ID_Items FOREIGN KEY (`Items_ID_Items`) REFERENCES Items(`Item_ID`),
    CONSTRAINT PK_Order_Items PRIMARY KEY(`Items_ID_Items`, `Order_ID_Items`)

);

INSERT INTO `Order_Items`
VALUES (20001, 10001, 2),
    (20002, 10001, 2),
    (20003, 10004, 4),
    (20004, 10003, 1),
    (20002, 10005, 2);


