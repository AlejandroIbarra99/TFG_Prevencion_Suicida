CREATE TABLE `contacts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `contact_name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
 `contact_phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
 `contact_photo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
 `patient_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_PatientZone` (`patient_id`),
 CONSTRAINT `FK_PatientZone` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `dailys` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `daily_entry` text COLLATE utf8_spanish_ci DEFAULT NULL,
 `patient_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_PatientDaily` (`patient_id`),
 CONSTRAINT `FK_PatientDaily` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `messages` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `text` text COLLATE utf8_spanish_ci NOT NULL,
 `date` datetime NOT NULL,
 `patient_id` int(11) DEFAULT NULL,
 `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_MessagePatient` (`patient_id`),
 KEY `FK_MessagePsychologist` (`psychologist_registration_number`),
 CONSTRAINT `FK_MessagePatient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
 CONSTRAINT `FK_MessagePsychologist` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `patients` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
 `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
 `birthday` date NOT NULL,
 `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
 `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
 `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
 `Active` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `dni` (`dni`),
 UNIQUE KEY `email` (`email`),
 KEY `FK_PATIENTPSYCHOLOGISTS` (`psychologist_registration_number`),
 CONSTRAINT `FK_PATIENTPSYCHOLOGISTS` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `photos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `photos` text COLLATE utf8_spanish_ci DEFAULT NULL,
 `patient_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_PatientPhotos` (`patient_id`),
 CONSTRAINT `FK_PatientPhoto` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `plans` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `plans_definition` text COLLATE utf8_spanish_ci DEFAULT NULL,
 `plans_done` tinyint(1) DEFAULT 0,
 `patient_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_PatientPlans` (`patient_id`),
 CONSTRAINT `FK_PatientPlans` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci

CREATE TABLE `psychologists` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `registration_number` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
 `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
 `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
 `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `registration_number_2` (`registration_number`),
 UNIQUE KEY `dni` (`dni`),
 UNIQUE KEY `email` (`email`),
 KEY `registration_number` (`registration_number`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci