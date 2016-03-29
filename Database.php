<?php

require_once "config.php"; 

class Database {

  // Legacy Code
  // private $db_servername = "localhost";
  // private $db_user = "root";
  // private $db_password = "";
  // private $db_name = "Greek"; 

  private $db; 

  // Constructor 
  public function __construct() {
    $this->connect(); 

  }

  // Setup sql connection
  private function connect() {

    $servername = DB_SERVERNAME;
    $dbname = DB_NAME;

    try {
      $this->db = new PDO("mysql:host=$servername; dbname=$dbname", DB_USER, DB_PASSWORD); 
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die(); 
    }
  }

  public function addItem($item){
    // Create ordinal array if the passed in array is key/value pair
    if ( isset($item["name"])) {
      $item = array(
        $item["name"],
        $item["sku"],
        $item["price"],
        $item["category"],
        $item["menu"],
        $item["description"],
        $item["file_path"]
      );
    }

    $sql = "INSERT INTO items ( name, sku, price, category, menu, description, file_path) VALUES ( ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($item); 
   
  }

  public function deleteItem($sku){

    $sql = "DELETE FROM items WHERE sku = :sku";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array(":sku" => $sku)); 

  }

  public function viewItem($sku){

    $sql = "SELECT name, sku, price, category, menu, description, file_path FROM items WHERE sku = :sku"; 
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array(":sku" => $sku));

    return $stmt->fetch(PDO::FETCH_NUM); 

  }

  public function updateItem($sku, $item){

    if ( isset($item["name"]))
      $item = array(
        $item["name"], 
        $item["sku"], 
        $item["price"], 
        $item["category"], 
        $item["menu"], 
        $item["description"], 
        $item["file_path"],
        $sku
        ); 

    $sql = "UPDATE items SET name = ?, sku = ?, price = ?, category = ?, menu = ?, description = ?, file_path = ? WHERE sku = ?"; 
    $stmt = $this->db->prepare($sql);
    $stmt->execute($item); 

  }

  public function uncategorizeItem($sku){

    $sql = "UPDATE items SET category = 'Uncategorized' WHERE sku = :sku";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array(":sku" => $sku));
  }

  public function viewItems($category = null){

    if ( $category == null){
      $sql = "SELECT name, sku, price, category, menu, description, file_path FROM items";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
    } else {
      $sql = "SELECT items.name, sku, price, category, menu, items.description, file_path 
              FROM items LEFT JOIN categories ON items.category = categories.name WHERE categories.id = :category";
      $stmt = $this->db->prepare($sql);
      $stmt->execute(array(":category" => $category));
    }

    return $stmt->fetchAll(PDO::FETCH_NUM); 

  }

  public function addCategory($category){

    if ( isset($category["name"])) {
      $category = array(
        $category["name"],
        $category["description"]
      );
    }

    $sql = "INSERT INTO categories ( name, description) VALUES ( ?, ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($category);

  }

  public function deleteCategory($id){

    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array(":id" => $id));

  }

  public function viewCategory($id){

    $sql = "SELECT id, name, description FROM categories WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(array(":id" => $id));

    return $stmt->fetch(PDO::FETCH_NUM);
  }

  public function updateCategory($id, $category){

    if ( isset($category["name"])) {
      $category = array(
        $category["name"],
        $category["description"],
        $id
      );
    }

    $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($category);

  }

  public function viewCategories(){

    $sql = "SELECT id, name, description FROM categories";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_NUM);

  }

  public function getColumnNames($table){
    
    $stmt = $this->db->prepare("SELECT * FROM information_schema.columns WHERE table_schema = 'greek' AND table_name = :table"); 
    $stmt->bindParam(':table', $table); 
    $stmt->execute();

    $columnData = $stmt->fetchAll();
    $columnNames = array();

    foreach($columnData as $arg){
      $columnNames[] = $arg["COLUMN_NAME"];
    }

    return $columnNames;

  }

  public function getAdmin($user){
    $stmt = $this->db->prepare("SELECT * FROM admin WHERE user = :user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
//
//$tmparray = array(
//  "name" => "ItemLive",
//  "sku" => 125,
//  "price" => 555,
//  "category" => "burgers",
//  "menu" => "MenuLive",
//  "description" => "DescriptionLive",
//  "file_path" => "FilePath"
//);
//
//$tmparray2 = array( "ItemLive", 127, 543, "burgers", "ItemLive", "ItemLive", "ItemLive"
//  );
//
//$tmparray3 = array( "ItemLive", 128, 666, "burgers", "ItemLive", "ItemLive", "ItemLive"
//  );
//
//$tmparray4 = array(
//  "name" => "The First Item",
//  "sku" => 123,
//  "price" => 777,
//  "category" => "The First Item",
//  "menu" => "The First Item",
//  "description" => "The First Item",
//  "file_path" => "The First Item"
//);
//
//$tmparray5 = array(
//  "name" => "The First Item",
//  "sku" => 129,
//  "price" => 777,
//  "category" => "The Second Item",
//  "menu" => "The Second Item",
//  "description" => "The Second Item",
//  "file_path" => "The Second Item"
//);
//
//$tmpCategory = array('lunch', 'this is the lunch food to expire soon'
//);
//
//$tmpCategory2 = array(
//  "name" => "burgers",
//  "description" => "this is a category composed of burgers"
//);

//$test = new Database();
//$test->addItem($tmparray);
//$test->addItem($tmparray2);
//$test->addItem($tmparray3);
//$test->addItem($tmparray4);
//$test->updateItem(123, $tmparray5);
//$test->deleteItem(127);

//$test->deleteCategory("burgers");
//
//$test->addCategory($tmpCategory);
//echo var_dump($test->viewCategories()) . "<br/><br/>";
//$test->updateCategory("lunch", $tmpCategory2);
//echo var_dump($test->viewCategories()) . "<br/><br/>";


//echo var_dump($test->viewCategories()) . "<br/>";
//$test->deleteCategory("lunch");
//echo var_dump($test->viewCategories()) . "<br/>";
//
//echo var_dump($test->viewItems("burgers")) . "<br/><br/>";

//echo var_dump($test->getAdmin("admin"));

// $tmpallitems = $test->viewItems();

// $tmpitem = $test->viewItem(123);

// $tmpcolumnnames = $test->getColumnNamesItems();

// echo var_dump($tmpitem);
// echo var_dump($tmpallitems);
// echo var_dump($tmpcolumnnames);