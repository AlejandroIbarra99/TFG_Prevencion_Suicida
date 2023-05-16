CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_spanish_ci NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `shown` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contact_phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contact_photo` mediumblob DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dailys`
--

CREATE TABLE `dailys` (
  `id` int(11) NOT NULL,
  `daily_entry` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `daily_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL,
  `hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `birthday` date NOT NULL,
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photos` mediumblob DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plans_definition` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `plans_done` tinyint(1) DEFAULT 0,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psychologists`
--

CREATE TABLE `psychologists` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` time NOT NULL,
  `patient_id` int(11) NOT NULL,
  `psychologist_registration_number` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientChat` (`patient_id`),
  ADD KEY `FK_PsychologistChat` (`psychologist_registration_number`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientZone` (`patient_id`);

--
-- Indices de la tabla `dailys`
--
ALTER TABLE `dailys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientDaily` (`patient_id`);

--
-- Indices de la tabla `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MessagePatient` (`patient_id`),
  ADD KEY `FK_MessagePsychologist` (`psychologist_registration_number`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_PATIENTPSYCHOLOGISTS` (`psychologist_registration_number`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientPhotos` (`patient_id`);

--
-- Indices de la tabla `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PatientPlans` (`patient_id`);

--
-- Indices de la tabla `psychologists`
--
ALTER TABLE `psychologists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number_2` (`registration_number`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `registration_number` (`registration_number`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`schedule_date`,`schedule_time`,`patient_id`,`psychologist_registration_number`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `schedule_ibfk_2` (`psychologist_registration_number`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dailys`
--
ALTER TABLE `dailys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `psychologists`
--
ALTER TABLE `psychologists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `FK_PatientChat` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `FK_PsychologistChat` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`);

--
-- Filtros para la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_PatientZone` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `dailys`
--
ALTER TABLE `dailys`
  ADD CONSTRAINT `FK_PatientDaily` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_MessagePatient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `FK_MessagePsychologist` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`);

--
-- Filtros para la tabla `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `FK_PATIENTPSYCHOLOGISTS` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`);

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_PatientPhoto` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `FK_PatientPlans` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`psychologist_registration_number`) REFERENCES `psychologists` (`registration_number`);

