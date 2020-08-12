<?php

class DB {
  public $host = 'localhost';
  public $user = 'root';
  public $pass = '';
  public $dbname = 'acrud';
  public $conn;
  public $table = 'users';

  function __construct(){
     $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
  }

  function create(){
    $sql = "create table $this->table (id int(11) primary key auto_increment,title varchar(200),content text,created_at timestamp)";
    if ($this->conn->query($sql)) {
      return 'Create Table success fully !';
    } else {
      return 'Table already created !';
    }
  }

  function insert(){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "insert into $this->table (title,content) values ('".$title."','".$content."') ";
    if ($this->conn->query($sql)) {
      return "Table Created !";
    } else {
      return 'Title Not Created !';
    }
  }

  function select(){
    $sql = "select * from $this->table ORDER BY id DESC";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_all();
    } else {
      return false;
    }
  }

  function select_single($id){
    $sql = "select * from $this->table where id = $id";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return false;
    }
  }

  public function update(){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $sql = "update $this->table set title = '".$title."', content = '".$content."' where id = '".$id."'";
    if ($this->conn->query($sql)) {
      return 'Update row success fully !';
    } else {
      return 'no row updated !';
    }
  }

  public function delete(){
    $id = $_POST['id'];
    $sql = "delete from $this->table where id = '".$id."' ";
    if ($this->conn->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}




?>
