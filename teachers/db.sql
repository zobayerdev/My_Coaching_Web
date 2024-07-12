CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT,
    mobile_number VARCHAR(15),
    salary DECIMAL(10,2),
    address VARCHAR(255),
    position VARCHAR(100),
    image_path VARCHAR(255)
);
