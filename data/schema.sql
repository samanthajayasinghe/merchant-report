CREATE TABLE merchant_transaction(
   id INT PRIMARY KEY     NOT NULL,
   merchant_id int,
   currency_id int,
   date DATETIME ,
   amount REAL
);

CREATE TABLE merchant(
   id INT PRIMARY KEY     NOT NULL,
   name varchar(50)
);

CREATE TABLE currency(
   id INT PRIMARY KEY     NOT NULL,
   symbol varchar(3)
);

INSERT INTO currency values(1,'USD');
INSERT INTO currency values(2,'EUR');
INSERT INTO currency values(3,'GBP');

INSERT INTO merchant values(1,'m1');
INSERT INTO merchant values(2,'m2');
INSERT INTO merchant values(3,'m3');

INSERT INTO merchant_transaction values(1,1,1,'2010-01-15 00:00:00',50);
INSERT INTO merchant_transaction values(2,1,2,'2010-01-16 00:00:00',67.89);
INSERT INTO merchant_transaction values(3,1,3,'2010-01-17 00:00:00',123.42);
INSERT INTO merchant_transaction values(4,2,1,'2010-01-18 00:00:00',401);
INSERT INTO merchant_transaction values(5,2,2,'2010-01-17 00:00:00',467.89);
INSERT INTO merchant_transaction values(6,2,3,'2010-01-20 00:00:00',876.98);
INSERT INTO merchant_transaction values(7,3,3,'2010-01-22 00:00:00',899.98);

