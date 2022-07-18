CREATE DATABASE assignment1;
use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1000, 'Fish Fingers', 2.55, '500 gram', 1500);
INSERT INTO `products` VALUES (1001, 'Fish Fingers', 5.00, '1000 gram', 750);
INSERT INTO `products` VALUES (1002, 'Hamburger Patties', 2.35, 'Pack 10', 1200);
INSERT INTO `products` VALUES (1003, 'Shelled Prawns', 6.90, '250 gram', 300);
INSERT INTO `products` VALUES (1004, 'Tub Ice Cream', 1.80, 'I Litre', 800);
INSERT INTO `products` VALUES (1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200);
INSERT INTO `products` VALUES (2000, 'Panadol', 3.00, 'Pack 24', 2000);
INSERT INTO `products` VALUES (2001, 'Panadol', 5.50, 'Bottle 50', 1000);
INSERT INTO `products` VALUES (2002, 'Bath Soap', 2.60, 'Pack 6', 500);
INSERT INTO `products` VALUES (2003, 'Garbage Bags Small', 1.50, 'Pack 10', 500);
INSERT INTO `products` VALUES (2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300);
INSERT INTO `products` VALUES (2005, 'Washing Powder', 4.00, '1000 gram', 800);
INSERT INTO `products` VALUES (3000, 'Cheddar Cheese', 8.00, '500 gram', 1000);
INSERT INTO `products` VALUES (3001, 'Cheddar Cheese', 15.00, '1000 gram', 1000);
INSERT INTO `products` VALUES (3002, 'T Bone Steak', 7.00, '1000 gram', 200);
INSERT INTO `products` VALUES (3003, 'Navel Oranges', 3.99, 'Bag 20', 200);
INSERT INTO `products` VALUES (3004, 'Bananas', 1.49, 'Kilo', 400);
INSERT INTO `products` VALUES (3005, 'Peaches', 2.99, 'Kilo', 500);
INSERT INTO `products` VALUES (3006, 'Grapes', 3.50, 'Kilo', 200);
INSERT INTO `products` VALUES (3007, 'Apples', 1.99, 'Kilo', 500);
INSERT INTO `products` VALUES (4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200);
INSERT INTO `products` VALUES (4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200);
INSERT INTO `products` VALUES (4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800);
INSERT INTO `products` VALUES (4003, 'Instant Coffee', 2.89, '200 gram', 500);
INSERT INTO `products` VALUES (4004, 'Instant Coffee', 5.10, '500 gram', 500);
INSERT INTO `products` VALUES (4005, 'Chocolate Bar', 2.50, '500 gram', 300);
INSERT INTO `products` VALUES (5000, 'Dry Dog Food', 5.95, '5 kg Pack', 400);
INSERT INTO `products` VALUES (5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400);
INSERT INTO `products` VALUES (5002, 'Bird Food', 3.99, '500g packet', 200);
INSERT INTO `products` VALUES (5003, 'Cat Food', 2.00, '500g tin', 200);
INSERT INTO `products` VALUES (5004, 'Fish Food', 3.00, '500g packet', 200);
INSERT INTO `products` VALUES (2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500);
COMMIT;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(10) unsigned DEFAULT NULL,
  `cat_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, 'Frozen Food');
INSERT INTO `category` VALUES (2, 'Fresh Food');
INSERT INTO `category` VALUES (3, 'Beverages');
INSERT INTO `category` VALUES (4, 'Home Health');
INSERT INTO `category` VALUES (5, 'Pet Food');
COMMIT;

-- ----------------------------
-- Table structure for category_sub
-- ----------------------------
DROP TABLE IF EXISTS `category_sub`;
CREATE TABLE `category_sub` (
  `cat_id` int(10) unsigned DEFAULT NULL,
  `cat_sub_id` int(10) unsigned DEFAULT NULL,
  `cat_sub_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category_sub
-- ----------------------------
BEGIN;
INSERT INTO `category_sub` VALUES (1, 1, 'Fish Fingers');
INSERT INTO `category_sub` VALUES (1, 2, 'Tub Ice Cream');
INSERT INTO `category_sub` VALUES (1, 3, 'Hamburger Patties');
INSERT INTO `category_sub` VALUES (1, 4, 'Shelled Prawns');
INSERT INTO `category_sub` VALUES (2, 1, 'TBone Steak');
INSERT INTO `category_sub` VALUES (2, 2, 'Cheddar Cheese');
INSERT INTO `category_sub` VALUES (2, 3, 'Navel Orange');
INSERT INTO `category_sub` VALUES (2, 4, 'Bananas');
INSERT INTO `category_sub` VALUES (2, 5, 'Grapes');
INSERT INTO `category_sub` VALUES (2, 6, 'Apples');
INSERT INTO `category_sub` VALUES (2, 7, 'Peaches');
INSERT INTO `category_sub` VALUES (3, 1, 'Instant Coffee');
INSERT INTO `category_sub` VALUES (3, 2, 'Earl Grey Tea Bags');
INSERT INTO `category_sub` VALUES (3, 3, 'Chocolate Bar');
INSERT INTO `category_sub` VALUES (4, 1, 'Bath Soap');
INSERT INTO `category_sub` VALUES (4, 2, 'Panadol');
INSERT INTO `category_sub` VALUES (4, 3, 'Washing Powder');
INSERT INTO `category_sub` VALUES (4, 4, 'Garbage Bags');
INSERT INTO `category_sub` VALUES (4, 5, 'Laundry Bleach');
INSERT INTO `category_sub` VALUES (5, 1, 'Bird Food');
INSERT INTO `category_sub` VALUES (5, 2, 'Cat Food');
INSERT INTO `category_sub` VALUES (5, 3, 'Dry Dog Food');
INSERT INTO `category_sub` VALUES (5, 4, 'Fish Food');
COMMIT;

-- ----------------------------
-- Table structure for category_products
-- ----------------------------
DROP TABLE IF EXISTS `category_products`;
CREATE TABLE `category_products` (
  `cat_id` int(10) unsigned DEFAULT NULL,
  `cat_sub_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category_products
-- ----------------------------
BEGIN;
INSERT INTO `category_products` VALUES (1, 1, 1000);
INSERT INTO `category_products` VALUES (1, 1, 1001);
INSERT INTO `category_products` VALUES (1, 2, 1004);
INSERT INTO `category_products` VALUES (1, 2, 1005);
INSERT INTO `category_products` VALUES (1, 3, 1002);
INSERT INTO `category_products` VALUES (1, 4, 1003);
INSERT INTO `category_products` VALUES (2, 1, 3002);
INSERT INTO `category_products` VALUES (2, 2, 3000);
INSERT INTO `category_products` VALUES (2, 2, 3001);
INSERT INTO `category_products` VALUES (2, 3, 3003);
INSERT INTO `category_products` VALUES (2, 4, 3004);
INSERT INTO `category_products` VALUES (2, 5, 3006);
INSERT INTO `category_products` VALUES (2, 6, 3007);
INSERT INTO `category_products` VALUES (2, 7, 3005);
INSERT INTO `category_products` VALUES (3, 1, 4003);
INSERT INTO `category_products` VALUES (3, 1, 4004);
INSERT INTO `category_products` VALUES (3, 2, 4000);
INSERT INTO `category_products` VALUES (3, 2, 4001);
INSERT INTO `category_products` VALUES (3, 2, 4002);
INSERT INTO `category_products` VALUES (3, 3, 4005);
INSERT INTO `category_products` VALUES (4, 1, 2002);
INSERT INTO `category_products` VALUES (4, 2, 2000);
INSERT INTO `category_products` VALUES (4, 2, 2001);
INSERT INTO `category_products` VALUES (4, 3, 2005);
INSERT INTO `category_products` VALUES (4, 4, 2003);
INSERT INTO `category_products` VALUES (4, 4, 2004);
INSERT INTO `category_products` VALUES (4, 5, 2006);
INSERT INTO `category_products` VALUES (5, 1, 5002);
INSERT INTO `category_products` VALUES (5, 2, 5003);
INSERT INTO `category_products` VALUES (5, 3, 5000);
INSERT INTO `category_products` VALUES (5, 3, 5001);
INSERT INTO `category_products` VALUES (5, 4, 5004);
COMMIT;

-- ----------------------------
-- Table structure for purchase
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `pur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pur_name` varchar(50) DEFAULT NULL,
  `pur_add` varchar(50) DEFAULT NULL,
  `pur_sub` varchar(50) DEFAULT NULL,
  `pur_ste` varchar(50) DEFAULT NULL,
  `pur_ctr` varchar(50) DEFAULT NULL,
  `pur_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY(pur_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

