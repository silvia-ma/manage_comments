CREATE TABLE `utenti` (
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `commenti` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `utente` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testo` text COLLATE utf8_unicode_ci,
  `punteggio` int(11) NOT NULL,
  `giudizio` int(11) DEFAULT NULL,
  PRIMARY KEY (id_com),
  FOREIGN KEY (`utente`) REFERENCES `utenti`(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1; 


CREATE TABLE `giudizi` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `utente` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_giudizi` int(1) UNSIGNED NOT NULL DEFAULT '0',
  FOREIGN KEY (`id_com`) REFERENCES `commenti`(`id_com`),
 FOREIGN KEY (`utente`) REFERENCES `utenti`(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1; 