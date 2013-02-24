<?php

$createPositions = "CREATE TABLE POSITIONS
( 
PositionID INT NOT NULL,
PosDesc VARCHAR(50) NOT NULL,
PRIMARY KEY(PositionID, PosDesc )
)";

$createDepartment = "CREATE TABLE DEPARTMENT
( 
DeptID INT NOT NULL,
DeptName VARCHAR(50) NOT NULL,
Location VARCHAR(100) NOT NULL,
PRIMARY KEY (DeptID, DeptName )
)";

$createQualification = "CREATE TABLE QUALIFICATION
( 
QualID INT NOT NULL,
QualDesc VARCHAR(100) NOT NULL,
PRIMARY KEY(QualID, QualDesc)
)";

$createCompany = "CREATE TABLE COMPANY
(
CompanyName VARCHAR(200) PRIMARY KEY NOT NULL
)";

$createOffices = "CREATE TABLE OFFICES
(
OfficeID INT PRIMARY KEY NOT NULL,
Location VARCHAR(100) NOT NULL,
PhoneNumber VARCHAR(20) NOT NULL,
Fax VARCHAR(10) NOT NULL
)";

$createLanguages = "CREATE TABLE LANGUAGES
(
LangID INT NOT NULL,
LangName VARCHAR(30) NOT NULL,
PRIMARY KEY (LangID, LangName)
)";

$createSkills = "CREATE TABLE SKILLS
(
SkillID INT NOT NULL,
SkillDesc VARCHAR(200) NOT NULL,
PRIMARY KEY (SkillID, SkillDesc)
)";

$createEmployee = "CREATE TABLE EMPLOYEE
( 
EmployeeID INT PRIMARY KEY NOT NULL,
Fname VARCHAR(30) NOT NULL,
Mname VARCHAR(30),
Lname VARCHAR(30),
DOB DATE NOT NULL,
MStatus VARCHAR(20) NOT NULL,
ResAddress VARCHAR(500) NOT NULL,
PermAddress VARCHAR(500) NOT NULL,
Gender VARCHAR(6) NOT NULL,
Email VARCHAR(100) NOT NULL,
MobileNumber VARCHAR(10) NOT NULL, 
PositionID INT NOT NULL,
DeptID INT,
SupervisorID INT,
Salary INT NOT NULL,
Leaves INT,
Promotions INT,
OfficeID INT,
Passport INT,
DrivingLicense INT NOT NULL,
HireDate DATE NOT NULL,
FOREIGN KEY (PositionID) REFERENCES POSITIONS(PositionID),
FOREIGN KEY (DeptID) REFERENCES DEPARTMENT(DeptID) ON DELETE SET NULL,
FOREIGN KEY (SupervisorID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (OfficeID) REFERENCES OFFICES(OfficeID) ON DELETE SET NULL
)";

$createAchievements = "CREATE TABLE ACHIEVEMENTS
(
EmployeeID INT NOT NULL,
AchievementID INT NOT NULL,
Achievement VARCHAR(250) NOT NULL,
Yr VARCHAR(4) NOT NULL,
FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY(EmployeeID, AchievementID )
)";

$createDegrees = "CREATE TABLE DEGREES
(
EmployeeID INT NOT NULL,
QualID INT NOT NULL,
Yr VARCHAR(4) NOT NULL,
Institute VARCHAR(500) NOT NULL,
Board VARCHAR(500) NOT NULL,
FOREIGN KEY (QualID) REFERENCES QUALIFICATION(QualID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (EmployeeID, QualID)
)";

$createManagers = "CREATE TABLE MANAGERS 
( 
DeptID INT PRIMARY KEY, 
ManagerID INT,
FOREIGN KEY (DeptID) REFERENCES DEPARTMENT(DeptID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (ManagerID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE
)";

$createDependents = "CREATE TABLE DEPENDENTS
( 
EmployeeID INT NOT NULL,
DependentID INT,
Fname VARCHAR(30),
Mname VARCHAR(30),
Lname VARCHAR(30),
DOB DATE NOT NULL,
Relation VARCHAR(30),
FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
PRIMARY KEY (EmployeeID,DependentID)
)";

$createLangKnownW = "CREATE TABLE LANGKNOWNW
( EmployeeID INT NOT NULL,
  LangID INT NOT NULL,
  FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (LangID) REFERENCES LANGUAGES(LangID),
  PRIMARY KEY (EmployeeID,LangID)  
)";

$createLangKnownS = "CREATE TABLE LANGKNOWNS
( EmployeeID INT NOT NULL,
  LangID INT NOT NULL,
  FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (LangID) REFERENCES LANGUAGES(LangID),
  PRIMARY KEY (EmployeeID,LangID)  
)";

$createSkillSet = "CREATE TABLE SKILLSET
( 
  EmployeeID INT NOT NULL,
  SkillID INT NOT NULL,
  FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (SkillID) REFERENCES SKILLS(SkillID),

  PRIMARY KEY (EmployeeID, SkillID)
)";

$createUsers = "CREATE TABLE USERS
( Username VARCHAR(40) PRIMARY KEY,
  ID INT DEFAULT 0,
  Password VARCHAR(128),
  Access INT
)";

$createEmpMessages = "CREATE TABLE EMPMESSAGES 
( 
MessageID INT PRIMARY KEY AUTO_INCREMENT,
Message LONGTEXT,
Subject TEXT,
ID INT,
ReadOrNot INT,
Ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (ID) REFERENCES EMPLOYEE(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE
)";

?>