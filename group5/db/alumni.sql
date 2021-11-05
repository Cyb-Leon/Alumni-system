-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2021 at 03:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_bio`
--

CREATE TABLE `alumnus_bio` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `batch` year(4) NOT NULL,
  `course_id` int(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `connected_to` text NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Unverified, 1= Verified',
  `date_created` date NOT NULL,
  `loginstatus` varchar(10) DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumnus_bio`
--

INSERT INTO `alumnus_bio` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `batch`, `course_id`, `email`, `connected_to`, `avatar`, `status`, `date_created`) VALUES
(2, 'Mike', 'Daniel', 'Williams', 'Male', 2009, 1, 'mwilliams@sample.com', 'MindWorx', '1602730260_avatar.jpg', 1, '2020-10-15'),
(3, 'ramahadi', 'jan', 'moheane', 'Male', 2021, 1, 'moheanerj@gmail.com', '', '', 1, '2021-07-07'),
(4, 'karabo', '', 'shigoak', 'Male', 2018, 1, 'KCSHIGOAK05@GMAIL.COM', '', '', 1, '2021-07-07'),
(5, 'Gumede', 'Sanza', 'Sandile ', 'Male', 2021, 4, 'sanza@mail.com', 'Novice', '1625740860_ed2fddb733b93be1f8279538b57ddb9b.jpg', 1, '2021-07-08'),
(6, 'Mduduzi', 'Mdu', 'Kumbuza', 'Male', 2020, 4, 'mdukumbuza@gmail.com', 'Mindworx Academy', '1625743680_b610b30dfec6f7e807542cfa6330ec29.jpg', 1, '2021-07-08'),
(7, 'Tshepang', 'Ofentse', 'Tsotetsi', 'Male', 1997, 6, 'tshepi7t@gmail.com', 'Mindworx', '', 1, '2021-07-08'),
(8, 'kgomotso', '', 'Makatu', 'Female', 2021, 6, 'ks.makatu@gmail.com', '', '', 1, '2021-07-08'),
(9, 'karabo', '', 'shigoak', 'Male', 2020, 3, 'KCSHIGOAK@GMAIL.COM', '', '1625777820_kr.jpg', 1, '2021-07-08'),
(10, 'karabo', '', 'shigoak', 'Male', 2020, 3, 'KCSHIGOAK05@GMAIL.COM', '', '1625825700_kr.jpg', 1, '2021-07-09'),
(11, 'Ofentse', '', 'Kekana', 'Male', 2021, 4, 'kekana@gmail.com', '', '', 1, '2021-07-09'),
(12, 'Tyrique', 'Jaleel', 'Goliath', 'Male', 2021, 6, 'tyrique.goliath6@gmail.com', '', '1625831100_180681792_333273764887186_1351587865775201675_n.jpg', 1, '2021-07-09'),
(13, 'Joe', '', 'Phuti', 'Female', 2021, 1, 'joe@gmail.com', '', '', 1, '2021-07-09'),
(14, 'Sthembiso', 'S', 'Davids', 'Male', 2021, 6, 'tshepi77@gmail.com', '', '', 1, '2021-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(30) NOT NULL,
  `company` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `job_title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `company`, `location`, `job_title`, `description`, `user_id`, `date_created`) VALUES
(3, 'Mindworx', 'Rosebank ', 'IT specialist', '&lt;ul style=&quot;box-sizing: inherit; background-color: rgb(249, 249, 249); padding-top: 1rem; color: rgb(73, 73, 73); font-family: HelveticaNeue-Light, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Review diagnostics and assess the functionality and efficiency of systems&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Implement security measures&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Monitor security certificates and company compliance of requirements&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Offer technical support to company staff and troubleshoot computer problems&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Install and update company software and hardware as needed&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit; padding-bottom: 1rem;&quot;&gt;Anticipate and report the cost of replacing or updating computer items&lt;/li&gt;&lt;/ul&gt;', 1, '2021-07-08 15:03:42'),
(4, 'Hollard', 'Home based', 'System developer', '&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 22px;&quot;&gt;&lt;/p&gt;&lt;span style=&quot;font-size:16px;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;We are looking for a skilled web developer who will be responsible for developing and/or designing websites for our company. You will be working alongside a team of other developers in creating, maintaining, and updating our websites.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 16px;&quot;&gt;In order for you to succeed in this role, you will need to be proficient in JavaScript, HTML, CSS, and have solid knowledge and experience in programming applications.&lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 22px;&quot;&gt;&lt;/p&gt;', 1, '2021-07-08 15:04:57'),
(5, 'Mindworx', 'Rosebank', 'IT System developer (Java)', '&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 22px;&quot;&gt;&lt;/p&gt;&lt;span style=&quot;font-size:18px;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 18px;&quot;&gt;We are looking for highly skilled programmers with experience building web applications in Java. Java Developers are responsible for analyzing user requirements and business objectives, determining application features and functionality, and recommending changes to existing Java-based applications, among other duties.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 18px;&quot;&gt;Java Developers need to compile detailed technical documentation and user assistance material, requiring excellent written communication.&lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;margin-bottom: 24px; letter-spacing: -0.2px; color: rgb(44, 50, 65); font-family: &amp;quot;Work Sans&amp;quot;, &amp;quot;Helvetica Neue Light&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 22px;&quot;&gt;&lt;/p&gt;', 7, '2021-07-09 13:11:30'),
(6, 'Hollard', 'Home Based', 'Business Analyst (BA)', '&lt;span style=&quot;font-size:18px;color: rgb(17, 17, 17); font-family: Roboto, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 18px;&quot;&gt;Review, analyze&lt;/span&gt;&lt;span style=&quot;color: rgb(17, 17, 17); font-family: Roboto, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;and evaluate business systems and user needs. Document requirements, define scope and objectives and formulate systems to parallel overall business strategies.&lt;/span&gt;&lt;br&gt;', 7, '2021-07-09 13:13:22'),
(7, 'Mindworx', 'Home based', 'IT specialist', 'N/A', 7, '2021-07-09 14:12:49'),
(9, 'Lencyber', 'Johannesburg', 'Software Tester', 's&lt;br class=&quot;Apple-interchange-newline&quot;&gt;&lt;span style=&quot;color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(32, 33, 36);&quot;&gt;As a software tester, you&rsquo;ll be involved in&amp;nbsp;&lt;/span&gt;&lt;b style=&quot;color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(32, 33, 36);&quot;&gt;the quality assurance stage of software development and deployment&lt;/b&gt;&lt;span style=&quot;color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(32, 33, 36);&quot;&gt;. You&rsquo;ll conduct automated and manual tests to ensure the software created by developers is fit for purpose and any bugs or issues are removed within a product before it gets deployed to everyday users.&lt;/span&gt;', 11, '2021-09-21 16:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `about`) VALUES
(1, 'BS Information Technology', 'Sample'),
(3, 'BSc Computer Science', ''),
(4, 'BCom FIS', ''),
(5, 'Higher certificate: Information Technology', ''),
(7, 'others', ''),
(9, 'Cisco NPDEV', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `schedule` datetime NOT NULL,
  `banner` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `schedule`, `banner`, `date_created`) VALUES
(1, 'Mid year gathering', '&lt;font color=&quot;#000000&quot;&gt;Mindworx staff&lt;/font&gt;', '2021-07-16 12:12:00', '1625829960_efefef.jpg', '2020-10-16 09:51:55'),
(2, 'Introduction to Migration (new system)', 'System migration', '2021-07-09 12:15:00', '1625829840_knknk.jpg', '2021-07-09 12:15:30'),
(3, 'Innovative minds hackathon', 'we will be coming up with &lt;i&gt;ideas &lt;/i&gt;that will enhance efficiency in the world of agriculture.&lt;p&gt;solving the pain points in&lt;/p&gt;&lt;p&gt;- communication&lt;/p&gt;&lt;p&gt;- time tracking&lt;/p&gt;&lt;p&gt;- Logistics&lt;/p&gt;&lt;p&gt;- crop production&lt;/p&gt;&lt;p&gt;and mostly concentrating on ways to attract investments and collaboration across the continent to ensure food security&lt;/p&gt;', '2021-08-20 13:00:00', '1628243160_agri.jpg', '2021-08-06 11:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `event_commits`
--

CREATE TABLE `event_commits` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_commits`
--

INSERT INTO `event_commits` (`id`, `event_id`, `user_id`) VALUES
(1, 1, 3),
(2, 1, 11),
(3, 2, 8),
(4, 1, 7),
(5, 2, 7),
(6, 1, 8),
(7, 2, 12),
(8, 1, 12),
(9, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` int(11) NOT NULL,
  `Token` varchar(50) NOT NULL,
  `TokenExpire` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `topic_id`, `comment`, `user_id`, `date_created`) VALUES
(1, 3, 'Sample updated Comment', 3, '2020-10-15 15:46:03'),
(3, 3, 'Sample', 1, '2020-10-16 08:48:02'),
(5, 0, '', 1, '2020-10-16 09:49:34'),
(6, 7, 'HI', 7, '2021-07-09 13:31:22'),
(7, 7, 'interesting topic to talk about in era', 12, '2021-07-09 13:35:11'),
(8, 7, 'Comment', 8, '2021-07-09 14:16:49'),
(9, 7, 'Lovely application', 14, '2021-07-09 14:17:02'),
(10, 7, '', 11, '2021-07-09 14:20:40'),
(11, 7, 'whatsavdusab', 11, '2021-07-23 12:24:03'),
(12, 7, 'whATSA', 11, '2021-07-23 12:24:39'),
(14, 8, 'hi&amp;nbsp;', 7, '2021-07-23 14:21:04'),
(15, 8, 'hello&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 7, '2021-08-06 15:18:56'),
(16, 8, 'First comment', 4, '2021-08-06 15:19:06'),
(17, 8, 'hbbnj', 7, '2021-09-17 13:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `title`, `description`, `user_id`, `date_created`) VALUES
(5, 'Adapting to change ', '&lt;span style=&quot;color: rgb(20, 20, 20); font-family: &amp;quot;Neue Helvetica W01&amp;quot;, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 18px;&quot;&gt;The Fourth Industrial Revolution represents a fundamental change in the way we live, work and relate to one another. It is a new chapter in human development, enabled by extraordinary technology advances commensurate with those of the first, second and third industrial revolutions. These advances are merging the physical, digital and biological worlds in ways that create both huge promise and potential peril. The speed, breadth and depth of this revolution is forcing us to rethink how countries develop, how organisations create value and even what it means to be human. The Fourth Industrial Revolution is about more than just technology-driven change; it is an opportunity to help everyone, including leaders, policy-makers and people from all income groups and nations, to harness converging technologies in order to create an inclusive, human-centred future. The real opportunity is to look beyond technology, and find ways to give the greatest number of people the ability to positively impact their families, organisations and communities.&lt;/span&gt;', 7, '2021-07-09 13:15:10'),
(6, 'Way forward to improve job processes', '&lt;span style=&quot;font-size:18px;color: rgb(0, 0, 0); font-family: Roboto, Helvetica, sans-serif;&quot;&gt;&lt;span style=&quot;font-family: Roboto, Helvetica, sans-serif; font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;Create a Schedule and Take Breaks Another way to&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Roboto, Helvetica, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;improve&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Roboto, Helvetica, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;your performance at work is to create a schedule that works for you. If you have the flexibility to decide when you complete tasks and&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Roboto, Helvetica, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;schedule&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Roboto, Helvetica, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;meetings, this can have a big effect on how productive you are. So please bring any ideas to the table if you have any suggestions.&lt;/span&gt;', 7, '2021-07-09 13:17:01'),
(7, 'Data Science', 'All about data', 8, '2021-07-23 14:20:32'),
(8, 'Impact of 4IR ', 'This is a testing post', 4, '2021-08-06 14:07:02'),
(9, 'Computer Science', 'Science is fun!', 8, '2021-08-06 15:18:06'),
(10, '', '', 7, '2021-09-16 22:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `about` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `about`, `created`) VALUES
(1, '', '2020-10-15 13:08:27'),
(6, '', '2021-07-08 13:42:44'),
(7, '', '2021-07-08 13:43:03'),
(8, '', '2021-07-08 14:13:25'),
(9, '', '2021-07-08 14:13:40'),
(10, '', '2021-07-08 14:14:03'),
(13, '', '2021-07-08 14:16:24'),
(15, '', '2021-07-09 12:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Mindworx Academy', 'info@group5.co.za', '+27818435973', '1625745180_themepic.jpg', '&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 11.25pt 0pt;&quot;&gt;&lt;span style=&quot;font-size:21pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:700;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;About&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;&quot;&gt;&lt;span style=&quot;font-size: 12pt; font-family: Roboto, sans-serif; color: rgb(63, 63, 63); background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap; font-style: normal;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;The Alumni Management System is a simple PHP/MySQL project that helps a certain university/college school manages its alumni data. This project has 2 sides of users UI (user interface), which are the admin side/school management and the alumnus/alumna&rsquo;s side. The admin side can manage all the list of job posted, alumni list, events, forum topics, and the gallery. The alumni site can create an account (to be verified by admin), post a job opportunity, create a forum topic, and join to other forums, commit to participate in an upcoming event such as homecoming.&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 11.25pt 0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;Talking about the flow of the Alumni Management System, universities/colleges school alumni will register to the website and this process will need the verification of the school management in order to enlist the alumnus/alumna in the website user. After the admin will verify the user as an alumnus of the school the alumni user can begin to explore the features or functionalities of the system on their side which are the job opportunities posted by other alumni or admin, a list of upcoming events, joining to the forum with the other alumni.&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 11.25pt 0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt; For the administrator side of the system, aside from verifying the account and list of alumni, the admin also will manage the gallery to be displayed on the website and the gallery may contain some images of the school events with a short description. The admin will create the about content of the school to be displayed also on the website, this feature helps the school management update the about content of the system easily even without the presence of a developer. The admin can also post a job opportunity and can overwrite or manage the posted job and forum topic of an alumnus/alumni if any instances may occur. &lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 11.25pt 0pt;&quot;&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p dir=&quot;ltr&quot; style=&quot;line-height:1.38;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 11.25pt 0pt;&quot;&gt;&lt;span style=&quot;font-size: 12pt; font-family: Roboto, sans-serif; color: rgb(63, 63, 63); background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;&quot;&gt;&lt;i style=&quot;font-size: 12pt; font-family: Roboto, sans-serif; color: rgb(63, 63, 63); background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;&quot;&gt;Please use this link to visit our Mindworx website&lt;/i&gt;&lt;/span&gt;&lt;span style=&quot;font-size:12pt;font-family:Roboto,sans-serif;color:#3f3f3f;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;&quot;&gt;: &lt;/span&gt;&lt;a href=&quot;https://mindworx.co.za/&quot;&gt;&lt;span style=&quot;color:rgb(61,133,198);&quot;&gt;Home - Mindworx&lt;/span&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1=Admin,2=Alumni officer, 3= alumnus',
  `auto_generated_pass` text NOT NULL,
  `alumnus_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `auto_generated_pass`, `alumnus_id`) VALUES
(3, 'Mike Williams', 'mwilliams@sample.com', '12345la_@sdfs', 3, '', 2),
(4, 'ramahadi moheane', 'moheanerj@gmail.com', '4313e87161097f0aeda6cd3852d7223c', 3, '', 3),
(6, 'Gumede Sandile ', 'sanza@mail.com', '28ebc90b1c2118dc672884dbc06bc147', 3, '', 5),
(7, 'Mduduzi Kumbuza', 'mdukumbuza@gmail.com', '001a6d412fba2a8051420a07030b9af2', 3, '', 6),
(8, 'Tshepang Tsotetsi', 'tshepi7t@gmail.com', '65b7499cf7698a12840848c815e02ff2', 3, '', 7),
(9, 'kgomotso Makatu', 'ks.makatu@gmail.com', '69cbc13fef566bf5ccf24109804fb41f', 3, '', 8),
(11, 'Admin', 'admin', 'admin_@logon', 1, '', 0),
(12, 'karabo shigoak', 'KCSHIGOAK05@GMAIL.COM', '2dd1239bbf49e3ca9ad15a286e353429', 3, '', 10),
(13, 'Ofentse Kekana', 'kekana@gmail.com', '5f67957c2a1035c4bc71f947491cdea8', 3, '', 11),
(14, 'Tyrique Goliath', 'tyrique.goliath6@gmail.com', '4707f28b978902fbd36b72f736b5297d', 3, '', 12),
(15, 'Joe Phuti', 'joe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, '', 13),
(16, 'Sthembiso Davids', 'tshepi77@gmail.com', 'badb252f562663abcbd2a60577d9d226', 3, '', 14),
(17, 'Yellow Keamo', 'keamoy@gmail.com', '8d7c916f8aa552f543fac0087ab14455', 3, '', 17),
(18, 'Yellow Keamo', 'keamoy2@gmail.com', '8d7c916f8aa552f543fac0087ab14455', 3, '', 18),
(19, 'Yellow Keamo', 'keamo@gmail.com', '8d7c916f8aa552f543fac0087ab14455', 3, '', 19),
(20, 'Yellow Keamo', 'justin123@gmail.com', '8d7c916f8aa552f543fac0087ab14455', 3, '', 20),
(22, 'tsotetsi tshepi', 'mahamotsa@gmail.com', '45a7b177a47d6bb7924c47d522661f5e', 3, '', 22),
(26, 'test test', 'baholo@lencyber.co.za', '123456789', 3, '', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_commits`
--
ALTER TABLE `event_commits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_commits`
--
ALTER TABLE `event_commits`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
