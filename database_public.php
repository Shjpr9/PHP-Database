<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// databese structure:
// id, username, last_message, times_used
// you should change it to your own db structure. 
// Wherever you see ch_stc, it means you should change the structure  




//well it inserts a new row as it says...
function dbInsert($id, $username, $last_message, $times_used){ //ch_stc
    global $conn;
    //ch_stc
    $sql = "INSERT INTO users (id, username, last_message, times_used) 
    VALUES ('".$id."', '".$username."', '".$last_message."', '".$times_used."')"; //ch_stc

    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return $conn->error;
    }
}

//update $field with $data for $id
function dbUpdate($id, $field, $data){
  global $conn;
  $sql = "UPDATE users SET ".$field."='".$data."' WHERE id=".$id;
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return $conn->error;
  }
}

//check if a user (id) exists in database
//returns true or false
function dbCheck($id){
  global $conn;
  $sql = "SELECT * FROM users WHERE id = '".$id."'";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
}

//find a user (id) from database and return its parameters
//usage:  $username = dbFind($user_id)['username'];
function dbFind($id){
  global $conn;
  $sql = "SELECT * FROM users WHERE id = '".$id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row;
  } else {
    return false;
  }
}

//get all rows from database and return their id as an array
//usage: foreach(findAll() as $user){
//  echo $user;
//}
function findAll(){
  global $conn;
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  $fetched_users = [];
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($fetched_users, $row['id']); //change id to whatever you want it to return. I think you know how to use arrays :)
    }
  }
  return $fetched_users;
}
?>
