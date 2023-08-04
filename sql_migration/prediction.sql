CREATE TABLE prediction (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    prediction_results JSON
);
