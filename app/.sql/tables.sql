--
-- Struktura tabeli dla tabeli `deadlines`
--

CREATE TABLE IF NOT EXISTS `deadlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass_code` varchar(256) NOT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `quarter` varchar(100) DEFAULT NULL,
  `age` int(4) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `build_nr` varchar(30) DEFAULT NULL,
  `flat_nr` varchar(30) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `email` varchar(2048) DEFAULT NULL,
  `tel_number` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `special_text` mediumtext,
  `registred` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;