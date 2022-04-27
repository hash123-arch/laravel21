
<?php

include 'crud.php';

$object1 = new Crud();

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container">
    <a class="navbar-brand text-success display-4" href="index.php">Users</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Home</a>
        </li>
        <li class="nav-item text-white">
          <a class="nav-link text-white" href="about.php">About</a>
        </li>
        <li class="nav-item text-white"> 
          <a class="nav-link text-white" href="contact.php">Contact</a>
        </li>
        <li class="nav-item text-white"> 
          <a class="nav-link text-white" href="user.php">Add User</a>
        </li>
      </ul>
    </div>
   </div>
  </nav>


    <h1 class="mt-5 text-center text-warning display-4">Add User</h1>
    <div class="container mt-5">
    <form method="post" id="user_form">  
        <label>Enter First Name</label>  
        <input type="text" name="first_name" id="first_name" class="form-control" />  
        <br />  
        <label>Enter Last Name</label>  
        <input type="text" name="last_name" id="last_name" class="form-control" />  
        <br />  
        <label>Enter Age</label>  
        <input type="number" name="age" id="age" class="form-control" />  
        <br />  
        <div align="center">  
            <input type="hidden" name="action" id="action" />  
            <input type="submit" name="button_action" id="button_action" class="btn btn-danger" value="Add_User" />  
        </div>  
    </form>
 </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<script>
    $(document).ready(function(){

        $('#action').val('Add_user');

        $('#user_form').on('submit', function(event){

            event.preventDefault();

            var firstName = $('#first_name').val();

            var lastName = $('#last_name').val();

            var age = $('#age').val();

            if(firstName != '' && lastName !='' && age != '')

            {

                $.ajax({

                    url:'action.php',

                    method:'POST',

                    data:new FormData(this),

                    contentType:false,  

                    processData:false,

                    success:function(data)  
                          
                    {  
                        alert(data);

                        $('#user_form')[0].reset();  
                        
                        $('#action').val('Add_User');

                        $('#button_action').val("Add_User"); 
                    }

                });

            }
            else
            {

                alert('Please fill in all fields');

            }
        });

    });
</script>