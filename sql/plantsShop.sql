/*1. データベース「interest」を作成する*/
CREATE DATABASE plantsshop;

/*2. カレントデータベースを「interest」に設定する*/
USE plantsshop;

/*3. テーブル「User」を作成する*/
CREATE TABLE Users (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255),address VARCHAR(255));

CREATE TABLE `order` (order_id INT AUTO_INCREMENT PRIMARY KEY,user_id INT,merchandise_id INT,purchase INT, pieces INT);

/*4. テーブル「merchandise」を作成する*/
CREATE TABLE merchandise (merchandise_id INT AUTO_INCREMENT PRIMARY KEY,merchandise VARCHAR(255),price INT);

INSERT INTO merchandise (merchandise_id, merchandise, price) VALUES (1, 'アオダモ', 10000),(2, 'モミジ', 9000);

