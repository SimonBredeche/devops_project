DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS category;

CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE  product(  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(255),  
    price INT,
    url VARCHAR(255),
    description VARCHAR(255),
    id_category INT,
    FOREIGN KEY (id_category) REFERENCES category (id)
);

CREATE TABLE  user(  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    first_name VARCHAR(255), 
    last_name VARCHAR(255),
    email VARCHAR(320),
    password VARCHAR(255)
);


INSERT INTO category(id,name) VALUES (1,"meuble");
INSERT INTO category(id,name) VALUES (2,"électronique");
INSERT INTO product(id,name,price,url,description,id_category) VALUES (1,'chaise',25,'https://cdn-prod.habitat.fr/thumbnails/product/1112/1112877/box/850/850/40/F4F4F4/chaise-en-chene-massif-bois-clair_1112877.jpg','Une belle chaise',1);
INSERT INTO product(id,name,price,url,description,id_category) VALUES (2,'bureau',50,'https://www.burolia.fr/images/products/bureaux-denomics-33411z.jpg','Un beau bureau en bois ',1); 
INSERT INTO product(id,name,price,url,description,id_category) VALUES (3,'chaise de bureau luxe',50,'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80','Un beau bureau en bois ',1); 
INSERT INTO product(id,name,price,url,description,id_category) VALUES (4,'Mixeur',50,'https://images.unsplash.com/photo-1585515320310-259814833e62?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80','Mixeur low price hit tech ',2);
INSERT INTO product(id,name,price,url,description,id_category) VALUES (5,'Lave linge',50,'https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80','Lave linge luxe multi options',2);