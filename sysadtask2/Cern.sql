mysql -u root -p
GRANT ALL PRIVELEGES ON *.* TO 'Anirudh'@'localhost' IDENTIFIED BY 'Bjan12073';
CREATE DATABASE CERN;
USE CERN;

/*Node table*/
CREATE TABLE NODE(id int unsigned not null auto_increment,Name varchar(20),Number_of_CPUs int unsigned, Availabe_CPUs int unsigned, Memory_Size long int unsigned, Availale_Memory long int unsigned);

/*Manual insert of 4 Nodes*/

INSERT INTO NODE (Name,Number_of_CPUs,Availabe_CPUs,Memory_Size,Availale_Memory) VALUES ('Cern1', 100,100,100000,100000);
INSERT INTO NODE (Name,Number_of_CPUs,Availabe_CPUs,Memory_Size,Availale_Memory) VALUES ('Cern2', 108,108,145678,145678);
INSERT INTO NODE (Name,Number_of_CPUs,Availabe_CPUs,Memory_Size,Availale_Memory) VALUES ('Cern3', 143,143,100099,100099);
INSERT INTO NODE (Name,Number_of_CPUs,Availabe_CPUs,Memory_Size,Availale_Memory) VALUES ('Cern4', 111,111,107800,107800);

/*Request Table*/
CREATE TABLE REQUESTS(id int unsigned not null auto_increment primary key,Allocated_Node_Name varchar(20),Starttime timestamp, CPU_required int unsigned, Memory_required long int unsigned, Time_required_for_completion timestamp);


/*History Table of completed processes*/
CREATE TABLE HISTORY ( Name varchar(20));

/*to display ongoing processes*/
CREATE TABLE CERN1 (id int unsigned not null auto_increment,Starttime timestamp, CPU_required int unsigned, Memory_required long int unsigned, Time_required_for_completion timestamp);
CREATE TABLE CERN2 (id int unsigned not null auto_increment,Starttime timestamp, CPU_required int unsigned, Memory_required long int unsigned, Time_required_for_completion timestamp);
CREATE TABLE CERN3 (id int unsigned not null auto_increment,Starttime timestamp, CPU_required int unsigned, Memory_required long int unsigned, Time_required_for_completion timestamp);
CREATE TABLE CERN4 (id int unsigned not null auto_increment,Starttime timestamp, CPU_required int unsigned, Memory_required long int unsigned, Time_required_for_completion timestamp);
