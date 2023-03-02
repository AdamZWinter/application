CREATE TABLE applicants (
                            id INT(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            fname VARCHAR(32),
                            lname VARCHAR(32),
                            email VARCHAR(128),
                            phone VARCHAR(16),
                            state VARCHAR(32),
                            github VARCHAR(128),
                            experience TEXT,
                            relocate BOOLEAN,
                            bio TEXT,
                            photo VARCHAR(64)
)