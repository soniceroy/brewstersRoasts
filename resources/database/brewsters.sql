# Matthew Foreman C00397262
# I certify that this assignment has completely been done by myself


CREATE DATABASE BREWSTERS;
use BREWSTERS;

CREATE TABLE warehouses (
    `wareId` int(9) AUTO_INCREMENT,
    `serviceCapacity` int(9),
    `streetAddress` varchar(150),
    `city` varchar(100),
    `state` char(2),
    `zip` int(5),
    PRIMARY KEY (`wareId`)
);

CREATE TABLE staff (
    `staffId` int(9) AUTO_INCREMENT,
    `firstname` varchar(25),
    `lastname` varchar(25),
    `startDate` DATE,
    `hourlyRate` FLOAT,
    `warehouse` int(9),
    PRIMARY KEY (`staffId`), 
    FOREIGN KEY (`warehouse`) REFERENCES `warehouses`(`wareId`)
);

CREATE TABLE customers (
    `custId` int(9) AUTO_INCREMENT,
    `firstname` varchar(25),
    `lastname` varchar(25),
    `streetAddress` varchar(150),
    `city` varchar(100),
    `state` char(2),
    `zip` int(5),
    `email` varchar(320),
    PRIMARY KEY (`custId`) 
);

CREATE TABLE supervises (
    `supervisor` int(9),
    `supervisee` int(9),
    PRIMARY KEY (`supervisor`, `supervisee`),
    FOREIGN KEY (`supervisor`) REFERENCES `staff`(`staffId`),
    FOREIGN KEY (`supervisee`) REFERENCES `staff`(`staffId`)
);

CREATE TABLE orders (
    `orderId` int(9) AUTO_INCREMENT,
    `orderDate` DATE,
    `customer` int(9),
    PRIMARY KEY (`orderId`),
    FOREIGN KEY (`customer`) REFERENCES `customers`(`custId`)
);

CREATE TABLE orderLineItems (
    `lineId` int(9) AUTO_INCREMENT,
    `orderQuantity` int(9),
    `grind` varchar(6),
    `orderId` int(9),
    `beanId` int(9),
    PRIMARY KEY (`lineId`),
    FOREIGN KEY (`orderId`) REFERENCES `orders`(`orderId`),
    CONSTRAINT `grind`
        CHECK (`grind` IN ("rough", "medium", "fine"))
);

CREATE TABLE shipments (
    `pickId` int(9) AUTO_INCREMENT,
    `shipQuantity` int(9),
    `shipWeight` float(9),
    `actualShipDate` DATE,
    `packer` int(9),
    PRIMARY KEY (`pickId`)
);

CREATE TABLE pickedLineItems (
    `pick` int(9),
    `lineId` int(9),
    `pickQuantity` int(9),
    `weight` float(9),
    `pickDate` DATE,
    `priority` varchar(32),
    `expectedShipDate` DATE,
    `warehouse` int(9),
    `processDate` DATE,
    `processor` int(9),
    PRIMARY KEY (`pick`, `lineId`),
    FOREIGN KEY (`pick`) REFERENCES `shipments`(`pickId`),
    FOREIGN KEY (`lineId`) REFERENCES `orderLineItems`(`lineId`),
    FOREIGN KEY (`warehouse`) REFERENCES `warehouses`(`wareId`),
    FOREIGN KEY (`processor`) REFERENCES `staff`(`staffId`)
);


# we gotsta make this go with productId
CREATE TABLE reviewedItems (
    `lineId` int(9),
    `sentiment` int(9),
    `notes` varchar(160),
    `reviewDate` DATE,
    PRIMARY KEY (`lineId`),
    FOREIGN KEY (`lineId`) REFERENCES `orderLineItems`(`lineId`)
);

CREATE TABLE reviewedShipments (
    `pick` int(9),
    `sentiment` int(9),
    `notes` varchar(160),
    PRIMARY KEY (`pick`),
    FOREIGN KEY (`pick`) REFERENCES `shipments`(`pickId`)
);


INSERT INTO warehouses (serviceCapacity, streetAddress, city, state, zip)
    VALUES (5, "123 Won Ln", "Wilmore", "KY", 50687);
INSERT INTO warehouses (serviceCapacity, streetAddress, city, state, zip)
    VALUES (5, "567 First St", "Houston", "TX", 70890);
INSERT INTO warehouses (serviceCapacity, streetAddress, city, state, zip)
    VALUES (5, "67 Turkey Ave", "Tourist", "OR", 50697);
INSERT INTO warehouses (serviceCapacity, streetAddress, city, state, zip)
    VALUES (5, "34 Sheriff Rd", "Fasta", "MO", 68439);
INSERT INTO warehouses (serviceCapacity, streetAddress, city, state, zip)
    VALUES (5, "1 One Blvd", "Soldano", "NY", 12345);

INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Bob", "Villa", '2011-07-01', 18.60, 1);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Chad", "Coolwhip", '2017-04-05', 12.23, 2);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("William", "Shatner", '2016-06-06', 18.47, 3);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Sammy", "Sosa", '2015-05-07', 45.5, 4);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Alan", "Turing", '2015-06-08', 56.6, 5);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Bel", "Bivdevo", '2015-08-15', 67.5, 1);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Susan", "Sarandon", '2014-05-13', 87.2, 2);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Amy", "Winehouse", '2013-06-15', 56.4, 3);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Army", "Hammer", '2017-08-23', 76.5, 4);
INSERT INTO staff (firstname, lastname, startDate, hourlyRate, warehouse)
    VALUES("Sally", "Fields", '2015-09-04', 76.4, 5);

INSERT INTO customers (firstname, lastname, streetAddress, city, state, zip, email)
    VALUES("Christopher", "Walken", "435 Holly Ave", "Chicago", "IL", 40356, "tomato@gmail.com");
INSERT INTO customers (firstname, lastname, streetAddress, city, state, zip, email)
    VALUES("Oprah", "Winfrey", "123 Root Dr", "San Francisco", "CA", 90345, "oprah@hotmail.com");
INSERT INTO customers (firstname, lastname, streetAddress, city, state, zip, email)
    VALUES("Jane", "Goodall", "456 Ape St", "Virginia Beach", "WV", 45676, "goodall@aol.com");
INSERT INTO customers (firstname, lastname, streetAddress, city, state, zip, email)
    VALUES("Fred", "Flinstone", "3 Rock Rd", "Helvitica", "WI", 65765, "dino@rocketmail.com");
INSERT INTO customers (firstname, lastname, streetAddress, city, state, zip, email)
    VALUES("Willie", "Nelson", "56 Seven Blvd", "Nashville", "TN", 65789, "country@gmail.com");

INSERT INTO supervises (supervisor, supervisee) VALUES (6, 5);
INSERT INTO supervises (supervisor, supervisee) VALUES (7, 4);
INSERT INTO supervises (supervisor, supervisee) VALUES (8, 3);
INSERT INTO supervises (supervisor, supervisee) VALUES (9, 2);
INSERT INTO supervises (supervisor, supervisee) VALUES (10, 1);

INSERT INTO orders (orderId, orderDate, customer) VALUES (1, '2018-01-01', 1);
INSERT INTO orders (orderId, orderDate, customer) VALUES (2, '2018-01-02', 2);
INSERT INTO orders (orderId, orderDate, customer) VALUES (3, '2018-01-03', 3);
INSERT INTO orders (orderId, orderDate, customer) VALUES (4, '2018-01-04', 4);
INSERT INTO orders (orderId, orderDate, customer) VALUES (5, '2018-01-05', 5);

INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (4, "fine", 1, 1);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (7, "rough", 1, 2);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (8, "medium", 2, 3);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (4, "fine", 2, 4);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (3, "medium", 3, 1);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (3, "medium", 3, 2);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (3, "medium", 3, 4);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (5, "rough", 4, 2);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (5, "medium", 5, 3);
INSERT INTO orderLineItems (orderQuantity, grind, orderId, beanId)
    VALUES (5, "medium", 5, 2);

INSERT INTO shipments (pickId, shipQuantity, shipWeight, actualShipDate, packer)
    VALUES (1, 11, 11, '2018-01-09', 1);
INSERT INTO shipments (pickId, shipQuantity, shipWeight, actualShipDate, packer)
    VALUES (2, 12, 12, '2018-01-08', 2);
INSERT INTO shipments (pickId, shipQuantity, shipWeight, actualShipDate, packer)
    VALUES (3, 9, 9, '2018-01-10', 3);
INSERT INTO shipments (pickId, shipQuantity, shipWeight, actualShipDate, packer)
    VALUES (4, 5, 5, '2018-01-15', 4);
INSERT INTO shipments (pickId, shipQuantity, shipWeight, actualShipDate, packer)
    VALUES (5, 10, 10, '2018-01-16', 5);

INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (1, 1, 4, 4, '2018-01-02', "normal", '2018-01-03', 1, '2018-01-04', 1);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (1, 2, 4, 4, '2018-01-02', "normal", '2018-01-03', 1, '2018-01-04', 1);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (2, 3, 8, 8, '2018-01-03', "normal", '2018-01-04', 2, '2018-01-05', 2);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (2, 4, 4, 4, '2018-01-03', "normal", '2018-01-04', 2, '2018-01-05', 2);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (3, 5, 3, 3, '2018-01-04', "normal", '2018-01-05', 3, '2018-01-06', 3);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (3, 6, 3, 3, '2018-01-04', "normal", '2018-01-05', 3, '2018-01-06', 3);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (3, 7, 3, 3, '2018-01-04', "normal", '2018-01-05', 3, '2018-01-06', 3);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (4, 8, 5, 5, '2018-01-05', "normal", '2018-01-06', 4, '2018-01-07', 4);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (5, 9, 5, 5, '2018-01-06', "normal", '2018-01-07', 5, '2018-01-08', 5);
INSERT INTO pickedLineItems (pick, lineId, pickQuantity, weight, pickDate, priority,
                                expectedShipDate, warehouse, processDate, processor
)   VALUES (5, 10, 5, 5, '2018-01-06', "normal", '2018-01-07', 5, '2018-01-08', 5);

INSERT INTO reviewedItems (lineId, sentiment, notes, reviewDate)
    VALUES (1, 3, "Good flavor. Tastes like sunshine and rainbows.", '2018-02-13');
INSERT INTO reviewedItems (lineId, sentiment, notes, reviewDate)
    VALUES (5, 4, "I am IMPRESSED.", '2018-02-28');
INSERT INTO reviewedItems (lineId, sentiment, notes, reviewDate)
    VALUES (3, 1, "Tastes like oil!", '2018-02-10');

INSERT INTO reviewedShipments (pick, sentiment, notes)
    VALUES (2, 1, "Arrived late and damaged.");
INSERT INTO reviewedShipments (pick, sentiment, notes)
    VALUES (3, 2, "Arrived damaged.");
INSERT INTO reviewedShipments (pick, sentiment, notes)
    VALUES (4, 5, "No complaints.");

