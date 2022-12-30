Create table Courses_narcissn(
cid varchar(200) NOT NULL, 
name varchar(200) NOT NULL,
term varchar(200) NOT NULL,
enrollment int NOT NULL,
Fid int NOT NULL, 
Rid int NOT NULL,  
aid int NOT NULL, 
primary key (cid),
foreign key (Fid)references TECH3740.Faculty(Fid),
foreign key (Rid)references TECH3740.Rooms(Rid),
foreign key (aid)references TECH3740.Admin(aid));


+----------+-------------+----------------------+------------+------+------+-----+
| cid      | name        | term                 | enrollment | Fid  | Rid  | aid |
+----------+-------------+----------------------+------------+------+------+-----+
| CPS 1231 | Java 1      | Spring, Summer, Fall |         23 | 1001 | 9001 |   1 |
| CPS 2232 | Java 2      | Spring,Fall          |         20 | 1002 | 9002 |   2 |
| CPS3740  | Database    | Spring               |         25 | 1003 | 9003 |   5 |
| TECH3740 | IT Database | Spring,Fall          |         29 | 1004 | 9004 |   6 |
| TECH4513 | Java 1      | Spring               |         42 | 1005 | 9005 |   7 |
+----------+-------------+----------------------+------------+------+------+-----+



MariaDB [TECH3740]> select * from Faculty;
+------+-----------+---------+-----------+
| Fid  | Name      | Zipcode | Dept      |
+------+-----------+---------+-----------+
| 1001 | Dr. M     | 07101   | CS        |
| 1002 | Dr. H     | 07811   | CS        |
| 1003 | Dr. C     | 07083   | Math      |
| 1004 | Dr. Y     | 07073   | Biology   |
| 1005 | Dr. Q     | 07073   | Business  |
| 1006 | Dr. B     | 07811   | Education |
| 1007 | Prof. New | 1001    | IT        |
+------+-----------+---------+-----------+

MariaDB [TECH3740]> select * from Rooms;
+------+----------+--------+------+
| Rid  | Building | Number | Size |
+------+----------+--------+------+
| 9001 | GLAB     | 404    |   30 |
| 9002 | GLAB     | 405    |   25 |
| 9003 | GLAB     | 407    |   45 |
| 9004 | GLAB     | 308    |   30 |
| 9005 | NAAB     | 208    |   45 |
| 9006 | NAAB     | 109    |   80 |
| 9007 | MSC      | 111    |   10 |
+------+----------+--------+------+


MariaDB [TECH3740]> select * from Admin;
+-----+--------+----------+----------------+------------+------------+--------+-----------------------------------+
| aid | login  | password | name           | dob        | join_date  | gender | Address                           |
+-----+--------+----------+----------------+------------+------------+--------+-----------------------------------+
|   1 | tiger  | xyz123   | Victor Smith   | 1990-01-01 | 2018-01-01 | M      | 1000 Morris Ave., Union, NJ 07083 |
|   2 | panda  | xyz333   | John Lee       | NULL       | 2015-01-01 | F      | 133 Main St., Austin, TX          |
|   5 | Austin | bbb      | Austin test    | 1998-01-01 | 1990-01-01 | M      | 71 Central Ave., Newark, NJ 07188 |
|   6 | monkey | 123      | Tester Staff   | NULL       | 2020-01-01 | M      | 100 Main st. Edison, NJ 07777     |
|   7 | fish   | 111      | Tester2 Staff2 | 2021-01-10 | 2020-01-01 | F      | 100 Central st. Edison, NJ 07777  |
+-----+--------+----------+----------------+------------+------------+--------+-----------------------------------+

Insert into Courses_narcissn (cid, name, term, enrollment, Fid, Rid, aid) values
('CPS 1231', 'Java 1', 'Spring, Summer, Fall',23, 1001,9001,1);

Insert into Courses_narcissn (cid, name, term, enrollment, Fid, Rid, aid) values
('CPS 2232', 'Java 2', 'Spring,Fall',20, 1002,9002,2), ('CPS3740', 'Database', 'Spring', 25,1003,9003,5), ('TECH3740', 'IT Database', 'Spring,Fall', 29,1004,9004,6);

Insert into Courses_narcissn (cid, name, term, enrollment, Fid, Rid, aid) values
('TECH4513', 'Java 1', 'Spring',42, 1005,9005,7);


select f.Name,R.Building,R.Number,R.Size,a.name from 
TECH3740.Faculty f,TECH3740.Rooms R,TECH3740.Admin a
where  ;


select c.cid, c.name, f.name as Faculty_Name, c.term, c.enrollment, concat(r.Building, " " , r.Number) as Building_Number, r.Size, a.name as Added_by_Admin
    from 
        TECH3740_2022F.Courses_narcissn c, TECH3740.Admin a, TECH3740.Faculty f, TECH3740.Rooms r

    where c.aid = a.aid AND c.Fid=f.Fid AND c.Rid=r.Rid AND (c.cid  LIKE  '%1%' OR c.name LIKE '%1%');