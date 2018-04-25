<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Group_CB - Dependent Items</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <script type = "text/javascript"
     src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
  </script> 
  
  <script>
     $(document).ready(function() {
        $('select').material_select();
     });
  </script>
  
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
    <?php
      $dbconnect = pg_connect("dbname=group_cb user=group_cb password=123456") or die('fail to connect:'.pg_last_error());
            if(!$dbconnect) {
              echo 'connection error';
              exit;
            }
            
            $result = pg_query("SELECT P.product_id, P.title,  E.e_id, E.e_name
                                FROM administers AS A, employee AS E, products AS P
                                WHERE A.e_id = E.e_id AND A.product_id=P.product_id
                                ORDER BY P.product_id;");

            $owners = pg_query("SELECT product_id, products.title FROM products, depends_on WHERE owner = product_id");

            if(!owners) {
              echo "error - owners data didn't loaded properly";
            }
           
          ?>


  <div class="container">
    <div class="section">
        <div class="row">

           <div class="row">
              <h5>Dependent Items: </h5>
              <br><br>
              <div class="row">
                <form method="send" action="change_admin.php">
                <div class="col s4">
                        <select name="product">
                          <option value="" disabled selected>Choose Product</option>
                            <?php

                              while ($productRow = pg_fetch_array($products)) {
                                echo "<option value=";
                                echo $productRow[0];
                                echo ">";
                                echo $productRow[1]; 
                                echo "</option>";
                              }
                            ?>
                        </select>
                        <label>Select Product</label>
                </div>
                <div class="col s4 offset-s1">
                        <select name="employee">
                            <option value="" disabled selected>Choose Administrator</option>
                              <?php
                                while ($employeeRow = pg_fetch_array($employees)) {
                                  echo "<option value=";
                                  echo $employeeRow[0];
                                  echo ">";
                                  echo $employeeRow[1]; 
                                  echo "</option>";
                                }
                              ?>
                        </select>
                        <label>Select Administrator</label>
                  </div>
                  <div class="col s2 offset-s1">
                      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                      </button>
                  </div>
                  </form>

              </div>
                <?php


                  
                  echo "<table>
                        <thead>
                          <tr>
                              <th>Product ID</th>
                              <th>Product Name</th>
                              <th>Employee ID</th>
                              <th>Employee Name</th>
                          </tr>
                        </thead>
                        <tbody>";

                  while ($row = pg_fetch_array($result)) {
                   echo      "<tr><td>",$row[0],"</td>";
                   echo      "<td>", $row[1],"</td>";
                   echo      "<td>", $row[2],"</td>";
                   echo          "<td>", $row[3],"</td></tr>";
                  } 
                  echo '</tbody></table>'; 



                  pg_free_result($products);         
                   pg_free_result($employees);         
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


