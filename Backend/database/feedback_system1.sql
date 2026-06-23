-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 07:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_system1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `message`, `Date`) VALUES
(5, 'dfd', 'sanjeevtech2@gmail.com', 9015501897, 'ddd', '2016-06-29 17:53:28'),
(6, 'dfd', 'sanjeevtech2@gmail.com', 9015501897, 'ddd', '2016-06-29 17:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `user_alias` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(75) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_alias`, `Name`, `designation`, `programme`, `semester`, `email`, `password`, `mobile`, `date`, `status`) VALUES
(7, 'akashp1', 'Mr. Akash Patel', 'Associate Professior', 'B.Tech', 'iv', 'akashp@gmail.com', 'akash', 9015501897, '2016-07-13 14:30:53', 0),
(8, 'chintalr222', 'Mrs. Chintal Raval', 'Developer', 'B.tech', 'iv', 'chintalr@gmail.com', 'chintal', 9015501897, '2016-07-13 14:37:35', 0),
(11, 'harshilj3333', 'Mr. Harshil Joshi', 'IT', 'B.tech', 'iv', 'harshilj@gmail.com', 'harshil', 901550189, '2016-07-13 14:40:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_name`
--

CREATE TABLE `faculty_name` (
  `sno` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_name`
--

INSERT INTO `faculty_name` (`sno`, `Name`, `email`) VALUES
(1, 'Chintal Raval', 'chintalr@gmail.com'),
(2, 'Akash Patel', 'akashp@gmail.com'),
(3, 'Harshil Joshi', 'harshilj@gmail.com'),
(4, 'Priyal Vaghela', 'priyalv@gmail.com'),
(5, 'Hardik Jaiswal', 'hardikj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `Teacher provided the course outline having weekly content plan w` enum('5','4','3','2','1') NOT NULL,
  `Course objectives,learning outcomes and grading criteria are cle` enum('5','4','3','2','1') NOT NULL,
  `Course integrates throretical course concepts with the real worl` enum('5','4','3','2','1') NOT NULL,
  `Teacher is punctual,arrives on time and leaves on time` enum('5','4','3','2','1') NOT NULL,
  `Teacher is good at stimulating the interest in the course conten` enum('5','4','3','2','1') NOT NULL,
  `Teacher is good at explaining the subject matter` enum('5','4','3','2','1') NOT NULL,
  `Teacher's presentation was clear,loud ad easy to understand` enum('5','4','3','2','1') NOT NULL,
  `Teacher is good at using innovative teaching methods/ways` enum('5','4','3','2','1') NOT NULL,
  `Teacher is available and helpful during counseling hours` enum('5','4','3','2','1') NOT NULL,
  `Teacher has competed the whole course as per course outline` enum('5','4','3','2','1') NOT NULL,
  `Teacher was always fair and impartial:` enum('5','4','3','2','1') NOT NULL,
  `Assessments conducted are clearly connected to maximize learinin` enum('5','4','3','2','1') NOT NULL,
  `What I liked about the course` text NOT NULL,
  `Why I disliked about the course` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `faculty_id`, `Teacher provided the course outline having weekly content plan w`, `Course objectives,learning outcomes and grading criteria are cle`, `Course integrates throretical course concepts with the real worl`, `Teacher is punctual,arrives on time and leaves on time`, `Teacher is good at stimulating the interest in the course conten`, `Teacher is good at explaining the subject matter`, `Teacher's presentation was clear,loud ad easy to understand`, `Teacher is good at using innovative teaching methods/ways`, `Teacher is available and helpful during counseling hours`, `Teacher has competed the whole course as per course outline`, `Teacher was always fair and impartial:`, `Assessments conducted are clearly connected to maximize learinin`, `What I liked about the course`, `Why I disliked about the course`, `date`) VALUES
(19, 'arjavgandhi2@gmail.com', 'akashp@gmail.com', '5', '4', '4', '2', '4', '1', '4', '3', '2', '5', '4', '4', '\r\nNot bad', '\r\nNice', '2021-04-17'),
(20, 'kirtangohil1@gmail.com', 'chintalr@gmail.com', '5', '5', '2', '3', '2', '1', '1', '2', '5', '5', '3', '5', '\r\nnice', 'nice\r\n', '2021-04-17'),
(21, 'kirtangohil1@gmail.com', 'akashp@gmail.com', '5', '4', '3', '4', '3', '', '', '', '', '', '', '', '\r\nmo\r\n\r\n', '', '2021-04-18'),
(22, 'kishan@gmail.com', 'akashp@gmail.com', '2', '1', '3', '1', '3', '3', '2', '1', '1', '2', '2', '1', '\r\nNot Bad', '\r\nNo Idea', '2021-04-19'),
(23, 'kishan@gmail.com', 'chintalr@gmail.com', '1', '1', '1', '2', '3', '3', '2', '2', '1', '1', '3', '3', '\r\nGoog', '\r\nGood', '2021-04-19'),
(24, 'kishan@gmail.com', 'harshilj@gmail.com', '1', '1', '1', '2', '2', '5', '1', '5', '5', '4', '4', '4', '\r\nNothing\r\n', '\r\n\r\nNothing', '2021-04-19'),
(25, 'zeel@gmail.com', 'akashp@gmail.com', '1', '3', '3', '5', '5', '5', '5', '5', '5', '5', '5', '5', '\r\n\r\nNothing', '\r\nNothing\r\n', '2021-04-19'),
(26, 'zeel@gmail.com', 'chintalr@gmail.com', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2', '1', '\r\nNothing\r\n', '\r\n\r\nNothing', '2021-04-19'),
(27, 'zeel@gmail.com', 'harshilj@gmail.com', '1', '1', '1', '2', '3', '3', '3', '3', '2', '2', '5', '3', '\r\n\r\nNothing', '\r\n\r\nNothing', '2021-04-19'),
(28, 'kirtangohil1@gmail.com', 'harshilj@gmail.com', '4', '3', '3', '3', '2', '2', '2', '2', '2', '2', '3', '3', '\r\n\r\nNothing', '\r\n\r\nNothing', '2021-04-19'),
(29, 'arjavgandhi2@gmail.com', 'chintalr@gmail.com', '4', '3', '3', '4', '4', '5', '5', '4', '4', '4', '4', '4', '\r\n\r\nNothing', '\r\n\r\nNothing', '2021-04-19'),
(30, 'yug@gmail.com', 'akashp@gmail.com', '2', '3', '3', '5', '4', '5', '4', '4', '3', '4', '4', '4', '\r\n\r\nNothing', '\r\n\r\nNothing', '2021-04-19'),
(31, 'yug@gmail.com', 'chintalr@gmail.com', '3', '4', '4', '4', '4', '5', '3', '4', '4', '4', '4', '4', '\r\n\r\nNothing', '\r\n\r\nNothing', '2021-04-19'),
(32, 'yug@gmail.com', 'harshilj@gmail.com', '2', '3', '3', '2', '2', '5', '3', '5', '5', '5', '3', '3', '\r\n\r\nNothing', '\r\nNothing\r\n', '2021-04-19'),
(34, 'rishi@gmail.com', 'chintalr@gmail.com', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'na\r\n', '\r\nna', '2021-04-23'),
(35, 'rishi@gmail.com', 'akashp@gmail.com', '5', '1', '3', '4', '2', '3', '1', '4', '1', '4', '1', '5', 'na\r\n', 'na\r\n', '2021-04-23'),
(36, 'rishi@gmail.com', 'harshilj@gmail.com', '5', '1', '4', '3', '3', '2', '5', '2', '1', '4', '1', '1', '\r\nna', 'na\r\n', '2021-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `notice_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`notice_id`, `attachment`, `subject`, `Description`, `Date`) VALUES
(8, 'AteekCV_java (1).docx', 'aaaaa', 'dfdfdfd', '2016-07-03 12:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(35) NOT NULL,
  `marks` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`student_id`, `student_name`, `marks`) VALUES
(1, 'John', 39),
(2, 'Mary ', 46),
(3, 'Maya', 65),
(4, 'Rahul', 90),
(5, 'Priya', 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `hobbies` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `regid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `mobile`, `programme`, `semester`, `gender`, `hobbies`, `image`, `dob`, `regid`) VALUES
(16, 'Kirtan Gohil', 'kirtangohil1@gmail.com', '98ba7779dd2f7362f676269e00d677b6', 9845203654, 'IT', 'iv', 'm', 'reading', 'boy.png', '2001-10-08', '2021-04-17 22:16:08'),
(17, 'Arjav Gandhi', 'arjavgandhi2@gmail.com', '40d704c725a7f2d9accbab011a9dd6da', 9878523025, 'IT', 'iv', 'm', 'playing', 'boy.png', '2001-05-20', '2021-04-17 22:17:26'),
(20, 'Rishi Patel', 'rishi@gmail.com', 'ac4b0a568e8d3a14b521eae07006bc95', 7043353872, 'Civil', 'iv', 'm', 'reading', 'boy.png', '2003-06-18', '2021-04-17 22:29:12'),
(22, 'Vijay Bharwad', 'vijaybharwad3@gmail.com', '4f9fecabbd77fba02d2497f880f44e6f', 9878523089, 'CSE', 'iv', 'm', 'playing', 'boy.png', '2002-08-07', '2021-04-17 22:32:28'),
(26, 'Yug Patel', 'yug@gmail.com', '849777ef17449dc49e137e64f56bc5b3', 9878523025, 'IT', 'iv', 'm', 'reading', 'boy.png', '2001-05-07', '2021-04-19 08:53:18'),
(27, 'Zeel Thakkar', 'zeel@gmail.com', 'f0448c8111569028797e82ed650586d7', 995228530, 'CSE', 'iv', 'm', 'playing', 'boy.png', '2001-12-12', '2021-04-19 08:54:18'),
(28, 'Kishan Patel', 'kishan@gmail.com', 'b1634c02812896b87fff3d56f89e36af', 9978823569, 'CSE', 'iv', 'm', 'singin', 'boy.png', '2002-01-19', '2021-04-19 08:55:09'),
(29, 'kirtan', 'kirtan@gmail.com', 'a663668705e858f0fa3df62dae272a11', 9845203654, 'CSE', 'i', 'm', 'reading', 'boy.png', '2003-08-13', '2021-04-19 10:05:17');

---------------------------------------------------------------

-- Table structure for table `attendance`
--

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    roll_no VARCHAR(50),
    date DATE,
    status VARCHAR(10)
);
-- --------------------------------------------------------

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `hobbies` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `regid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`id`, `name`, `email`, `pass`, `mobile`, `programme`, `semester`, `gender`, `hobbies`, `image`, `dob`, `regid`) VALUES
(16, 'Kirtan Gohil', 'kirtangohil1@gmail.com', '98ba7779dd2f7362f676269e00d677b6', 9845203654, 'IT', 'iv', 'm', 'reading', 'boy.png', '2001-10-08', '2021-04-17 22:16:08'),
(17, 'Arjav Gandhi', 'arjavgandhi2@gmail.com', '40d704c725a7f2d9accbab011a9dd6da', 9878523025, 'IT', 'iv', 'm', 'playing', 'boy.png', '2001-05-20', '2021-04-17 22:17:26'),
(20, 'Rishi Patel', 'rishi@gmail.com', 'ac4b0a568e8d3a14b521eae07006bc95', 7043353872, 'Civil', 'iv', 'm', 'reading', 'boy.png', '2003-06-18', '2021-04-17 22:29:12'),
(22, 'Vijay Bharwad', 'vijaybharwad3@gmail.com', '4f9fecabbd77fba02d2497f880f44e6f', 9878523089, 'CSE', 'iv', 'm', 'playing', 'boy.png', '2002-08-07', '2021-04-17 22:32:28'),
(26, 'Yug Patel', 'yug@gmail.com', '849777ef17449dc49e137e64f56bc5b3', 9878523025, 'IT', 'iv', 'm', 'reading', 'boy.png', '2001-05-07', '2021-04-19 08:53:18'),
(27, 'Zeel Thakkar', 'zeel@gmail.com', 'f0448c8111569028797e82ed650586d7', 995228530, 'CSE', 'iv', 'm', 'playing', 'boy.png', '2001-12-12', '2021-04-19 08:54:18'),
(28, 'Kishan Patel', 'kishan@gmail.com', 'b1634c02812896b87fff3d56f89e36af', 9978823569, 'CSE', 'iv', 'm', 'singin', 'boy.png', '2002-01-19', '2021-04-19 08:55:09'),
(29, 'kirtan', 'kirtan@gmail.com', 'a663668705e858f0fa3df62dae272a11', 9845203654, 'CSE', 'i', 'm', 'reading', 'boy.png', '2003-08-13', '2021-04-19 10:05:17');

---------------------------------------------------------------
-- course table with seat management

USE feedback_system1;

CREATE TABLE 'courses' (
    'id' INT AUTO_INCREMENT PRIMARY KEY,
    'course_name' VARCHAR(100) NOT NULL,
    'total_seats' INT NOT NULL,
    'used_seats' INT DEFAULT 0
);

SELECT id, course_name, total_seats, used_seats,
       (total_seats - used_seats) AS available_seats
FROM courses;


INSERT INTO 'courses' ('course_name', 'total_seats', 'used_seats')
VALUES
('BCA', 60, 40),
('MBA', 50, 25),
('B.Tech', 120, 100),
('MCA', 40, 15);


-----------------------------------------------------------------
USE feedback_system1;

CREATE TABLE 'subjects' (
    'id' INT AUTO_INCREMENT PRIMARY KEY,
    'subject_name' VARCHAR(100) NOT NULL,
    'course_id' INT NOT NULL,
    'semester' INT NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);

INSERT INTO 'subjects' ('subject_name', 'course_id', 'semester')
VALUES
('Database Management Systems', 1, 4),
('Software Engineering', 1, 4),
('Marketing Management', 2, 2),
('Financial Management', 2, 2),
('Data Structures', 3, 2),
('Operating Systems', 3, 2),
('Advanced Java Programming', 4, 4),
('Web Technologies', 4, 4); 


------------------------------------------
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    academic_year VARCHAR(20) NOT NULL,
    branch VARCHAR(50) NOT NULL,
    address VARCHAR(255),
    father_name VARCHAR(100),
    mobile_no VARCHAR(15)
);


--------------------------------------------------------
CREATE TABLE schedule (
    -- Unique identifier for each schedule entry
    schedule_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,

    -- Academic details (Foreign keys are better here in a real system, but we'll use simple text fields for now)
    course_name VARCHAR(100) NOT NULL,
    academic_year VARCHAR(20) NOT NULL,
    section_name VARCHAR(10) NOT NULL,

    -- Schedule timing details
    class_day VARCHAR(20) NOT NULL, -- e.g., 'Monday', 'Tuesday'
    time_slot VARCHAR(50) NOT NULL,  -- e.g., '9:00 AM - 10:00 AM'

    -- Class details
    subject_name VARCHAR(255) NOT NULL,
    faculty_name VARCHAR(255) NOT NULL,

    -- Optional: Timestamp for when the entry was created
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `faculty_name`
--
ALTER TABLE `faculty_name`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `user` ADD FULLTEXT KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--


CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `classroom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `exam` (`id`, `subject`, `teacher`, `classroom`, `date`, `stime`, `etime`) VALUES
(1, 'SCM4251', 'TC1000020000', '4-B', '2020-05-26', '11:45:00', '12:45:00'),
(2, '', 'Andrew', '4-B', '2022-05-20', '00:00:00', '00:00:00');

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty_name`
--
ALTER TABLE `faculty_name`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
