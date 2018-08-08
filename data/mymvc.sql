-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Авг 06 2018 г., 15:40
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mymvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(13, 'Программирование', 1, 1),
(14, 'Бизнес', 2, 1),
(15, 'Психология', 3, 1),
(16, 'История', 4, 1),
(17, 'Спорт', 5, 1),
(19, 'Детские', 6, 1),
(20, 'Хобби', 7, 1),
(22, 'Детективы', 8, 1),
(23, 'Фантастика', 9, 1),
(24, 'Приключения', 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'Nulla condimentum fermentum imperdiet. Aliquam. ', '2018-05-11 21:00:00', 'Proin suscipit varius aliquet. Etiam quam quam, dapibus ut ornare ultrices, tincidunt rhoncus neque. Quisque vitae ullamcorper velit. Cras nec elit eros. Nunc non augue id ipsum iaculis tempus quis. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(2, 'Vivamus ac ex felis. Curabitur. ', '2018-05-11 21:00:00', 'Quisque eu congue metus, non laoreet est. Nam ut dolor sit amet lacus tempor tempor. Cras nunc leo, pharetra quis magna at, malesuada congue eros. Donec ultricies, risus et porttitor. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(3, 'Nulla a venenatis elit. Maecenas.', '2018-05-11 21:00:00', 'Quisque at consequat massa. Vivamus id neque fringilla, consequat purus et, imperdiet magna. Sed condimentum tempor tortor, in ornare leo. Sed ex dui, accumsan et augue eget, vestibulum tempor eros. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(4, 'Ut hendrerit libero ut dolor. ', '2018-05-11 21:00:00', 'Sed sed imperdiet velit. Morbi quis dictum dui, vitae iaculis eros. Praesent consectetur posuere nisl id sagittis. Nunc tristique volutpat ex ut imperdiet. Donec commodo lobortis rutrum. Suspendisse vestibulum sapien. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2018-05-11 21:00:00', 'Aenean sodales venenatis varius. Phasellus ultrices cursus ex, ac tempus nisi. Ut imperdiet est ut lectus porta eleifend. Pellentesque ex neque, fermentum nec tempus a, faucibus sit amet velit. Nam. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(6, 'Pellentesque consequat metus magna, ac. ', '2018-05-11 21:00:05', 'Cras faucibus quam arcu, vel mattis urna lobortis at. Ut sagittis ullamcorper eros, in accumsan ante convallis sit amet. Nulla scelerisque felis orci, sed gravida sapien tristique et. Cras augue. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(7, 'Vivamus vel nulla dictum, pharetra. ', '2018-05-11 21:00:00', 'Suspendisse vel orci id tortor maximus scelerisque in ac turpis. Maecenas augue massa, tristique eu maximus eu, fermentum interdum turpis. Nullam neque enim, dignissim vel diam id, blandit posuere nisl. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(8, 'Nam in ipsum suscipit, aliquam. ', '2018-05-11 21:00:00', 'Aliquam erat volutpat. Duis viverra sapien quis eleifend elementum. Donec ultricies scelerisque turpis. Duis tristique, justo nec laoreet laoreet, urna massa fringilla tellus, non tempor eros metus at libero. Fusce. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(9, 'Orci varius natoque penatibus et. ', '2018-05-11 21:00:00', 'Suspendisse est nisi, gravida eget sollicitudin vitae, pharetra condimentum nunc. Morbi sed aliquam ipsum. Praesent consectetur diam at purus sagittis, nec gravida augue venenatis. Ut mollis libero ut velit efficitur. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(10, 'In convallis id est a. ', '2018-03-11 22:00:00', 'Nunc vulputate tempor purus iaculis interdum. Pellentesque volutpat, turpis at ultricies cursus, lacus ante posuere arcu, non malesuada massa ante eu nibh. Nullam et enim a lorem vestibulum eleifend. Donec. ', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication');

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT '0',
  `status_text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `status_id`, `status_text`) VALUES
(1, 1, 'Новый'),
(2, 2, 'В обработке'),
(3, 3, 'Доставляется'),
(4, 4, 'Закрыт');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_thumb` varchar(255) NOT NULL,
  `availability` int(11) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `author`, `price`, `category_id`, `image`, `image_thumb`, `availability`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Чистый код: создание, анализ и рефакторинг', 'Даже плохой программный код может работать. Однако если код не является «чистым», это всегда будет мешать развитию проекта и компании-разработчика, отнимая значительные ресурсы на его поддержку и «укрощение».\r\n\r\nЭта книга посвящена хорошему программированию. Она полна реальных примеров кода. Мы будем рассматривать код с различных направлений: сверху вниз, снизу вверх и даже изнутри. Прочитав книгу, вы узнаете много нового о коде. Более того, вы научитесь отличать хороший код от плохого. Вы узнаете, как писать хороший код и как преобразовать плохой код в хороший.\r\n\r\nКнига состоит из трех частей. В первой части излагаются принципы, паттерны и приемы написания чистого кода; приводится большой объем примеров кода. Вторая часть состоит из практических сценариев нарастающей сложности. Каждый сценарий представляет собой упражнение по чистке кода или преобразованию проблемного кода в код с меньшим количеством проблем. Третья часть книги – концентрированное выражение ее сути. Она состоит из одной главы с перечнем эвристических правил и «запахов кода», собранных во время анализа. Эта часть представляет собой базу знаний, описывающую наш путь мышления в процессе чтения, написания и чистки кода.', 'Роберт Мартин', 6.05, 13, '', '', 1, 0, 0, 1),
(35, 'Continuous delivery. Практика непрерывных апдейтов', 'Эта книга поможет всем, кто собирается перейти на непрерывную поставку программного обеспечения. Руководители проектов ознакомятся с основными процессами, преимуществами и техническими требованиями. Разработчики, администраторы и архитекторы получат необходимые навыки организации работы, а также узнают, как непрерывная поставка внедряется в архитектуру программного обеспечения и структуру ИТ-организации.\r\n\r\nЭберхард Вольф познакомит вас с популярными передовыми технологиями, облегчающими труд разработчиков: Docker, Chef, Vagrant, Jenkins, Graphite, ELK stack, JBehave и Gatling. Вы пройдете через все этапы сборки, непрерывной интеграции, нагрузочного тестирования, развертывания и контроля.', 'Эберхард Вольф', 10.87, 13, '', '', 1, 1, 1, 1),
(36, 'JavaScript для детей. Самоучитель по программированию', 'Эта книга позволит вам погрузиться в программирование и с легкостью освоить JavaScipt. Вы напишете несколько настоящих игр – поиск сокровищ на карте, «Виселицу» и «Змейку». На каждом шаге вы сможете оценить результаты своих трудов – в виде работающей программы, а с понятными инструкциями, примерами и забавными иллюстрациями обучение будет только приятным. Книга для детей от 10 лет.', 'Ник Морган', 4.66, 13, '', '', 1, 0, 1, 1),
(37, 'Внутреннее устройство Linux', 'Книга, которую вы держите в руках, уже стала бестселлером на Западе. Она описывает все тонкости работы с операционной системой Linux, системное администрирование, глубокие механизмы, обеспечивающие низкоуровневый функционал Linux. На страницах этого издания вы приобретете базовые знания о работе с ядром Linux и о принципах правильной эксплуатации компьютерных сетей. В книге также затрагиваются вопросы программирования сценариев оболочки и обращения с языком С, освещаются темы защиты информации, виртуализации и прочие незаменимые вещи.', 'Брайан Уорд', 11.87, 13, '', '', 1, 0, 1, 1),
(38, 'Пользовательские истории. Искусство гибкой разработки ПО', 'Пользовательские истории – это метод описания требований к разрабатываемому продукту. В книге рассказано, как правильно использовать данную технику, чтобы сфокусироваться на поставленной задаче и пожеланиях клиента, а не распыляться на реализации второстепенных функций. Автор книги показывает, как данный подход не только ускоряет и систематизирует разработку, но и улучшает взаимопонимание в команде.', 'Джефф Паттон', 10.39, 13, '', '', 1, 0, 0, 1),
(39, 'Создание микросервисов', 'Книга посвящена программированию микросервисов – небольших автономных компонентов, позволяющих добиться модульности и отказоустойчивости любой программы. Теория микросервисов тесно связана с философией Unix, способствует улучшению архитектуры любых приложений, дает возможность избегать громоздкого и запутанного кода. Эта книга поможет читателю заново взглянуть на многие, казалось бы, трудноразрешимые проблемы, масштабировать любые проекты, ювелирно разрабатывать даже самые сложные системы.', 'Сэм Ньюмен', 5.49, 13, '', '', 1, 0, 0, 1),
(40, 'Изучаем программирование на Python', 'Надоело продираться через дебри малопонятных самоучителей по программированию? С этой книгой вы без груда усвоите азы Python и научитесь работать со структурами и функциями. В ходе обучения вы создадите свое собственное веб-приложение и узнаете, как управлять базами данных, обрабатывать исключения, пользоваться контекстными менеджерами, декораторами и генераторами. Все это и многое другое – во втором издании «Изучаем программирование на Python»', 'Пол Бэрри', 5.49, 13, '', '', 1, 0, 1, 1),
(41, 'Bootstrap в примерах', 'Данная книга содержит различные примеры и пошаговое описание создания различных веб-приложений с помощью клиентского фреймворка Bootstrap. Рассматривается сеточная система, основные компоненты Bootstrap, HTML-элементы и настройка компонентов для адаптивной разработки. Описывается создание мониторинговой панели веб-приложения с помощью продвинутых возможностей Bootstrap, включая настройку компонентов, обработку событий и расширенную интеграцию библиотек.', 'Сильвио Морето', 7.69, 13, '', '', 1, 1, 1, 1),
(42, 'Javascript и jQuery. Интерактивная веб-разработка', 'Эта книга – самый простой и интересный способ изучить JavaScript и jQuery. Независимо от стоящей перед вами задачи – спроектировать и разработать веб-сайт с нуля или получить больше контроля над уже существующим сайтом – эта книга поможет вам создать привлекательный, дружелюбный к пользователю веб-контент. Простой визуальный способ подачи информации с понятными примерами и небольшим фрагментом кода знакомит с новой темой на каждой странице. Вы найдете практические советы о том, как организовать и спроектировать страницы вашего сайта, и после прочтения книги сможете разработать свой веб-сайт профессионального вида и удобный в использовании.', 'Джон Дакетт', 6.87, 13, '', '', 1, 0, 0, 1),
(43, 'Теория и практика языков программирования', 'Учебник посвящен систематическому изложению теории и практики языков программирования. Он отражает классическое содержание учебной дисциплины по языкам программирования. Все сложные вопросы поясняются законченными примерами. Кроме того, здесь предлагается полный комплекс задач и упражнений по узловым вопросам. Учебник охватывает базисные разделы следующих дисциплин: теория формальных языков, теория автоматов и формальных языков, языки программирования, программирование, объектно-ориентированное программирование, логическое и функциональное программирование, теория вычислительных процессов.\r\n\r\nВ новом издании обсуждаются характеристики, а также последние тенденции развития универсальных языков программирования высокого уровня, таких как Scala, Go и Swift; поясняются главные особенности последних стандартов классических языков C++, Java и C#: лямбда-выражения во всех этих языках, cсылочный тип rvalue и семантика перемещения в языке C++ 11, ковариантность и контрвариантность родовых шаблонов в C#; существенно расширено представление скриптового языка Ruby, рассматриваются его блоки, механизмы единичного наследования и подмешивания, а также утиной типизации; добавлено описание аппарата событий и программирования на основе событий; показано применение стиля функционального программирования в скриптовых и объектно-ориентированных языках Python, Ruby, C#, Java, C++, Scala, Go и Swift.\r\n\r\nУчебник предназначен для студентов инженерного, бакалаврского и магистерского уровней компьютерных специальностей, может быть полезен преподавателям и исследователям/разработчикам трансляторов и другого программного обеспечения.\r\n\r\nРекомендовано Санкт-Петербургским институтом информатики и автоматизации Российской академии наук (СПИИРАН) в качестве учебника по направлению «Информатика и вычислительная техника».', 'С. А. Орлов', 20.36, 13, '', '', 1, 0, 0, 1),
(44, 'Изучаем Python. 4-е издание', 'Такие известные компании, как Google и Intel, Cisco и Hewlett-Packard, используют язык Python, выбрав его за гибкость, простоту использования и обеспечиваемую им высокую скорость разработки. Он позволяет создавать эффективные и надежные проекты, которые легко интегрируются с программами и инструментами, написанными на других языках.\r\n\r\nЧетвертое издание «Изучаем Python» – это учебник, написанный доступным языком, рассчитанный на индивидуальную скорость обучения и основанный на материалах учебных курсов, которые автор, Марк Лутц, ведет уже на протяжении десяти лет. Издание значительно расширено и дополнено в соответствии с изменениями, появившимися в новой версии 3.0. В книге представлены основные типы объектов в языке Python, порядок их создания и работы с ними, а также функции как основной процедурный элемент языка. Рассматриваются методы работы с модулями и дополнительными объектно-ориентированными инструментами языка Python – классами. Включены описания моделей и инструкций обработки исключений, а также обзор инструментов разработки, используемых при создании крупных программ.\r\n\r\nКаждая глава завершается контрольными вопросами с ответами на закрепление пройденного материала, а каждая часть – упражнениями, решения которых приведены в приложении В. Книга была дополнена примечаниями о наиболее существенных расширениях языка, появившихся в версии Python 3.1.', 'Марк Лутц', 11.42, 13, '', '', 1, 0, 0, 1),
(45, 'Программирование на С++', 'Все, что нужно знать, чтобы научиться программировать на С++ и стать профессионалом в области программирования на этом языке, вы найдете в этой книге. Автор уделяет большое внимание как самим основам языка, так и серьезным темам, например наследование, объектное ориентирование, полиморфизм, исключения и шаблоны. Компетентно и подробно рассматриваются вопросы использования стандартной библиотеки шаблонов (STL). Книга не требует предварительных знаний языка С или других языков программирования.', 'Арнольд Виллемер', 8.6, 13, '', '', 1, 0, 0, 1),
(46, 'Гении и аутсайдеры', 'О чем эта книга\r\n\r\nЖизнь несправедлива. Деньги, власть, слава и успех распределяются среди людей крайне неравномерно. Но почему одним все, а другим ничего? Правильно ли сводить причины успеха только лишь к личным качествам, дарованным природой?\r\n\r\nМалкольм Гладуэлл – первый, кто обнаружил скрытые законы за тем, что всегда казалось исключительно волей случая. Эти законы объясняют, почему выдающиеся хоккеисты рождаются, как правило, в январе и практически никогда – в октябре; почему азиатским школьникам математика дается легче, чем другим; почему, чтобы стать престижным нью-йоркским адвокатом, нужно быть евреем.\r\n\r\nКнига показывает, что общего у Билла Гейтса, «Битлз» и Моцарта и почему им удалось переплюнуть сверстников. «Гении и аутсайдеры» – не пособие «как стать успешным». Это увлекательное путешествие в мир законов жизни, которые вы можете использовать себе на пользу.\r\n\r\n\r\nДля кого эта книга\r\n\r\nКнига понравится родителям, а также тем, кому интересно посмотреть на привычные вещи под непривычным углом.\r\n\r\n\r\nПочему мы решили издать эту книгу\r\n\r\nЭто книга выдающегося таланта в мире документальной литературы. Мы уверены, что российскому читателю также будет интересно проследить связь между успехом и компонентами, от которых он зависит.\r\n\r\n\r\nФишки книги\r\n\r\nКнига легко читается, настраивает на оптимизм; она получила отличные отзывы – например, легендарный британский журнал «Экономист» назвал «Гениев и аутсайдеров» «захватывающим чтением с важным посылом», а лауреат Пулитцеровской премии Дэвид Леонхардт написал, что книга «заставляет обдумывать находчивые теории дни спустя после прочтения».', 'Малкольм Гладуэлл', 6.17, 14, '', '', 1, 0, 0, 1),
(47, 'Деньги. Мастер игры', 'Основываясь на обширных исследованиях и личных интервью с более чем 50 легендарными финансистами мира, Энтони Роббинс создал простую дорожную карту из 7 шагов, которую любой человек в состоянии использовать для достижения финансовой свободы.', 'Энтони Роббинс', 9.88, 14, '', '', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `total_price` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_email`, `user_address`, `user_comment`, `user_id`, `date`, `products`, `total_price`, `status`) VALUES
(62, 'Igor', 'igor@igor.ee', 'Tartu', 'awserfrwefrwefrweqa', 38, '2018-08-01 22:08:22', '{\"productsInCart\":{\"44\":4,\"46\":1}}', '51.85', 2),
(66, 'Igor', 'igor@igor.ee', 'Tartu', 'dfhdgfh', 38, '2018-08-03 08:04:58', '{\"productsInCart\":{\"45\":1}}', '8.6', 1),
(65, 'Igor', 'igor@igor.ee', 'ravila 75', 'sthsdzfbhdzfbg', 38, '2018-08-03 07:10:04', '{\"productsInCart\":{\"47\":1}}', '9.88', 1),
(64, 'Igor', 'agromix@agromix.ee', 'Tartu', 'ljhkj.bnkj', 37, '2018-08-02 18:23:49', '{\"productsInCart\":{\"46\":1}}', '6.17', 3),
(63, 'Igor', 'agromix@agromix.ee', 'ravila 75', 'aervgeavrrv', 37, '2018-08-01 22:34:56', '{\"productsInCart\":{\"46\":1,\"43\":3}}', '67.25', 1),
(61, 'Igor', 'igor@igor.ee', 'Tartu', '', 38, '2018-08-01 21:37:03', '{\"productsInCart\":{\"47\":1}}', '9.88', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(37, 'Igor', 'agromix@agromix.ee', 'demo', 'admin'),
(38, 'Igor', 'igor@igor.ee', 'demo', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
