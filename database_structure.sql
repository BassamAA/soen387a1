


--
-- Database: `University`
--

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE Student (
  ID int(8) NOT NULL PRIMARY KEY,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  Address varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  PhoneNumber bigint NOT NULL,
  DateOfBirth date NOT NULL,
  PW int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE Administrator (
  EmploymentID int NOT NULL PRIMARY KEY,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  Address varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  PhoneNumber bigint NOT NULL,
  DateOfBirth date NOT NULL,
  PW int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE Course (
  CourseCode varchar(8) NOT NULL PRIMARY KEY,
  Title text NOT NULL,
  Semester text NOT NULL,
  Days text NOT NULL,
  Times time NOT NULL,
  Instructor text NOT NULL,
  Room text NOT NULL,
  Start_date date NOT NULL,
  End_date date NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `EnrolledIn`
--

CREATE TABLE EnrolledIn (
  CourseCode varchar(8) NOT NULL,
  ID int(8) NOT NULL,
  foreign key (CourseCode) references Course(CourseCode),
  foreign key (ID) references Student(ID)
);