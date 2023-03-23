
-- Database creation

-- DROP DATABASE IF EXISTS pizza_mco;
CREATE DATABASE IF NOT EXISTS pizza_mco;

USE pizza_mco;

-- creation of tables
CREATE TABLE ingredients (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE pizzas (
    id INT NOT NULL AUTO_INCREMENT,
    pizza_name VARCHAR(25) NOT NULL,
    price DECIMAL(10,2) ,
    PRIMARY KEY (id)
    
);

CREATE TABLE pizza_ingredients (
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  pizza_id INT NOT NULL,
  ingredient_id INT NOT NULL,
  FOREIGN KEY (pizza_id) REFERENCES pizzas(id) ON DELETE CASCADE,
  FOREIGN KEY (ingredient_id) REFERENCES ingredients(id) ON DELETE CASCADE
);

-- insert of data

INSERT INTO ingredients (name, price)
VALUES
    ('tomato', 0.5),
    ('sliced mushrooms', 0.5),
    ('feta cheese', 1.0),
    ('sausages', 1.0),
    ('sliced onion', 0.5),
    ('mozzarella cheese', 0.5),
    ('oregano', 1.0),
    ('pepperoni', 1.0),
    ('olives', 0.5),
    ('ham', 1.0);

INSERT INTO pizzas (pizza_name, price)
VALUES 
  
    ('Margarita base', null),
    ('Hawai', null);


INSERT INTO pizza_ingredients (pizza_id, ingredient_id)
VALUES
  (1, 2),
  (1, 3),
  (2, 2),
  (2, 5),
  (2, 2),
  (2, 2);
  


/*
INSERT INTO pizza_ingredients (pizza_id, ingredient_id)
VALUES
  (1, (SELECT ingredient_id FROM ingredients WHERE name = 'tomato')),
  (1, (SELECT ingredient_id FROM ingredients WHERE name = 'mozzarella cheese')),
  (2, (SELECT ingredient_id FROM ingredients WHERE name = 'tomato')),
  (2, (SELECT ingredient_id FROM ingredients WHERE name = 'mozzarella cheese')),
  (2, (SELECT ingredient_id FROM ingredients WHERE name = 'ham')),
  (2, (SELECT ingredient_id FROM ingredients WHERE name = 'sliced mushrooms'))

*/

/*
UPDATE pizzas p
SET price = (
SELECT SUM(i.price)
FROM ingredients i
JOIN pizza_ingredients pi ON pi.ingredient_id = i.id
WHERE pi.pizza_id = p.pizza_id
);
*/