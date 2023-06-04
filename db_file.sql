DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adm_username` varchar(20) NOT NULL, 
  `adm_password` varchar(32) NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_fname` varchar(50) NOT NULL,
  `adm_lname` varchar(50) NOT NULL,
  `adm_cnumber` int(20) NOT NULL,
  `adm_access` varchar(255) NOT NULL,
  `adm_status` int(1) NOT NULL,
  PRIMARY KEY  (`adm_username`)
);

INSERT INTO admin(adm_username,adm_password,adm_email,adm_fname,adm_lname,adm_cnumber,adm_access,adm_status) 
VALUES ("admin", "202cb962ac59075b964b07152d234b70", "admin@admin.com", "Admin", "Admin", 123, "Manager", 0
);

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cust_id` int(50) NOT NULL auto_increment, 
  `cust_fname` varchar(50) NOT NULL,
  `cust_mname` varchar(50) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_cnumber` int(20) NOT NULL,
  `cust_status` varchar(50) NOT NULL,
  PRIMARY KEY  (`cust_id`)
);

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(50) NOT NULL auto_increment, 
  `room_number` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `room_price` decimal(20,2) NOT NULL,
  `room_floor` varchar(10) NOT NULL,
  `room_vacancy` int(10) NOT NULL,
  `room_status` varchar(10) NOT NULL,
  PRIMARY KEY  (`room_id`)
);

DROP TABLE IF EXISTS `transaction_type`;
CREATE TABLE `transaction_type` (
  `type_id` int(10) NOT NULL auto_increment,
  `type_description` varchar(50),
  PRIMARY KEY (`type_id`)
);

  DROP TABLE IF EXISTS `rent`;
  CREATE TABLE `rent` (
  `rent_id` int(10) unsigned NOT NULL auto_increment, 
  `cust_id` int(10) NOT NULL default '0',
  `room_id` int(10) NOT NULL default '0',
  `type_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`rent_id`),
  KEY (`cust_id`),
  KEY (`room_id`),
  KEY (`type_id`),
  `date_added` date NOT NULL,
  `time_added` time NOT NULL
);
