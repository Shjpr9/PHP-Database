# PHP-Database
An easy to use code to manage your database

Available functions:

1.

     dbInsert($id, $username, $last_message, $times_used)
well it inserts a new row as it says...

2.

     dbUpdate($id, $field, $data)
update $field with $data for $id

3.

     dbCheck($id)
check if a user (id) exists in database. 
returns true or false

4.

     dbFind($id)
find a user (id) from database and return its parameters

example:  $username = dbFind($user_id)['username'];
     
     
5.

     findAll()
get all rows from database and return their id as an array. 
example: 

foreach(findAll() as $user){

  echo $user;
  
}

# Don't forget to change the structure wherever it says ch_stc
"id" is a unique parameter and your database should have "id" column
