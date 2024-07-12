
-- Table for Class 06 Notices
CREATE TABLE IF NOT EXISTS class06 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notice_title VARCHAR(100) NOT NULL,
    pdf_file VARCHAR(100) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL
);

-- Table for Class 07 Notices
CREATE TABLE IF NOT EXISTS class07 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notice_title VARCHAR(100) NOT NULL,
    pdf_file VARCHAR(100) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL
);

-- Table for Class 08 Notices
CREATE TABLE IF NOT EXISTS class08 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notice_title VARCHAR(100) NOT NULL,
    pdf_file VARCHAR(100) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL
);

-- Table for Class 09 Notices
CREATE TABLE IF NOT EXISTS class09 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notice_title VARCHAR(100) NOT NULL,
    pdf_file VARCHAR(100) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL
);

-- Table for HSC Notices
CREATE TABLE IF NOT EXISTS classhsc (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    notice_title VARCHAR(100) NOT NULL,
    pdf_file VARCHAR(100) NOT NULL,
    pdf_link VARCHAR(255) NOT NULL
);
