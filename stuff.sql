1 SELECT name FROM `products`;

2 SELECT name,price from products;

3 SELECT name,price from products WHERE price <= 200;

4 SELECT * FROM products WHERE price >= 60 AND price <= 120;

5 SELECT name, price * 100 from products;

6 SELECT AVG(price) from products;

7 SELECT AVG(price) from products WHERE manufacturer = 46;

8 SELECT COUNT(name) FROM products WHERE price >= 180;

9 SELECT name,price from products WHERE price >= 180 ORDER BY price DESC, name;

10 SELECT * from products JOIN manufactures on manufactures.id = manufacturer;

11 SELECT products.name, products.price, manufactures.name from products JOIN manufactures on manufactures.id = manufacturer;

12 SELECT AVG(Price), manufacturer from products GROUP BY manufacturer;

13 SELECT AVG(Price), manufactures.name from products JOIN manufactures on manufactures.id = manufacturer GROUP BY manufacturer.Name;

14 SELECT min(price),name FROM products;
14.	SELECT name,price FROM Products ORDER BY price ASC LIMIT 1?

15 INSERT INTO products(name,price,manufacturer) VALUES('Luidsprekers',70,2);

16 UPDATE products SET name='Laser Printer' WHERE id = 8;

17 UPDATE products SET price = price *.9;

18 UPDATE products SET price = price *.9 WHERE price >= 120;