<?php

include 'crud.php';

$object = new Crud();

if(isset($_POST['action'])) #checks whether action variable is set or not
{


    if($_POST['action'] == 'load')
    {
        echo $object->get_data_in_table("SELECT * FROM users ORDER BY id ASC");

        
    }

    if($_POST['action'] == 'Add_user')
    {
        $first_name = mysqli_real_escape_string($object->connect,$_POST['first_name']); #This function is used to create a legal SQL string that can be used in an SQL statement.

        $last_name = mysqli_real_escape_string($object->connect,$_POST['last_name']);

        $age = mysqli_real_escape_string($object->connect,$_POST['age']);

        $query = "INSERT INTO users(first_name,last_name,age) VALUES ('".$first_name."','".$last_name."','".$age."')";

        $object->execute_query($query);

        echo 'User Data Inserted';




    }

    if($_POST['action'] == 'Fetch Single Data')

    {


        $output = '';

        $query = "SELECT * FROM users WHERE id = '".$_POST["user_id"]."'";

        $result = $object->execute_query($query);

        while($row = mysqli_fetch_array($result))

        {

            $output["first_name"] = $row['first_name'];

            $output["last_name"] = $row['last_name'];
            
            $output["age"] = $row['age'];

        }

        echo json_encode($output); # will convert array data into json format and sent to ajax call back


    }

    if($_POST['action'] == 'Edit')

    {
        $first_name = mysqli_real_escape_string($object->connect,$_POST['first_name']); #This function is used to create a legal SQL string that can be used in an SQL statement.

        $last_name = mysqli_real_escape_string($object->connect,$_POST['last_name']);

        $age = mysqli_real_escape_string($object->connect,$_POST['age']);

        $query = "UPDATE users SET first_name = '".$first_name."', last_name = '".$last_name."', age = '".$age."' WHERE id = '".$_POST["user_id"]."'";  

        $object->execute_query($query);

        echo 'Data Updated';  

    }




}

?>