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
      <a id="logo-container" href="#" class="brand-logo">Content Management Database</a>
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
              <h5>Queries: </h5>
              <ul class="collection">
                  <a href="sysAdmin.php" class="collection-item"> <b><u>System Administrators:</u></b>
                    <p>  Lists the system administrators and the number of configuration items they administer</p>
                  </a>
                  <a href="ss_dependents.php" class="collection-item"><b><u>Super-Server Dependents:</u></b>
                    <p>  Lists all dependent configuration items, for a given configuration item (named 'super-server')</p>
                  </a>
                  <a href="da_dependencies.php" class="collection-item"><b><u>Down-App Dependencies:</u></b>
                    <p>  Lists all configuration items that 'down-app' depends upon, the last time they were changed and the system administrator for each</p>
                  </a>
              </ul>
            </div>

            <br>

            <div class="row">
                <h5>Ad-hoc Query: </h5>
                <form method=POST action="results.php">
                  <input type="text" placeholder="Enter SQL Query" name="query_adhoc">
                  <button class="btn waves-effect waves-light" type="reset"> Clear 
                      <i class="material-icons right">clear</i>
                    </button>
                  <button class="btn waves-effect waves-light" type="submit" name="action"> Submit
                      <i class="material-icons right">send</i>
                  </button>
                </form>
            </div>

            <br><br>


            <div class="row">
              <h5>Application Functionality: </h5>
              <ul class="collection">
                  <a href="change_admin.php" class="collection-item"> <b><u>Change Administrator:</u></b>
                    <p>  Prompt to update administer and product ownership</p>
                  </a>
                  <a href="change.php" class="collection-item"><b><u>Changes Log:</u></b>
                    <p>  Shows a log of all changes to the products items and a description of all recent changes ordered by date.</p>
                  </a>
                  <a href="employee_dept.php" class="collection-item"><b><u>Employee Departments:</u></b>
                    <p>  Lists employees and the department each works in</p>
                  </a>
                  <a href="employee_projects.php" class="collection-item"><b><u>Employee Projects: </u></b>
                    <p>  Lists employees and the projects they work on</p>
                  </a>
                  <a href="configuration_items.php" class="collection-item"><b><u>Configuration Items: </u></b>
                    <p>  View tables for configuration items</p>
                  </a>
              </ul>
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
