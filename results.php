<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Group_CB - Ad-hoc Search Results</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="indigo lighten-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Content Management Database</a>
    </div>
  </nav>

  <div class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <h1 class="header center white-text text-lighten-2">Group_CB</h1>
        <div class="row center">
          <h5 class="header col s12 light">Team Members: Chris Barranco and Christine Bodenheimer</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">
        <div class="row">
            <div class="row">
              <h5>Results: </h5>

              <?php
                $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                if(!$dbconnect) {
                  echo 'connection error';
                  exit;
                }
                $query = $_POST["query_adhoc"];

                if(strpos($query, 'DROP') !== false || strpos($query, 'ALTER') !== false || strpos($query, 'CREATE') !== false ||
                  strpos($query, 'UPDATE') !== false || strpos($query, 'INSERT') !== false) {
                    echo "Invalid Command -- Query must be a SELECT Statement";
                    exit; 
                }
               
               $result = pg_query($query);
               if(!$result) {
                  echo "Query Not Found -- try another SELECT statement\n";
                  exit;
                }
                $num_fields = pg_num_fields($result);
                echo "<table>
                        <thead>
                          <tr>";

                for($i = 0; $i < $num_fields; $i++) {
                    echo "<th>";
                    echo pg_field_name($result, $i);
                    echo "</th>";
                }

                echo "</tr></thead><tbody>";
                while($row = pg_fetch_array($result)){
                  echo "<tr>";
                  for($j = 0; $j < $num_fields; $j++) {
                      echo "<td>", $row[$j] , "</td>";
                  }
                  echo "</tr>";
                }
                  echo '</tbody></table>';           

                     
                 pg_free_result($result);
                 pg_close($dbconnect);

                ?>


              
            </div>     
        </div>
    </div>
  </div>

  <footer class="page-footer indigo">

    <div class="footer-copyright">
      <div class="container">
    CS4604 - Content Management Database Project
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
