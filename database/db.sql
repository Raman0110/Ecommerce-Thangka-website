CREATE TABLE categories (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) UNIQUE
);
CREATE TABLE products (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255),
    Description TEXT,
    Price DECIMAL(10, 2),
    Dimensions VARCHAR(50),
    Image_URL VARCHAR(255),
    Date DATE,
    Category_ID INT,
    FOREIGN KEY (Category_ID) REFERENCES categories(ID)
);
CREATE TABLE blogCategories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE
);
CREATE TABLE blogs(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    categoryId int,
    FOREIGN KEY (categoryID) REFERENCES blogCategories(id),
    description text,
    Date DATE,
    image varchar(255)
);