-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 30 2012 г., 13:35
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `elib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `avtor` varchar(50) NOT NULL DEFAULT '',
  `nazv` varchar(50) NOT NULL DEFAULT '',
  `izd` varchar(50) NOT NULL DEFAULT '',
  `god_izd` varchar(50) NOT NULL DEFAULT '',
  `mesto_izd` varchar(50) NOT NULL DEFAULT '',
  `ob` varchar(50) NOT NULL DEFAULT '',
  `sobst` varchar(50) NOT NULL DEFAULT '',
  `udk` varchar(50) NOT NULL DEFAULT '',
  `bbk` varchar(50) NOT NULL DEFAULT '',
  `grif` varchar(50) NOT NULL DEFAULT '',
  `stat` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `referat` longtext NOT NULL,
  `text` longtext NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `total_votes` int(5) NOT NULL,
  `total_value` int(5) NOT NULL,
  `used_ips` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=69 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `avtor`, `nazv`, `izd`, `god_izd`, `mesto_izd`, `ob`, `sobst`, `udk`, `bbk`, `grif`, `stat`, `keywords`, `referat`, `text`, `link`, `total_votes`, `total_value`, `used_ips`) VALUES
(38, 'Глуховский Дмитрий Алексеевич', 'Метро 2033', 'Популярная литература', '2007', 'Москва', '123 стр.', 'Глуховский Дмитрий Алексеевич', '978-5-903396-03-0', '978-5-903396-03-0', '978-5-903396-03-0', '---', '', '2033 год. Весь мир лежит в руинах. Человечество почти полностью уничтожено. Москва превратилась в город-призрак, отравленный радиацией и населенный чудовищами. Немногие выжившие люди прячутся в московском метро — самом большом противоатомном бомбоубежище ', '2033 год. Весь мир лежит в руинах. Человечество почти полностью уничтожено. Москва превратилась в город-призрак, отравленный радиацией и населенный чудовищами. Немногие выжившие люди прячутся в московском метро — самом большом \r\nпротивоатомном бомбоубежище на земле. Его станции превратились в города-государства, а в туннелях царит тьма и обитает ужас. Артему, жителю ВДНХ, предстоит пройти через все метро, чтобы спасти от страшной опасности свою станцию,\r\n а может быть и все человечество.', '', 0, 0, ''),
(37, 'Ховард Линда', 'Ложь во спасение', 'White Lies by Linda Howard', '1988', '-', '50 стр.', 'Ховард Линда', '-', '-', '-', '-', 'Ховард Линда, Ложь во спасение', 'Джей Гренджер только что уволили с престижной должности в солидном банке. В ее квартире в Нью-Йорке появляются агенты ФБР, сообщая', 'Джей Гренджер только что уволили с престижной должности в солидном банке. В ее квартире в Нью-Йорке появляются агенты ФБР, сообщая, что ее бывший муж, Стив Кроссфилд, возможно, серьезно ранен во время взрыва. \r\nОни просят ее поехать с ними, чтобы опознать мужчину, находящегося под охраной в военно-морском госпитале. Джей соглашается, но мужчина забинтован с головы до ног, она не может быть полностью уверена, что это ее \r\nмуж. И все же ей кажется, что мужчина узнает ее голос, и когда врачи просят ее остаться ухаживать за раненым, она соглашается.\r\n\r\nКогда Стив выходит из комы, выясняется, что он потерял память. А когда врачи убирают бинты с его глаз, Джей понимает, что все еще больше усложнилось… Но она приехала, чтобы заботиться об этом человеке и знает, что\r\nего жизни угрожает опасность. Джей не в силах сопротивляться своим чувствам к этому мужчине, который так беззащитен. А он все еще не помнит, кто он, и кто его враги, которые охотятся на него…', 'namba.kg/tedsgfsdg', 0, 0, ''),
(49, 'Бек Кент', 'Экстремальное программирование', 'Питер', '2010', 'Санкт - Питербург', '51 стр.', 'Бек Кент', '-', '-', '-', '-', 'Бек Кент, Экстремальное программирование, 2010', 'Эта книга об экстремальном программировании. Экстремальное программирование, часто обозначаемое аббревиатурой «XP» – это упрощенная методика организации производства для небольших и средних по размеру \r\nкоманд разработчиков, занимающихся разработкой прогр', 'Эта книга об экстремальном программировании. Экстремальное программирование, часто обозначаемое аббревиатурой «XP» – это упрощенная методика организации производства для небольших и средних по размеру \r\nкоманд разработчиков, занимающихся разработкой программного продукта в условиях неясных или быстро меняющихся требований. Данная книга предназначена для того, чтобы помочь вам определить, оправдано \r\nли применение XP в вашей ситуации...', 'bek-kent.ru/books', 0, 0, ''),
(55, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '', '', '', '', 0, 0, ''),
(56, 'Грот Я. К.', 'Русское правописание', 'Типография Императорской Академии', '1894', 'Россия', '164 стр.', '-', '-', '-', '-', '-', '', 'Многие из нас хотят знать правописание русского языка в оригинале, а не урезанную Луначарским в 1918 бета-версию. Много веков подряд наш русский язык переделывали, урезали, добавляли. А автор сей книги привёл к единообразию русское правописание, собрав во', 'Многие из нас хотят знать правописание русского языка в оригинале, а не урезанную Луначарским в 1918 бета-версию. Много веков подряд наш русский язык переделывали, урезали, добавляли. А автор сей книги привёл к единообразию русское правописание, собрав во', 'http://depositfiles.com/files/qiay5t80p', 0, 0, ''),
(58, 'Авторы: *', 'Название: *', 'Издание:', '2012', 'Место издания:', 'Обьем:', 'Собственник:', 'УДК:', 'ББК:', 'ГРИФ:', 'Статус:', 'cqwscwc', 'scscscsc', 'scscscscscscs', 'http://namba.kg/#!/download/blabljhgbjk', 0, 0, ''),
(62, 'Вася', 'Пупкин', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0, 0, ''),
(63, 'Вася Пупкин', 'О Васе Пупкине', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0, 0, ''),
(64, 'Неизвестен', 'Неизвестно', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `group_id` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=28 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
