<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Use The WHERE Clause</title>
    <style>
    *{
      margin: 0;
      padding: 0;
    }
    body{
      height: 100vh;
      width: 100vw;
      display: flex;
      align-items: center;
      flex-direction: column;
    }
    #btn {
          font-size: 15px;
          background-color: #B6D7A8;
          border-radius: 8px;
          border: none;
          padding: 5px 60px;
    }
    #input {
          font-size: 15px;
          border-radius: 8px;
          border: 1px solid;
          padding: 5px 60px;
    }
    
    table {
      border-collapse: collapse;
      width: 80%; 
    }

    table td, table th {
      border: 1px solid ;
      padding: 8px;
    }

table tr:hover {background-color: lightgrey;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #ddd;
}

    </style>
</head>
<body>
    <br>
    <h1>PHP MySQL Use The WHERE Clause</h1><br>
    <form method="post">
      <input type="text" name="input" id="input" placeholder="Firstname"></input>
      <input type="submit" name="submit" id="btn" value="Select"></input>
    </form>
    <br>
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th>Origine</th>
        <th>Email</th>
      </tr>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solidatabase";
$tablename = "stagiaires";
$input = $_POST["input"];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, firstName, lastName, city, origine, email FROM $tablename WHERE firstName = '$input'");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
?>

</body>
</html>