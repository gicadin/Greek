<?php

require_once "config.php";

class InitDatabase{

  private $db;

  public function __construct(){ 
    $db = $this->connect();
    $this->createDatabase();
    $this->createTables();

  }

  // Setup sql connection
  private function connect() {

    $servername = DB_SERVERNAME;

    try {
      $this->db = new PDO("mysql:host=$servername;", DB_USER, DB_PASSWORD); 
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die(); 
    }
  }

  private function createDatabase(){

    $sql = "
    CREATE DATABASE IF NOT EXISTS Greek;
    USE Greek;
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e){
      print $e->getMessage();
      die();
    }

  }

  private function createTables(){
    $this->createItemsTable();
    $this->createCategoriesTable();
    $this->createAdminTable();
    $this->createUsersTable();
    $this->createOrdersTable();

  }

  private function createItemsTable(){

    $sql = "
    DROP TABLE IF EXISTS items;
    CREATE TABLE items ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      sku INT(10) NOT NULL UNIQUE,
      price INT(10),
      category VARCHAR(255),
      menu VARCHAR(255),
      description VARCHAR(255),
      file_path VARCHAR(255)
    );
    INSERT INTO items VALUES (
      1,
      'testName',
      123,
      123,
      'testCategory',
      'testMenu',
      'testDescription',
      'testFilePath'
    );
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e) {
      print $e->getMessage();
      die();
    }

  }

  private function createCategoriesTable() {

    $sql = "
    DROP TABLE IF EXISTS categories;
    CREATE TABLE categories ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL UNIQUE,
      description VARCHAR (255)
    );
    INSERT INTO categories VALUES (
      1,
      'Uncategorized',
      'Default category for items'
    );
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e) {
      print $e->getMessage();
      die();
    }

  }

  private function createAdminTable(){

    $password = '$2y$10$xh6wRCFfDyrZdxkc0rbPS.WC0cu.9OpGRvkybuDhqGp8xLXf.nlhK';

    $sql = "
    DROP TABLE IF EXISTS admin;
    CREATE TABLE admin ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255),
      fname VARCHAR(255),
      lname VARCHAR(255),
      email VARCHAR(255) NOT NULL,
      address VARCHAR(255),
      telephone VARCHAR(255)
    );
    INSERT INTO admin VALUES (
      1,
      'admin',
      '$password',
      'John',
      'Doe',
      'BobbyJ@BigBoy.club',
      'Somewhere',
      '987-987-1234'
    );
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e) {
      print $e->getMessage();
      die();
    }

  }

  private function createUsersTable(){

    $password = '$2y$10$xh6wRCFfDyrZdxkc0rbPS.WC0cu.9OpGRvkybuDhqGp8xLXf.nlhK';

    $sql = "
    DROP TABLE IF EXISTS users;
    CREATE TABLE users ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255),
      fname VARCHAR(255),
      lname VARCHAR(255),
      email VARCHAR(255) NOT NULL,
      address VARCHAR(255),
      telephone VARCHAR(255)
    );
    INSERT INTO users VALUES (
      1,
      'admin',
      '$password',
      'John',
      'Doe',
      'BobbyJ@BigBoy.club',
      'Somewhere',
      '987-987-1234'
    );
    INSERT INTO users VALUES (
      2,
      'bobby',
      'bobby',
      'John',
      'Doe',
      'BobbyJ@BigBoy.club',
      'Somewhere',
      '987-987-1234'
    );
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e) {
      print $e->getMessage();
      die();
    }
  }

  private function createOrdersTable(){

    $sql = "
    DROP TABLE IF EXISTS orders;
    CREATE TABLE orders ( 
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user VARCHAR(255) NOT NULL,
      orders VARCHAR(255),
      totalPrice INT(20),
      date DATE
    );
    ";

    try {
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } catch (PDOException $e) {
      print $e->getMessage();
      die();
    }
  }
}

$test = new InitDatabase();