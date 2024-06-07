
CREATE DATABASE gestion_consultations;

USE gestion_consultations;

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    results TEXT,
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);
-- Table pour stocker les informations des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Stocker les mots de passe de manière sécurisée (hash)
    email VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Table pour stocker les données médicales des patients
CREATE TABLE medical_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    date DATETIME,
    diagnosis TEXT,
    treatment TEXT,
    CONSTRAINT FK_patient_id FOREIGN KEY (patient_id) REFERENCES patients(id)
);
CREATE DATABASE medical_history;

USE medical_history;

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE medical_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    visit_date DATE NOT NULL,
    exam_results TEXT,
    prescribed_treatments TEXT,
    medical_recommendations TEXT,
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);
-- Nombre total d'utilisateurs
SELECT COUNT(*) AS total_users FROM users;

-- Nombre total de publications
SELECT COUNT(*) AS total_posts FROM posts;

-- Nombre total de commentaires
SELECT COUNT(*) AS total_comments FROM comments;

-- Nombre total de likes
SELECT COUNT(*) AS total_likes FROM likes;
CREATE DATABASE NotificationsDB;

USE NotificationsDB;

CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    notificationType VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);