<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>What is subquery in mysql</h3>
    <p>A subquery is a query that is embedded in another query.</p>
    <h3>Example from sakila DB</h3>
    <ul>
    <li>
        show title,rating of film where film id is 9:
        select title,rating from film where film_id = 9
    </li>
    <li>show title, rating of films what  fim_id 10 has rating:
        select film_id,title,rating from film where rating = (select rating from film where film_id=10)        
</li>
<li>
    SELECT title, length
FROM film
WHERE length > (SELECT AVG(length) FROM film)
ORDER BY length;
</li>
<li>
    SELECT title
FROM film
WHERE film_id IN (
    SELECT film_id
    FROM inventory
    JOIN rental ON inventory.inventory_id = rental.inventory_id
    WHERE rental.customer_id = 1
)
ORDER BY title;
</li>
<li>
    SELECT title, rental_rate
FROM film
WHERE rental_rate = (
    SELECT MIN(rental_rate)
    FROM film
);
</li>
<li>
    SELECT title, rating
FROM film
WHERE rating = (
    SELECT MAX(rating)
    FROM film
);
</li>
</ul>
</body>
</html>