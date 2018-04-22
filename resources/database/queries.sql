\! echo Query 1: List name and emails of customers who gave an item review \(sentiment\) below 3
SELECT firstname, lastname, email
FROM customers
WHERE custID IN (
    SELECT customer
    FROM orders
    WHERE orderId IN
    (
        SELECT orderId
        FROM orderLineItems
        WHERE lineId IN
        (
            SELECT lineId
            FROM reviewedItems
            WHERE sentiment < 3
        )
    )
);

\! echo Query 2: List name of staff who shipped orders late, and how many times it occured \(late is 2 or more days after expectedShipDate\)
SELECT firstname, lastname, COUNT(DISTINCT pickId) as TimesLate
FROM staff
LEFT JOIN shipments on staffId = packer
LEFT JOIN pickedLineItems on pickId=pick
WHERE datediff(actualShipDate, expectedShipDate) > 1
GROUP BY firstName, lastName;


\! echo Query 3: List the most ordered grind
SELECT grind as most_ordered_grind
from orderLineItems
GROUP BY grind
HAVING SUM(orderQuantity) = (
    SELECT MAX(sums.num)
    FROM (
        SELECT grind, SUM(orderQuantity) as num
        FROM orderLineItems
        GROUP BY grind
    ) sums
);

\! echo Query 4: List the beanIds having average order quantities greater than 4 and the customers who ordered them
SELECT beanId, customer, AVG(orderQuantity) as average_order_quantity
FROM orderLineItems
LEFT JOIN orders on orderLineItems.orderId = orders.orderId
GROUP BY beanId, customer
HAVING AVG(orderQuantity) > 4;

\! echo Query 5: List the name, city, and email of customers who bought beanId 1
SELECT firstname, lastname, city, email
FROM customers
WHERE custId
IN (
    SELECT customer
    FROM orders
    WHERE orderId IN (
        SELECT orderId
        FROM orderLineItems
        WHERE beanId = 1
    )
);

\! echo Query 6: List the orderIds that were reviewed as damaged shipments
SELECT DISTINCT orderId
FROM orderLineItems
WHERE lineId IN (
    SELECT lineId
    FROM pickedLineItems
    WHERE pick IN (
        SELECT pick
        FROM reviewedShipments
        WHERE notes LIKE '%damage%'
    )
);

\! echo Query 7: List the supervisors of staff whose supervisee shipped orders late, and how many times it occured \(late is 2 or more days after expectedShipDate\)
SELECT supervisor
FROM supervises
WHERE supervisee IN (
    SELECT suped.staffId FROM (
        SELECT staffId, firstname, lastname, COUNT(DISTINCT pickId) as TimesLate
        FROM staff
        LEFT JOIN shipments on staffId = packer
        LEFT JOIN pickedLineItems on pickId=pick
        WHERE datediff(actualShipDate, expectedShipDate) > 1
        GROUP BY staffId, firstName, lastName
    ) suped
);

\! echo Query 8: List the warehouse with the quickest average pick to ship date \(actualShipDate - expectedShipDate\)
SELECT warehouse
FROM shipments
LEFT JOIN pickedLineItems ON pick = shipments.pickId
GROUP BY warehouse
HAVING Avg(actualShipDate - expectedShipDate) = (
    SELECT MIN(avgs.num)
    FROM (
        SELECT warehouse, AVG(actualShipDate - expectedShipDate) as num
        FROM shipments
        LEFT JOIN pickedLineItems on pick = pickID
        GROUP BY warehouse
    ) avgs
);


\! echo Query 9: List the most ordered beanId 
SELECT beanId as most_ordered_beanId
from orderLineItems
GROUP BY beanId
HAVING SUM(orderQuantity) = (
    SELECT MAX(sums.num)
    FROM (
        SELECT beanId, SUM(orderQuantity) as num
        FROM orderLineItems
        GROUP BY beanId
    ) sums
);

\! echo Query 10: List the least ordered beanIds
SELECT beanId as least_ordered_beanId
from orderLineItems
GROUP BY beanId
HAVING SUM(orderQuantity) = (
    SELECT MIN(sums.num)
    FROM (
        SELECT beanId, SUM(orderQuantity) as num
        FROM orderLineItems
        GROUP BY beanId
    ) sums
);
