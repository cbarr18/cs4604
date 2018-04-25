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

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
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
              <h5>Super-Server Dependents: </h5>

               <?php
                $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                if($dbconnect) {
                  echo "connected \n";
                }
                else {
                  'connection error';
                  exit;
                }
                
                $result = pg_query("SELECT P2.product_id, P2.title, P2.type, P2.year_purchased, P2.serial_number 
                                    FROM products AS P1, products AS P2, depends_on AS D
                                    WHERE P1.title = 'super-server' AND D.owner = P1.product_id AND D.dependent = P2.product_id
                                    ORDER BY P2.product_id;");
               if(!$result) {
                  echo "An error occured.\n";
                  exit;
                }
                echo '<table>
                      <thead>
                        <tr>
                            <th>Product ID (products_id int)</th>
                            <th>Product Name (title varchar(50))</th>
                            <th>Product Type (type varchar(10))</th>
                        </tr>
                      </thead>
                      <tbody>';

                while ($row = pg_fetch_array($result)) {
                 echo       "<tr><td>",$row[0],"</td>";
                 echo          "<td>", $row[1], "</td>";
                 echo          "<td>", $row[2],"</td></tr>";
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

  </body>
</html>
