CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    design_id INT NOT NULL,
    completed BOOLEAN DEFAULT 0,
    FOREIGN KEY (design_id) REFERENCES design_configs(id) ON DELETE CASCADE
);
