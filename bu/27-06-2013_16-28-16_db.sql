DROP TABLE uoc_activity;

CREATE TABLE `uoc_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `desc` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO uoc_activity VALUES("1","Login","You logged in as : OLFUadmin","2013-06-27 23:56:26","1");
INSERT INTO uoc_activity VALUES("2","Courses","You created the course Theory of Relativity","2013-06-27 23:59:16","1");
INSERT INTO uoc_activity VALUES("3","Registration","Account has been created.","2013-06-28 00:00:50","14");
INSERT INTO uoc_activity VALUES("4","Event","You created an event, entitled General Assembly that will happen on 2013-06-30","2013-06-28 00:03:11","1");
INSERT INTO uoc_activity VALUES("5","Announcements","You created an announcement entitled : Preliminary Examinations","2013-06-28 00:09:14","1");
INSERT INTO uoc_activity VALUES("6","Learning","New lesson:Albert Einstein and the Theory of Relativity has been viewed","2013-06-28 00:12:55","1");
INSERT INTO uoc_activity VALUES("7","Learning","New assignment:Assignment # 1 has been viewed","2013-06-28 00:15:57","1");
INSERT INTO uoc_activity VALUES("8","Registration","Account has been created.","2013-06-28 00:19:49","15");
INSERT INTO uoc_activity VALUES("9","Login","You logged in as : johndalecross","2013-06-28 00:20:03","15");
INSERT INTO uoc_activity VALUES("10","Courses","You enrolled to the course : Theory of Relativity","2013-06-28 00:20:12","15");
INSERT INTO uoc_activity VALUES("11","Login","You logged in as : albert.einstein","2013-06-28 00:23:10","14");
INSERT INTO uoc_activity VALUES("12","Login","You logged in as : johndalecross","2013-06-28 00:26:00","15");
INSERT INTO uoc_activity VALUES("13","Quiz","You answered a quiz entitled Quiz # 1 with a score of 100%","2013-06-28 00:26:36","15");
INSERT INTO uoc_activity VALUES("14","Login","You logged in as : OLFUadmin","2013-06-28 00:28:02","1");



DROP TABLE uoc_announcements;

CREATE TABLE `uoc_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `atitle` text NOT NULL,
  `adesc` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_announcements VALUES("1","1","Preliminary Examinations","Please prepare for the upcoming pretest, scheduled date is still tentative. Wait for further announcements.","2013-06-28 00:09:14","1");



DROP TABLE uoc_assignments;

CREATE TABLE `uoc_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asTitle` text NOT NULL,
  `asDesc` text NOT NULL,
  `asEndDate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `asCdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_assignments VALUES("1","Assignment # 1","Answer the Following Questions. Submit before due.","2013-06-27","1","2013-06-28 00:15:53");



DROP TABLE uoc_assignsubmissions;

CREATE TABLE `uoc_assignsubmissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `assid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE uoc_assignuploads;

CREATE TABLE `uoc_assignuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `filename` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_assignuploads VALUES("1","1","1","Physics 12.docx");



DROP TABLE uoc_bu;

CREATE TABLE `uoc_bu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `desc` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE uoc_courses;

CREATE TABLE `uoc_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctitle` text NOT NULL,
  `ccode` varchar(8) NOT NULL,
  `cvis` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passkey` varchar(8) NOT NULL,
  `ccreator` int(11) NOT NULL,
  `cdesc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_courses VALUES("1","Theory of Relativity","PHY101","0","2013-06-27 23:59:16","NONE","14","The study of the physical theory of measurement in an inertial frame of reference");



DROP TABLE uoc_enrollment;

CREATE TABLE `uoc_enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `enrolldate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_enrollment VALUES("1","1","15","2013-06-28 00:20:12");



DROP TABLE uoc_events;

CREATE TABLE `uoc_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `etitle` text NOT NULL,
  `edesc` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edate` date NOT NULL,
  `ecreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_events VALUES("1","1","General Assembly","To all Freshmen, Please gather on the gymnasium. 3pm on the specified date. ","2013-06-28 00:03:11","2013-06-30","1");



DROP TABLE uoc_feedbacks;

CREATE TABLE `uoc_feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE uoc_gchat;

CREATE TABLE `uoc_gchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO uoc_gchat VALUES("1","1","OLFUadmin","Welcome Students. Have a good day!","2013-06-28 00:18:25");
INSERT INTO uoc_gchat VALUES("2","1","johndalecross","Goodmorning Sir!","2013-06-28 00:21:28");



DROP TABLE uoc_learned;

CREATE TABLE `uoc_learned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE uoc_learning;

CREATE TABLE `uoc_learning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `type` text NOT NULL,
  `lname` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO uoc_learning VALUES("1","1","lesson","Albert Einstein and the Theory of Relativity","2013-06-28 00:12:51");
INSERT INTO uoc_learning VALUES("2","1","assignment","Assignment # 1","2013-06-28 00:15:53");



DROP TABLE uoc_lessons;

CREATE TABLE `uoc_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asTitle` text NOT NULL,
  `asDesc` text NOT NULL,
  `asEndDate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `asCdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_lessons VALUES("1","Albert Einstein and the Theory of Relativity","Source : http://csep10.phys.utk.edu/astr161/lect/history/einstein.html","2013-06-27","1","2013-06-28 00:12:51","");



DROP TABLE uoc_lessonuploads;

CREATE TABLE `uoc_lessonuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `filename` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_lessonuploads VALUES("1","1","1","two_gravity.doc");



DROP TABLE uoc_members;

CREATE TABLE `uoc_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `eml` varchar(36) NOT NULL,
  `uname` varchar(36) NOT NULL,
  `pass` varchar(36) NOT NULL,
  `jdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utype` int(1) NOT NULL,
  `regid` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO uoc_members VALUES("1","OLFU","Administrator","olfuadmin@yahoo.com","OLFUadmin","password","2013-06-24 22:10:02","1","admin");
INSERT INTO uoc_members VALUES("14","Albert","Einstein","ae@yahoo.com","albert.einstein","1234","2013-06-28 00:00:50","2","1879-1000001");
INSERT INTO uoc_members VALUES("15","John","Dale Cross","jdc@yahoo.com","johndalecross","0001","2013-06-28 00:19:49","0","2013-0000001");



DROP TABLE uoc_messages;

CREATE TABLE `uoc_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE uoc_qqoptions;

CREATE TABLE `uoc_qqoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `qqid` int(11) NOT NULL,
  `text` text NOT NULL,
  `tof` text NOT NULL,
  `qqonum` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO uoc_qqoptions VALUES("1","1","1","accurate","1","2","1");
INSERT INTO uoc_qqoptions VALUES("2","1","1","ticking slowly","0","1","1");
INSERT INTO uoc_qqoptions VALUES("3","2","1","You can succeed by making very precise time measurements.","0","1","1");
INSERT INTO uoc_qqoptions VALUES("4","2","1","You can succeed by making very precise mass measurements","0","2","1");
INSERT INTO uoc_qqoptions VALUES("5","2","1","You can succeed by making very precise length and time measurements.","0","3","1");
INSERT INTO uoc_qqoptions VALUES("6","2","1","You cannot succeed no matter what you do.","1","4","1");



DROP TABLE uoc_quizquestions;

CREATE TABLE `uoc_quizquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `text` text NOT NULL,
  `qnum` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO uoc_quizquestions VALUES("1","1","A clock, designed to tick each second, is moving past you at a uniform speed. You find the moving clock to be

","1","1");
INSERT INTO uoc_quizquestions VALUES("2","2","You are in a windowless spacecraft. You need to determine whether your spaceship is moving at constant nonzero velocity, or is at rest, in an inertial frame of Earth.","1","1");



DROP TABLE uoc_quizresults;

CREATE TABLE `uoc_quizresults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `score` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO uoc_quizresults VALUES("1","15","1","2","2013-06-28 00:26:35","100%");



DROP TABLE uoc_quizzes;

CREATE TABLE `uoc_quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qTitle` text NOT NULL,
  `qDate` date NOT NULL,
  `qTs` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO uoc_quizzes VALUES("1","Quiz # 1","2013-06-27","2013-06-28 00:18:01","1","1");
INSERT INTO uoc_quizzes VALUES("2","Quiz # 1","2013-06-27","2013-06-28 00:25:33","1","2");



DROP TABLE uoc_studentid;

CREATE TABLE `uoc_studentid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

INSERT INTO uoc_studentid VALUES("1","2013-0000001","REGULAR");
INSERT INTO uoc_studentid VALUES("2","2013-0000002","REGULAR");
INSERT INTO uoc_studentid VALUES("3","2013-0000003","REGULAR");
INSERT INTO uoc_studentid VALUES("4","2013-0000004","REGULAR");
INSERT INTO uoc_studentid VALUES("5","2013-0000005","REGULAR");
INSERT INTO uoc_studentid VALUES("6","2013-0000006","REGULAR");
INSERT INTO uoc_studentid VALUES("7","2013-0000007","REGULAR");
INSERT INTO uoc_studentid VALUES("8","2013-0000008","REGULAR");
INSERT INTO uoc_studentid VALUES("9","2013-0000009","REGULAR");
INSERT INTO uoc_studentid VALUES("10","2013-0000010","REGULAR");
INSERT INTO uoc_studentid VALUES("11","2013-0000011","REGULAR");
INSERT INTO uoc_studentid VALUES("12","2013-0000012","REGULAR");
INSERT INTO uoc_studentid VALUES("13","2013-0000013","REGULAR");
INSERT INTO uoc_studentid VALUES("14","2013-0000014","REGULAR");
INSERT INTO uoc_studentid VALUES("15","2013-0000015","REGULAR");
INSERT INTO uoc_studentid VALUES("16","2013-0000016","REGULAR");
INSERT INTO uoc_studentid VALUES("17","2013-0000017","REGULAR");
INSERT INTO uoc_studentid VALUES("18","2013-0000018","REGULAR");
INSERT INTO uoc_studentid VALUES("19","2013-0000019","REGULAR");
INSERT INTO uoc_studentid VALUES("20","2013-0000020","REGULAR");
INSERT INTO uoc_studentid VALUES("21","2013-0000021","REGULAR");
INSERT INTO uoc_studentid VALUES("22","2013-0000022","REGULAR");
INSERT INTO uoc_studentid VALUES("23","2013-0000023","REGULAR");
INSERT INTO uoc_studentid VALUES("24","2013-0000024","REGULAR");
INSERT INTO uoc_studentid VALUES("25","2013-0000025","REGULAR");
INSERT INTO uoc_studentid VALUES("26","2013-0000026","REGULAR");
INSERT INTO uoc_studentid VALUES("27","2013-0000027","REGULAR");
INSERT INTO uoc_studentid VALUES("28","2013-0000028","REGULAR");
INSERT INTO uoc_studentid VALUES("29","2013-0000029","REGULAR");
INSERT INTO uoc_studentid VALUES("30","2013-0000030","REGULAR");
INSERT INTO uoc_studentid VALUES("31","2013-0000031","REGULAR");
INSERT INTO uoc_studentid VALUES("32","2013-0000032","REGULAR");
INSERT INTO uoc_studentid VALUES("33","2013-0000033","REGULAR");
INSERT INTO uoc_studentid VALUES("34","2013-0000034","REGULAR");
INSERT INTO uoc_studentid VALUES("35","2013-0000035","REGULAR");
INSERT INTO uoc_studentid VALUES("36","2013-0000036","REGULAR");
INSERT INTO uoc_studentid VALUES("37","2013-0000037","REGULAR");
INSERT INTO uoc_studentid VALUES("38","2013-0000038","REGULAR");
INSERT INTO uoc_studentid VALUES("39","2013-0000039","REGULAR");
INSERT INTO uoc_studentid VALUES("40","2013-0000040","REGULAR");
INSERT INTO uoc_studentid VALUES("41","2013-0000041","REGULAR");
INSERT INTO uoc_studentid VALUES("42","2013-0000042","REGULAR");
INSERT INTO uoc_studentid VALUES("43","2013-0000043","REGULAR");
INSERT INTO uoc_studentid VALUES("44","2013-0000044","REGULAR");
INSERT INTO uoc_studentid VALUES("45","2013-0000045","REGULAR");
INSERT INTO uoc_studentid VALUES("46","2013-0000046","REGULAR");
INSERT INTO uoc_studentid VALUES("47","2013-0000047","REGULAR");
INSERT INTO uoc_studentid VALUES("48","2013-0000048","REGULAR");
INSERT INTO uoc_studentid VALUES("49","2013-0000049","REGULAR");
INSERT INTO uoc_studentid VALUES("50","2013-0000050","REGULAR");
INSERT INTO uoc_studentid VALUES("51","2013-0000051","REGULAR");
INSERT INTO uoc_studentid VALUES("52","2013-0000052","REGULAR");
INSERT INTO uoc_studentid VALUES("53","2013-0000053","REGULAR");
INSERT INTO uoc_studentid VALUES("54","2013-0000054","REGULAR");
INSERT INTO uoc_studentid VALUES("55","2013-0000055","REGULAR");
INSERT INTO uoc_studentid VALUES("56","2013-0000056","REGULAR");
INSERT INTO uoc_studentid VALUES("57","2013-0000057","REGULAR");
INSERT INTO uoc_studentid VALUES("58","2013-0000058","REGULAR");
INSERT INTO uoc_studentid VALUES("59","2013-0000059","REGULAR");
INSERT INTO uoc_studentid VALUES("60","2013-0000060","REGULAR");
INSERT INTO uoc_studentid VALUES("61","2013-0000061","REGULAR");
INSERT INTO uoc_studentid VALUES("62","2013-0000062","REGULAR");
INSERT INTO uoc_studentid VALUES("63","2013-0000063","REGULAR");
INSERT INTO uoc_studentid VALUES("64","2013-0000064","REGULAR");
INSERT INTO uoc_studentid VALUES("65","2013-0000065","REGULAR");
INSERT INTO uoc_studentid VALUES("66","2013-0000066","REGULAR");
INSERT INTO uoc_studentid VALUES("67","2013-0000067","REGULAR");
INSERT INTO uoc_studentid VALUES("68","2013-0000068","REGULAR");
INSERT INTO uoc_studentid VALUES("69","2013-0000069","REGULAR");
INSERT INTO uoc_studentid VALUES("70","2013-0000070","REGULAR");
INSERT INTO uoc_studentid VALUES("71","2013-0000071","REGULAR");
INSERT INTO uoc_studentid VALUES("72","2013-0000072","REGULAR");
INSERT INTO uoc_studentid VALUES("73","2013-0000073","REGULAR");
INSERT INTO uoc_studentid VALUES("74","2013-0000074","REGULAR");
INSERT INTO uoc_studentid VALUES("75","2013-0000075","REGULAR");
INSERT INTO uoc_studentid VALUES("76","2013-0000076","REGULAR");
INSERT INTO uoc_studentid VALUES("77","2013-0000077","REGULAR");
INSERT INTO uoc_studentid VALUES("78","2013-0000078","REGULAR");
INSERT INTO uoc_studentid VALUES("79","2013-0000079","REGULAR");
INSERT INTO uoc_studentid VALUES("80","2013-0000080","REGULAR");
INSERT INTO uoc_studentid VALUES("81","2013-0000081","REGULAR");
INSERT INTO uoc_studentid VALUES("82","2013-0000082","REGULAR");
INSERT INTO uoc_studentid VALUES("83","2013-0000083","REGULAR");
INSERT INTO uoc_studentid VALUES("84","2013-0000084","REGULAR");
INSERT INTO uoc_studentid VALUES("85","2013-0000085","REGULAR");
INSERT INTO uoc_studentid VALUES("86","2013-0000086","REGULAR");
INSERT INTO uoc_studentid VALUES("87","2013-0000087","REGULAR");
INSERT INTO uoc_studentid VALUES("88","2013-0000088","REGULAR");
INSERT INTO uoc_studentid VALUES("89","2013-0000089","REGULAR");
INSERT INTO uoc_studentid VALUES("90","2013-0000090","REGULAR");
INSERT INTO uoc_studentid VALUES("91","2013-0000091","REGULAR");
INSERT INTO uoc_studentid VALUES("92","2013-0000092","REGULAR");
INSERT INTO uoc_studentid VALUES("93","2013-0000093","REGULAR");
INSERT INTO uoc_studentid VALUES("94","2013-0000094","REGULAR");
INSERT INTO uoc_studentid VALUES("95","2013-0000095","REGULAR");
INSERT INTO uoc_studentid VALUES("96","2013-0000096","REGULAR");
INSERT INTO uoc_studentid VALUES("97","2013-0000097","REGULAR");
INSERT INTO uoc_studentid VALUES("98","2013-0000098","REGULAR");
INSERT INTO uoc_studentid VALUES("99","2013-0000099","REGULAR");
INSERT INTO uoc_studentid VALUES("100","2013-0000100","REGULAR");



DROP TABLE uoc_welcome;

CREATE TABLE `uoc_welcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




