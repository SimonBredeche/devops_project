CREATE TABLE IF NOT EXISTS product(  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(255),  
    price INT,
    url VARCHAR(255)
);

INSERT IGNORE INTO product(id,name,price,url) VALUES (1,'chaise',25,'https://cdn-prod.habitat.fr/thumbnails/product/1112/1112877/box/850/850/40/F4F4F4/chaise-en-chene-massif-bois-clair_1112877.jpg');
INSERT IGNORE INTO product(id,name,price,url) VALUES (2,'bureau',50,'https://www.burolia.fr/images/products/bureaux-denomics-33411z.jpg'); 