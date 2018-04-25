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
              <h5>Products Table: </h5>
                 <?php
                  $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                  if($dbconnect) {
                    echo "connected \n";
                  }
                  else {
                    'connection error';
                    exit;
                  }
                  
                  $result = pg_query("SELECT product_id, title, type, serial_number, year_purchased, last_changed FROM products");
                  if(!$result) {
                    echo "An error occured.\n";
                    exit;
                  }
                  echo '<table>
                        <thead>
                          <tr>
                              <th>Product ID (product_id int)</th>
                              <th>Title (title varchar(50))</th>
                              <th>Type (type varchar(10))</th>
                              <th>Serial #  (serial_number int)</th>
                              <th>Year Purchased (year_purchased char(4))</th>
                              <th>Last Changed (last_changed timestamp)</th>
                          </tr>
                        </thead>
                        <tbody>';

                  while ($row = pg_fetch_array($result)) {
                   echo      "<tr><td>",$row[0],"</td>";
                   echo          "<td>", $row[1], "</td>";
                   echo          "<td>", $row[2], "</td>";
                   echo          "<td>", $row[3], "</td>";
                   echo          "<td>", $row[4], "</td>";
                   echo          "<td>", $row[5],"</td></tr>";
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
