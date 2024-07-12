
-- Create the income table
CREATE TABLE income (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255),
    date DATE NOT NULL
);

-- Create the expense table
CREATE TABLE expense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255),
    date DATE NOT NULL
);
