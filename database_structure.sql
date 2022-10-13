


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

insert into Administrator values (45672578,'tim bern','lee','123 abc','tim@bern.com',5140000000,'1930-01-01',12345678);
insert into Student values (45672578,'tim bern','lee','123 abc','tim@bern.com',5140000000,'1930-01-01',12345678);

drop table EnrolledIn;
drop table COURSE;

insert into Course values ("soen387","web app dev", "fall", "Mon-Wed",
"10:15:00","alan turing", "h-835", "2022-09-5","2022-12-15");

insert into Course values ("comp333","data analysis", "fall", "Mon-Wed",
"11:45:00","steve jobs", "s2.225", "2022-09-5","2022-12-15");

DELETE FROM Course WHERE CourseCode="comp333";
DELETE FROM Course WHERE CourseCode="soen387";

SELECT * FROM STUDENT;

SELECT * FROM COURSE;

