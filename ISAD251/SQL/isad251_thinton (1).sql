-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Jan 07, 2020 at 10:27 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isad251_thinton`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Add_Item` (IN `ItemID` VARCHAR(11), IN `ItemName` VARCHAR(20), IN `ItemDescription` VARCHAR(80), IN `Price` VARCHAR(11))  Begin 
            INSERT INTO `Items` (`Item_ID`, `Item_Name`, `Item_Description`, `Price`)
            VALUES (`ItemID`, `ItemName`, `ItemDescription`,`Price`);

END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Add_Order` (IN `OrderID` VARCHAR(11), IN `Items_ID_Items` VARCHAR(11), IN `Quantity` INT)  MODIFIES SQL DATA
Begin 

            INSERT INTO `Order_Items` (`Order_ID_Items`, `Items_ID_Items`, `Quantity`)
            VALUES(`OrderID`, `Items_ID_Items`, `Quantity`);
END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Delete_Item` (IN `ItemID` VARCHAR(11))  Begin 


			DELETE FROM `Items`
            WHERE `Item_ID` = `ItemID`;
            
                     
END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Delete_Order` (IN `OrderID` INT)  MODIFIES SQL DATA
Begin 
			 DELETE FROM `Order_Items`
            WHERE `Order_ID_Items` = `OrderID`;


			DELETE FROM `Orderss`
            WHERE `Order_ID` = `OrderID`;
            
           
            
            

 

END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Edit_Item` (IN `ItemID` VARCHAR(11), IN `ItemName` VARCHAR(20), IN `ItemDescription` VARCHAR(80), IN `ItemPrice` VARCHAR(11))  Begin 
			UPDATE `items`
            SET `Item_ID` = `ItemID`, `Item_Name` = `ItemName`,`Item_Description` = `ItemDescription`,`Price` = `ItemPrice`
            WHERE `ItemID` = `Item_ID`;

END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `Make_Order` (IN `Order_ID` VARCHAR(11), IN `Table_Number` INT, IN `First_Name` VARCHAR(20), IN `Order_Description` VARCHAR(80), IN `Order_Date` VARCHAR(11), IN `Item` VARCHAR(11), IN `Quantity` INT)  Begin 
            INSERT INTO `Orderss` (`Order_ID`, `Table_Number`, `Order_Description`, `First_Name`, `Order_Date`)
            VALUES (`Order_ID`, `Table_Number`, `Order_Description`, `First_Name`, `Order_date`);
            
            INSERT INTO `order_items` (`Order_ID_Items`, `Items_ID_Items`, `Quantity`)
            VALUES (`Order_ID`, `Item`, `Quantity`);
END$$

CREATE DEFINER=`ISAD251_THinton`@`%` PROCEDURE `View_Customer_Orders` (IN `OrderID` VARCHAR(11))  READS SQL DATA
    COMMENT 'View Customer Table'
SELECT `Order_ID`, `Table_Number`, `First_Name`, `Order_Date`,`Item_Name`, `Quantity`, `Order_Description`
    FROM `Order_Items`, `Orderss`, `Items`
    WHERE` Orderss.Order_ID` = `Order_Items.Order_ID_Items`
    AND `Items_ID_Items` = `Item_ID`
    AND `Order_ID` = `OrderID`$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_orders`
-- (See below for the actual view)
--
CREATE TABLE `all_orders` (
`First_Name` varchar(20)
,`Items_ID_Items` varchar(11)
,`Order_Date` varchar(20)
,`Order_Description` varchar(80)
,`Order_ID` varchar(11)
,`Quantity` int(11)
,`Table_Number` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_ID` varchar(11) NOT NULL,
  `Item_Name` varchar(20) NOT NULL,
  `Item_Description` varchar(80) DEFAULT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_ID`, `Item_Name`, `Item_Description`, `Price`) VALUES
('10001', 'Vodka', 'Very Very Strong', 2.5),
('10002', 'Devon Whiskey', 'Very Pure', 3.99),
('10003', 'Rum', 'Old Fashined', 2.99),
('10005', 'Coke', 'Pepsi Brand', 1.99),
('10006', 'Crisps', 'Home Made', 0.99),
('10007', 'Pork Scratching', 'Quite Crunchy', 0.99);

-- --------------------------------------------------------

--
-- Table structure for table `orderss`
--

CREATE TABLE `orderss` (
  `Order_ID` varchar(11) NOT NULL,
  `Table_Number` int(11) NOT NULL,
  `Order_Description` varchar(80) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Order_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderss`
--

INSERT INTO `orderss` (`Order_ID`, `Table_Number`, `Order_Description`, `First_Name`, `Order_Date`) VALUES
('20001', 42, 'With Ice', 'James', '12/12/2020'),
('20002', 23, 'I love this place', 'Henry', '2020-01-07'),
('20003', 42, 'With lemon', 'Leah', '12/12/2020'),
('20004', 42, 'IN 20mins time', 'Caleb', '12/12/2020'),
('20006', 22, 'Be Quick', 'Russel', '2020-01-08'),
('20007', 24, 'Nothing', 'Beth', '2019-12-12'),
('20009', 34, 'Crunch', 'Thomas', '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_ID_Items` varchar(11) NOT NULL,
  `Items_ID_Items` varchar(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Order_ID_Items`, `Items_ID_Items`, `Quantity`) VALUES
('20001', '10001', 2),
('20002', '10001', 2),
('20006', '10001', 1),
('20002', '10003', 3),
('20004', '10003', 1),
('20007', '10006', 2),
('20009', '10007', 5);

-- --------------------------------------------------------

--
-- Structure for view `all_orders`
--
DROP TABLE IF EXISTS `all_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ISAD251_THinton`@`%` SQL SECURITY DEFINER VIEW `all_orders`  AS  select `orderss`.`Order_ID` AS `Order_ID`,`orderss`.`Table_Number` AS `Table_Number`,`orderss`.`First_Name` AS `First_Name`,`orderss`.`Order_Date` AS `Order_Date`,`order_items`.`Items_ID_Items` AS `Items_ID_Items`,`order_items`.`Quantity` AS `Quantity`,`orderss`.`Order_Description` AS `Order_Description` from (`order_items` join `orderss`) where (`orderss`.`Order_ID` = `order_items`.`Order_ID_Items`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `orderss`
--
ALTER TABLE `orderss`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Items_ID_Items`,`Order_ID_Items`),
  ADD KEY `FK_Order_ID_Items` (`Order_ID_Items`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
