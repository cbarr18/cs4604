<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Group_CB - Configuration Items</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

        <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
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


  <div class="container">
    <div class="section">
        <div class="row">

            <div class="row">

            <div class="col s12 no-padding">
              <ul class="tabs">
                  <li class="tab col s2"><a class="active" href="#employee">Employee</a></li>
                  <li class="tab col s2"><a href="#communication">Communication</a></li>
                  <li class="tab col s2"><a href="#location">Location</a></li>
                  <li class="tab col s2"><a href="#department">Department</a></li>
                  <li class="tab col s2"><a href="#products">Products</a></li>
                  <li class="tab col s2"><a href="#project">Project</a></li>
              </ul>
            </div>
            <div id="employee" class="col s12"><?php include 'employee.php'; ?></div>
            <div id="location" class="col s12"><?php include 'location.php'; ?> </div>
            <div id="department" class="col s12"><?php include 'department.php'; ?></div>
            <div id="products" class="col s12">
              <?php include 'products.php';
                    include 'software.php';
                    include 'hardware.php';
              ?>
            </div>
            <div id="communication" class="col s12"><?php include 'communication.php'; ?></div>
            <div id="project" class="col s12"><?php include 'project.php'; ?></div>
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
