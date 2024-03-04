<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Create Table MySQL DATABASE</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 550px;
            border-radius: 15px;
            border: 1px solid;
            box-shadow: 2px 2px 4px;
            padding: 20px;
        }

        #btn {
            font-size: 15px;
            background-color: #B6D7A8;
            border-radius: 12px;
            border: none;
            padding: 20px 24px;
        }

        #success {
            color: green;
            font-size: 20px;
        }

        #failed {
            color: red;
            /* font-size: 20px; */
        }
        .form {
            /* display: flex; */
            /* flex-direction: column; */
            font-size: 18px;
        }
        .inputtext {
            border-radius: 7px;
            font-size: 15px;
            border: 1px solid;
            padding: 5px;
        }
        
    </style>
</head>

<body>
  <?php 
  $crSuccess = $crFailed = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST["submit"])){ 
            $table_name =$_POST["tableName"];
            $column1 = $_POST["column1"];
            $column2 = $_POST["column2"];
            $column3 = $_POST["column4"];
            $column4 = $_POST["column5"];
            $column5 = $_POST["column3"];
            $servername="localhost";
            $username= "root";
            $password= "";
            try{
                $conn = new PDO("mysql:host=$servername;dbname=solidatabase", $username, $password);
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                $crea = "CREATE TABLE $table_name(
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        $column1 VARCHAR(30) NOT NULL,
                        $column2 VARCHAR(30) NOT NULL,
                        $column3 VARCHAR(30) NOT NULL,
                        $column4 VARCHAR(30) NOT NULL,
                        $column5 VARCHAR(30) NOT NULL,
                        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        )";
                $conn -> exec($crea);

                $crSuccess = "Table $table_name created successfully.";
            }catch(PDOException $e){
              $crFailed = "Error creating table. " . $e->getMessage();
            }
            $conn = null;
        }
    }
?>
    <div class="container">
<h1>PHP Create a Table In Database</h1>
    <form  method="POST" action="" >
    <label for="">TableName :</label>
    <input class="inputtext" type="text" name="tableName" ><br><br>
    <label for="">Column 1 :</label>
    <input class="inputtext" type="text" name="column1" ><br><br>
    <label for="">Column 2 :</label>
    <input class="inputtext" type="text" name="column2"><br><br>
    <label for="">Column 3 :</label>
    <input class="inputtext" type="text" name="column3"><br><br>
    <label for="">Column 4 :</label>
    <input class="inputtext" type="text" name="column4"><br><br>
    <label for="">Column 5 :</label>
    <input class="inputtext" type="text" name="column5"><br><br>
    <button type="submit" name="submit" id="btn" value="Create Table">Create Table</button><br><br>
    <p id="success"><?php echo $crSuccess?></p>
    <p id="failed"><?php echo $crFailed?></p>
    </form>
    
</div>
</body>

</html>