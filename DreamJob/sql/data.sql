CREATE TABLE dreamjob_applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    gender VARCHAR(100) NOT NULL,
    industry VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    salary_expectation DECIMAL(10, 2) NOT NULL,
    work_type ENUM('Full-time', 'Part-time', 'Freelance') NOT NULL,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);