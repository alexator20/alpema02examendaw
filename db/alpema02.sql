CREATE TABLE `persona` (
  `edad` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  'estilo' varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `persona` (`edad`, `nombre`, 'estilo') VALUES (20, 'Alejandro Pérez', 'pop'), (18, 'Lucía Albir', 'regueton');
