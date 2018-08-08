/* Stub just to hold place for now */

-- create the database
DROP DATABASE IF EXISTS store;
CREATE DATABASE store;

-- select the database
USE store;

CREATE TABLE IF NOT EXISTS `users` (
  `userId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fistName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `userName` varchar(60) NOT NULL,
  `loginLevel` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
);

INSERT INTO `users` (`userId`, `fistName`, `lastName`, `username`, `loginLevel`, `password`) VALUES
(1, 'Jose', 'lastName', 'admin_1', 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(2, 'Grace', 'lastName', 'admin_2', 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(3, 'Christian', 'lastName', 'user_1',  'customer', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(4, 'Gabe', 'lastName', 'user_2',  'customer', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab');

CREATE TABLE IF NOT EXISTS `category` (
  `catId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) NOT NULL,
  `catName` varchar(60) NOT NULL,
  PRIMARY KEY (`catID`),
  UNIQUE KEY `catName` (`catName`)
);

INSERT INTO `category` (`catId`, `catName`, `description`) VALUES
(1, 'Flip Phone', 'Burner Phones'),
(2, 'Car Phone', 'Phones for 80 year old CEOs stuck in the 90s '),
(3, 'iPhone', 'What all the Hip kids want'),
(4, 'Android Phone', 'Nice phones to give to those you hate');

CREATE TABLE IF NOT EXISTS `purchase` (
   `transId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
   `Product` varchar(60) NOT NULL,
   `Quantity` int NOT NULL,
   `PurchaseDate` varchar(60) NOT NULL,
   PRIMARY KEY (`transId`)
);

INSERT INTO `purchase` (`transId`, `Product`, `Quantity`, `PurchaseDate`) VALUES
(1, 'iphone8', 5, '07/05/2018'),
(2, 'Android', 4, '07/04/2018'),
(3, 'iphone7', 3, '07/03/2018'),
(4, 'Android', 2, '07/02/2018');

CREATE TABLE IF NOT EXISTS `product` (
   `itemId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
   `UnitPrice` int NOT NULL,
   `productName` varchar(60) NOT NULL,
   `description` varchar(60) NOT NULL,
   `category` varchar(60) NOT NULL,
   `image` varchar(60) NOT NULL,
   PRIMARY KEY (`itemId`)
);

INSERT INTO `product` (`itemId`, `UnitPrice`, `productName`, `description`, `category`, `image`) VALUES
(1, 1000, 'iphoneX', 'iPhone X', 3,'iphonex.png'),
(2,  799, 'iphone8+', 'iPhone 8 Plus', 3,'iphone8plus.png'),
(3,  699, 'iphone8', 'iPhone 8', 3,'iphone8.png'),
(4,  669, 'iphone7+', 'iPhone 7 Plus', 3,'iphone7-plus.png'),
(5,  549, 'iphone7', 'iPhone 7', 3,'iphone7.png'),
(6,  549, 'iphone6s+', 'iPhone 6s Plus', 3,'iphone6s-plus.png'),
(7,  449, 'iphone6s', 'iPhone 6s', 3,'iphone6s.png'),
(8,  349, 'iphoneSE', 'iPhone SE', 3,'iphoneSE.png'),
(9,  839, 'SamsungS9+', 'SamsungS9 Plus', 4,'samsung-galaxy-s9plus.png'),
(10, 719, 'SamsungS9', 'SamsungS9', 4,'samsung-galaxy-s9.png'),
(11, 589, 'SamsungS8+', 'SamsungS8 Plus', 4,'samsung-galaxy-s8plus.png'),
(12, 499, 'SamsungS8', 'SamsungS8', 4,'samsung-galaxy-s8.png'),
(13, 600, 'GooglePixel2', 'Google Pixel 2', 4,'google-pixel2.png'),
(14, 700, 'GooglePixel2XL', 'Google Pixel 2XL', 4,'google-pixel2xl.png'),
(15, 300, 'MotorolaX4', 'Motorola X4', 4,'motorola-x4.png'),
(16, 250, 'MotorolaG6', 'Motorola G6', 4,'motorola-g6.png'),
(17, 380, 'LG-G6', 'LG G6', 4,'lg-g6.png'),
(18, 740, 'LG-V30', 'LG V30', 4,'lg-v30.png'),
(19, 750, 'LG-G7ThinQ', 'LG G7 Thin Q', 4,'lg-g7-thinq.png'),
(20, 529, 'OnePlus6', 'OnePlus 6', 4,'oneplus6.png');