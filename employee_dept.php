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
              <h5>Employee Departments: </h5>

               <?php
                $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
                if(!$dbconnect) {
                  'connection error';
                  exit;
                }
                
                $result = pg_query("SELECT E.e_name, E.position, D.d_name 
                                    FROM employee AS E, department AS D, works_in AS W
                                    WHERE E.e_id = W.e_id AND D.d_id = W.d_id;");
               if(!$result) {
                  echo "An error occured.\n";
                  exit;
                }
                echo '<table>
                      <thead>
                        <tr>
                            <th>Employee Name (e_name int)</th>
                            <th>Position (position varchar(50))</th>
                            <th>Department (department varchar(50))</th>
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


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
