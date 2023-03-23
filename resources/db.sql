
-- Database creation
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
    pizza_id INT NOT NULL AUTO_INCREMENT,
    ingredient_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (pizza_id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredients(id)
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
