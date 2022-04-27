
<?php

#A Blueprint / foundation for an object

class Crud{

    public $connect; # we will store database connection string

    private $host = 'localhost';

    private $username = 'root';

    private $password = '';

    private $database = 'crud';


    #run database connection

    public function __construct()
    {
        $this->database_connect();
    }


    #this function is for db connect

    public function database_connect()

    {


        $this->connect = mysqli_connect($this->host , $this->username , $this->password , $this->database);


    }

    #this function is used to execute query & send result

    public function execute_query($query)

    {

        #this is a predefined function which performs a query against the database


        return mysqli_query($this->connect,$query);

    }

    #get table data

    public function get_data_in_table($query)

    {


        $output = ''; #store table data

        $result = $this->execute_query($query); #this function will execute query and store query result in $result variable

        $output .= '
        
        <table class="table table-Hover">  
        <tr>  
             <th width="10%">User ID</th>  
             <th width="25%">First Name</th>  
             <th width="25%">Last Name</th>
             <th width="20%">Age</th>  
             <th width="10%">Update</th>  
             <th width="10%">Delete</th>  
        </tr>
        
        
        ';

        while($row = mysqli_fetch_object($result)) # will fetch data as an object
        {
            $output .='
            
            <tr>       
            <td>'.$row->id.'</td>  
            <td>'.$row->first_name.'</td>  
            <td>'.$row->last_name.'</td>
            <td>'.$row->age.'</td>  
            <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></td>  
            <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
            </tr>
            
            ';
        }

          $output .='</table>';

          return $output;

    }






}




?>