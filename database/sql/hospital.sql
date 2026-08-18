CREATE TABLE `Stf` (
  `Stf_No` varchar(255) PRIMARY KEY,
  `FirstName` varchar(255),
  `LastName` varchar(255),
  `Address` varchar(255),
  `TelNo` varchar(255),
  `DOB` date,
  `Sex` varchar(255),
  `NIN` varchar(255) UNIQUE
);

CREATE TABLE `StfQual` (
  `Qual_No` varchar(255) PRIMARY KEY,
  `Stf_No` varchar(255),
  `Type` varchar(255),
  `QualDate` date,
  `Institution` varchar(255)
);

CREATE TABLE `StfPos` (
  `StfPos_No` varchar(255) PRIMARY KEY,
  `Stf_No` varchar(255),
  `Pos_No` varchar(255),
  `CurrSalary` decimal,
  `HrsPerWk` decimal,
  `ContractType` varchar(255),
  `PaymentType` varchar(255)
);

CREATE TABLE `Pos` (
  `Pos_No` varchar(255) PRIMARY KEY,
  `Pos_Name` varchar(255) UNIQUE,
  `SalaryScale` varchar(255)
);

CREATE TABLE `StfWorkExp` (
  `WorkExp_No` varchar(255) PRIMARY KEY,
  `Stf_No` varchar(255),
  `Organization` varchar(255),
  `Position` varchar(255),
  `StartDate` date,
  `FinishDate` date
);

ALTER TABLE `StfQual` ADD FOREIGN KEY (`Stf_No`) REFERENCES `Stf` (`Stf_No`);

ALTER TABLE `StfPos` ADD FOREIGN KEY (`Stf_No`) REFERENCES `Stf` (`Stf_No`);

ALTER TABLE `StfPos` ADD FOREIGN KEY (`Pos_No`) REFERENCES `Pos` (`Pos_No`);

ALTER TABLE `StfWorkExp` ADD FOREIGN KEY (`Stf_No`) REFERENCES `Stf` (`Stf_No`);
