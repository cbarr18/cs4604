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
              <h5>Changes Table: </h5>
                <?php
                  $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                  if(!$dbconnect) {
                    echo 'connection error';
                    exit;
                  }
                  
                  $result = pg_query("SELECT issue_id, c.product_id, title, description, date_changed FROM has_change AS c, products AS p WHERE c.product_id=p.product_id ORDER BY date_changed DESC");
                  if(!$result) {
                    echo "An error occured.\n";
                    exit;
                  }
                  echo '<table>
                        <thead>
                          <tr>
                              <th>Issue ID (issue_id int)</th>
                              <th>Product ID (product_id int)</th>
                              <th>Product Name (title varchar(10))</th>
                              <th>Description (description text)</th>
                              <th>Date Modified (date_changed timestamp)
                          </tr>
                        </thead>
                        <tbody>';

                  while ($row = pg_fetch_array($result)) {
                   echo      "<tr><td>",$row[0],"</td>";
                   echo          "<td>", $row[1], "</td>";
                   echo          "<td>", $row[2], "</td>";
                   echo          "<td>", $row[3], "</td>";
                   echo          "<td>", $row[4],"</td></tr>";
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
