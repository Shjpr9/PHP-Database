<?php
$servername = "sql5.freesqldatabase.com";
$username = "sql5503576";
$password = "M3T8LPuIYa";
$dbname = "sql5503576";
// Create connection
// databese structure:
//  chat_id, username, last_message, times_used
$conn = new mysqli($servername, $username, $password, $dbname);


function dbInsert($chat_id, $username, $last_message, $times_used){
    global $conn;
    $sql = "INSERT INTO users (chat_id, username, last_message, times_used)
    VALUES ('".$chat_id."', '".$username."', '".$last_message."', '".$times_used."')";

    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return $conn->error;
    }
}

function dbUpdate($chat_id, $field, $data){
  global $conn;
  $sql = "UPDATE users SET ".$field."='".$data."' WHERE chat_id=".$chat_id;
  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return $conn->error;
  }
}

function dbCheck($chat_id){
  global $conn;
  $sql = "SELECT * FROM users WHERE chat_id = '".$chat_id."'";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
}

function dbFind($chat_id){
  global $conn;
  $sql = "SELECT * FROM users WHERE chat_id = '".$chat_id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row;
  } else {
    return false;
  }
}

function findAll(){
  global $conn;
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  $fetched_users = [];
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($fetched_users, $row['chat_id']);
    }
  }
  return $fetched_users;
}
?>