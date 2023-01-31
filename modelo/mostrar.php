<html>
<body>
<?php 


// $mysqli = new mysqli("localhost", $username, $password, $database); 

if (session_status()===PHP_SESSION_NONE){
    session_start();
  } 

require_once("Conexion.php");
$con = Conexion::getConection();
$sql = "SELECT * FROM Comida";
$query = $con->prepare($sql);
$query = execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

// $query = "SELECT * FROM Comida";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
          <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["col1"];
        $field2name = $row["col2"];
        $field3name = $row["col3"];
        $field4name = $row["col4"];
        $field5name = $row["col5"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>