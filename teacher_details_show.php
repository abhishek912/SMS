<head>
  <script src="jquery-3.4.1.slim.js"></script>
  <script >
    $(document).ready(function(){
      $('input[type="button"]').click(function(){
        //alert(this.id);
        var url = "http://localhost/SMS/teacher_details_edit.php?id="+this.id;
        //alert(url);
        window.location.href=url;
      });
    });
  </script>
</head>

<?php
require 'config.php';

try {
    $stmt = $conn->prepare("SELECT *FROM teacher");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if($result)
    {
      echo "<body><u><h1 align='center'>TEACHER RECORDS</h1></u>";
      echo "<table border='1' align='center'>";
      echo "<tr><th>ENROLL No.</th><th>NAME</th><th>DOB</th><th>CONTACT</th><th>EMAIL</th><th>QUALIFICATION</th><th>ADDRESS</th>
            <th>STATUS</th><th>PASSWORD</th><th>CLASS</th><th>SECTION</th><th>IMAGE</th><th>ACTIVE</th><th>MODIFY</th></tr>";

      foreach($stmt->fetchAll() as $itr)
      {
        if($itr['t_active']=='false')
          echo "<tr bgcolor='gray'>";
        else
          echo "<tr>";
        foreach($itr as $var)
        {
          if($var)
            echo "<td>".$var."</td>";
          else
            echo "<td>None</td>";
        }
        if($itr['t_active']=='true')
          echo "<td align='center'><input type='button' id='".$itr["t_enrol_no"]."' value='Edit'></td>";
        else
          echo "<td align='center'><input type='button' id='".$itr["t_enrol_no"]."' value='Edit' disabled></td>";
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