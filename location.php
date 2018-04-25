<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Group_CB - Home</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>


  <div class="container">
    <div class="section">
        <div class="row">
            <div class="row">
              <h5>Location Table: </h5>  
              <?php
                $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                if($dbconnect) {
                  echo "connected \n";
                }
                else {
                  'connection error';
                  exit;
                }
                
                $result = pg_query("SELECT l_id, office_name, address, loc_in_building FROM location");
                if(!$result) {
                  echo "An error occured.\n";
                  exit;
                }
                echo '<table>
                      <thead>
                        <tr>
                            <th>Location ID (l_id int)</th>
                            <th>Office Name (office_name varchar(50))</th>
                            <th>Address (address varchar(100))</th>
                            <th>Location in Office (loc_in_office varchar(50))</th>
                        </tr>
                      </thead>
                      <tbody>';

                while ($row = pg_fetch_array($result)) {
                 echo      "<tr><td>",$row[0],"</td>";
                 echo          "<td>", $row[1], "</td>";
                echo           "<td>", $row[2], "</td>";
                 echo          "<td>", $row[3],"</td></tr>";
                } 
                echo '</tbody></table>';           
                 pg_free_result($result);
                 pg_close($dbconnect);

                ?>
           </div>     
        </div>
    </div>
  </div>




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
