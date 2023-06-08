

CREATE TABLE `authenticate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dgn` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

INSERT INTO authenticate VALUES("1","0255","98806e75519d8c3c39e19a0c81905c0a","Rajasekhar A","Manager IT","1","1","0");
INSERT INTO authenticate VALUES("2","Admin","fb09653d37c658bffdd5921620a8fbbd","Rajasekhar A","CTO","1","1","0");
INSERT INTO authenticate VALUES("3","R0255","81dc9bdb52d04dc20036dbd8313ed055","RAJASEKHAR A","MANAGER IT","1","1","0");
INSERT INTO authenticate VALUES("88","T0016","81dc9bdb52d04dc20036dbd8313ed055","RAJESH M","UI DEV","4","1","1");
INSERT INTO authenticate VALUES("89","T0017","81dc9bdb52d04dc20036dbd8313ed055","RAJESH M","EMP 2","5","1","1");



CREATE TABLE `kit_approved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kit_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90421 DEFAULT CHARSET=utf8mb4;

INSERT INTO kit_approved VALUES("1","1","2021-02-15 05:37:09");
INSERT INTO kit_approved VALUES("90419","101496","2023-06-05 17:21:43");
INSERT INTO kit_approved VALUES("90420","101498","2023-06-05 20:38:13");



CREATE TABLE `m_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

INSERT INTO m_status VALUES("1","25","2021-02-15 06:47:12");
INSERT INTO m_status VALUES("2","50","2021-04-24 14:06:47");
INSERT INTO m_status VALUES("45","52","2023-06-06 10:15:24");
INSERT INTO m_status VALUES("46","76","2023-06-06 10:15:50");
INSERT INTO m_status VALUES("47","75","2023-06-06 10:16:01");



CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

INSERT INTO messages VALUES("1","R0003","Hello Testing","1","2021-02-24 12:35:43");
INSERT INTO messages VALUES("2","R0030","PLS CHANGE GENDER TO MALE FOR THIS PATIENT BELOW
NAME : PHOON KAI XIONG
IC NO : 921027145485","1","2021-04-23 05:28:43");
INSERT INTO messages VALUES("52","T0016","test 123","#","2023-06-06 10:15:24");
INSERT INTO messages VALUES("53","T0016","testing","","2023-06-03 12:07:03");
INSERT INTO messages VALUES("54","T0016","Hello World","","2023-06-03 14:58:57");
INSERT INTO messages VALUES("55","T0017","asdf","","2023-06-05 12:43:35");
INSERT INTO messages VALUES("56","T0017","asdf","","2023-06-05 12:43:57");
INSERT INTO messages VALUES("57","T0017","asdf","","2023-06-05 12:45:10");
INSERT INTO messages VALUES("58","T0017","asdf","","2023-06-05 12:47:56");
INSERT INTO messages VALUES("59","T0017","asdf","","2023-06-05 12:47:59");
INSERT INTO messages VALUES("60","T0017","asdf","","2023-06-05 13:04:24");
INSERT INTO messages VALUES("61","T0017","asdf","","2023-06-05 13:05:58");
INSERT INTO messages VALUES("62","T0017","asdf","","2023-06-05 13:06:34");
INSERT INTO messages VALUES("63","T0017","asdf","","2023-06-05 13:07:17");
INSERT INTO messages VALUES("64","T0017","asdf","","2023-06-05 13:14:07");
INSERT INTO messages VALUES("65","T0017","asdf","","2023-06-05 13:16:45");
INSERT INTO messages VALUES("66","T0017","asdf","","2023-06-05 13:16:57");
INSERT INTO messages VALUES("67","T0017","asdf","","2023-06-05 13:17:18");
INSERT INTO messages VALUES("68","T0017","asdf","","2023-06-05 13:20:17");
INSERT INTO messages VALUES("69","T0017","asdf","","2023-06-05 13:20:48");
INSERT INTO messages VALUES("70","T0017","asdf","","2023-06-05 13:22:00");
INSERT INTO messages VALUES("71","T0017","asdf","","2023-06-05 13:22:29");
INSERT INTO messages VALUES("72","T0017","asdf","","2023-06-05 13:22:51");
INSERT INTO messages VALUES("73","T0017","testing","","2023-06-05 13:23:26");
INSERT INTO messages VALUES("74","T0017","asdf","","2023-06-05 17:16:10");
INSERT INTO messages VALUES("75","T0017","asdf","1","2023-06-06 10:16:01");
INSERT INTO messages VALUES("76","T0017","asdf","1","2023-06-06 10:15:50");
INSERT INTO messages VALUES("77","T0017","Tesitng how this is working in large lines welcome to employee dashboard","","2023-06-06 09:23:20");



CREATE TABLE `panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `process_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO panel VALUES("1","CASH","CASH","CASH","+601111280599","1","1");
INSERT INTO panel VALUES("2","ONLINE","ONLINE","ONLINE","+601111280599","2","2");
INSERT INTO panel VALUES("3","DEBIT / CREDIT","DEBIT/CREDIT","DEBIT/CREDIT","+601111280599","3","3");
INSERT INTO panel VALUES("4","PERODUA","KOTA","KOTA","+601111280599","4","4");
INSERT INTO panel VALUES("5","TERMIC","THERMIK TECHNOLOGIES SDN BHD","Lot 63, Jalan Kenanga 8A, 
Bukit Beruntung Industrial Park, Bandar Bukit Beruntung, 48300 Rawang, Selangor.","+601111280599","5","4");
INSERT INTO panel VALUES("6","SCIENTEX","SCIENTEX GREAT WALL SDN BHD","BLOCK B-1, C-1, D, LOT 1608
RAWANG INTIGRATED INDUSTRIAL PARK
JALAN RAWANG BATANG BERJUNTAI
48000 RAWANG S.D.E","03 6092 3333","40","4");



CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `icno` varchar(100) NOT NULL,
  `validation` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `t_location` varchar(100) NOT NULL,
  `rm_online` varchar(100) NOT NULL,
  `rm_cash` varchar(100) NOT NULL,
  `p_mode` varchar(100) NOT NULL,
  `p_id` varchar(100) NOT NULL,
  `p_ref` varchar(100) NOT NULL,
  `reg_date` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sys_date` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101499 DEFAULT CHARSET=utf8mb4;

INSERT INTO patient VALUES("1","SRI RAGHAVENTHAR A/L KUNASEGARAN","","Male","1991-10-21","911021145661","Z47PSH","0","","","","","Selangor","2","Walk-Thru","RM50.00","0","1","1","RTK","2023-06-01","","1","2023-06-01","2023-06-01 00:48:45");
INSERT INTO patient VALUES("101496","Rajesh","Muntha","Male","2000-01-01","123456","PX1GVE","09676767187","muntharajesh6@gmail.com","Dr.No: 18-5-9, Gorrevenkata Appaiah street, Salipet, Tenali.","","522201","Selangor","1","Walk-Thru","0","0","1","1","test","2023-06-07","T0016","1","2023-06-01","2023-06-05 17:21:43");
INSERT INTO patient VALUES("101497","Obama ","America","Male","2012-06-11","112233","264FS1","9876543211","asdf@gmail.com","United States","America","520002","Sabah","3","ADLS-Walk-Thru","RM420","RM420","1","1","Test0123","","T0016","0","2023-06-03","2023-06-03 17:16:55");
INSERT INTO patient VALUES("101498","Tadikonda","","Male","1998-05-23","1234567","MTVZYE","9876543211","asdf@gmail.com","Lorem Ipsum","Lorem Ipsum2","522233","Perak","7","AG-Walk-Thru","RM420","RM420","1","1","147852","2023-06-06","T0016","1","2023-06-05","2023-06-05 20:38:13");



CREATE TABLE `pay_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(100) NOT NULL,
  `id_mode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO pay_mode VALUES("1","CASH","1");
INSERT INTO pay_mode VALUES("2","ONLINE","2");
INSERT INTO pay_mode VALUES("3","DEBIT / CREDIT","3");
INSERT INTO pay_mode VALUES("4","PANEL","4");
INSERT INTO pay_mode VALUES("5","CHEQUE","5");



CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` varchar(100) NOT NULL,
  `icno` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `r_case` varchar(100) NOT NULL,
  `validation` varchar(100) NOT NULL,
  `e_gene` varchar(100) NOT NULL,
  `rdrp` varchar(100) NOT NULL,
  `ngene` varchar(100) NOT NULL,
  `ct_value` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101102 DEFAULT CHARSET=utf8mb4;

INSERT INTO results VALUES("1","1","911021145661","2","2","Z47PSH","0","0","0","0","DR0006","2023-06-01 00:59:10");



CREATE TABLE `test_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

INSERT INTO test_cost VALUES("1","4","1","200");
INSERT INTO test_cost VALUES("2","4","2","150");
INSERT INTO test_cost VALUES("3","4","3","130");
INSERT INTO test_cost VALUES("4","4","4","230");
INSERT INTO test_cost VALUES("5","5","1","200");
INSERT INTO test_cost VALUES("6","5","2","150");
INSERT INTO test_cost VALUES("7","5","3","120");
INSERT INTO test_cost VALUES("8","5","4","230");
INSERT INTO test_cost VALUES("9","6","1","200");
INSERT INTO test_cost VALUES("10","6","2","150");
INSERT INTO test_cost VALUES("11","6","3","115");
INSERT INTO test_cost VALUES("12","6","4","230");
INSERT INTO test_cost VALUES("13","7","1","200");
INSERT INTO test_cost VALUES("14","7","2","150");
INSERT INTO test_cost VALUES("15","7","3","125");
INSERT INTO test_cost VALUES("16","7","4","230");
INSERT INTO test_cost VALUES("17","8","1","200");
INSERT INTO test_cost VALUES("18","8","2","150");
INSERT INTO test_cost VALUES("19","8","3","140");
INSERT INTO test_cost VALUES("20","8","4","230");
INSERT INTO test_cost VALUES("21","9","1","200");
INSERT INTO test_cost VALUES("22","9","2","150");
INSERT INTO test_cost VALUES("23","9","3","132");
INSERT INTO test_cost VALUES("24","9","4","230");
INSERT INTO test_cost VALUES("25","10","1","200");
INSERT INTO test_cost VALUES("26","10","2","150");
INSERT INTO test_cost VALUES("27","10","3","100");
INSERT INTO test_cost VALUES("28","10","4","230");
INSERT INTO test_cost VALUES("29","11","1","200");
INSERT INTO test_cost VALUES("30","11","2","150");
INSERT INTO test_cost VALUES("31","11","3","100");
INSERT INTO test_cost VALUES("32","11","4","230");
INSERT INTO test_cost VALUES("33","12","1","200");
INSERT INTO test_cost VALUES("34","12","2","150");
INSERT INTO test_cost VALUES("35","12","3","100");
INSERT INTO test_cost VALUES("36","12","4","230");
INSERT INTO test_cost VALUES("37","13","1","200");
INSERT INTO test_cost VALUES("38","13","2","150");
INSERT INTO test_cost VALUES("39","13","3","100");
INSERT INTO test_cost VALUES("40","13","4","230");
INSERT INTO test_cost VALUES("41","14","1","200");
INSERT INTO test_cost VALUES("42","14","2","150");
INSERT INTO test_cost VALUES("43","14","3","100");
INSERT INTO test_cost VALUES("44","14","4","230");
INSERT INTO test_cost VALUES("45","15","1","200");
INSERT INTO test_cost VALUES("46","15","2","150");
INSERT INTO test_cost VALUES("47","15","3","100");
INSERT INTO test_cost VALUES("48","15","4","230");
INSERT INTO test_cost VALUES("49","16","1","200");
INSERT INTO test_cost VALUES("50","16","2","150");
INSERT INTO test_cost VALUES("51","16","3","100");
INSERT INTO test_cost VALUES("52","16","4","230");
INSERT INTO test_cost VALUES("53","17","1","200");
INSERT INTO test_cost VALUES("54","17","2","150");
INSERT INTO test_cost VALUES("55","17","3","100");
INSERT INTO test_cost VALUES("56","17","4","230");



CREATE TABLE `test_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO test_location VALUES("1","Walk-Thru","1");
INSERT INTO test_location VALUES("2","SC-Walk-Thru","2");
INSERT INTO test_location VALUES("3","KD-Walk-Thru","3");
INSERT INTO test_location VALUES("4","Onsite","4");
INSERT INTO test_location VALUES("5","RT-Walk-Thru","5");
INSERT INTO test_location VALUES("6","AG-Walk-Thru","6");
INSERT INTO test_location VALUES("7","CH-Walk-Thru","7");
INSERT INTO test_location VALUES("8","ADLS-Walk-Thru","8");



CREATE TABLE `test_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO test_type VALUES("1","rT-PCR","1");
INSERT INTO test_type VALUES("2","RTK-Antigen","1");
INSERT INTO test_type VALUES("3","RTK-Antigen(PERKESO)","1");
INSERT INTO test_type VALUES("4","Antibody IGM/IGG","1");
INSERT INTO test_type VALUES("5","Rapid PCR/Molecular","1");
INSERT INTO test_type VALUES("6","SALIVA PCR","1");
INSERT INTO test_type VALUES("7","INFLUENZA A & B","1");

