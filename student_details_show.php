<head>
  <script src="jquery-3.4.1.slim.js"></script>
  <script >
    $(document).ready(function(){
      $('input[type="button"]').click(function(){
        //alert(this.id);
        var url = "http://localhost/SMS/student_details_edit.php?id="+this.id;
        //alert(url);
        window.location.href=url;
      });
    });
  </script>
</head>

<?php
require 'config.php';

try {
    $stmt = $conn->prepare("SELECT *FROM student");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($result)
    {
      echo "<body><u><h1 align='center'>STUDENT RECORDS</h1></u>";
      echo "<table border='1' align='center'>";
      echo "<tr><th>ADMIN No.</th><th>NAME</th><th>DOB</th><th>FATHER'S NAME</th><th>MOTHER'S NAME</th><th>CONTACT</th><th>EMAIL</th><th>CLASS</th><th>SECTION</th><th>ROLL No.</th><th>ADDRESS</th>
            <th>PASSWORD</th><th>IMAGE</th><th>MODIFY</th></tr>";

      foreach($stmt->fetchAll() as $itr)
      {
        echo "<tr>";
        foreach($itr as $var)
        {
          if($var)
            echo "<td>".$var."</td>";
          else
            echo "<td>None</td>";
        }
        echo "<td align='center'><input type='button' id='".$itr["s_admin_no"]."' value='Edit'></td>";
        echo "</tr>";
      }
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table></body>";
?>