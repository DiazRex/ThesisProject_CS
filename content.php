<?php

require 'conn.php';



$Result = mysqli_query($conn, "SELECT COUNT(*) as total FROM thesisdata WHERE RoleSTI = 'Student'");
$row = mysqli_fetch_assoc($Result);
$count = $row['total'];

$SqlData = "SELECT * FROM thesisdata WHERE RoleSTI ='Student'";
$Verdict = $conn->query($SqlData);

?>

<?php 
  require 'conn.php';

  $sql = "SELECT COUNT(DISTINCT SectionN) as total FROM thesisdata WHERE RoleSTI = 'Student'";
  $result = mysqli_query($conn, $sql);
  
  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $totalCount = $row['total'];
  } else {
      echo "No records found.";
  }



?>





<?php 
session_start();
require 'conn.php';

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
  // handle unauthorized access here
}

if(isset($_GET["username"])) {
  $_SESSION["wow"] = $_GET["username"];
}

$wow = isset($_SESSION["wow"]) ? $_SESSION["wow"] : "";


$sql = "SELECT ProfileP FROM thesisdata WHERE Username = '$wow'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $profile_picture = $row['ProfileP'];
} else {
  // handle no profile picture found
}

if(empty($wow)) {
  header("Location: Login.php");
  exit;
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dash.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
    /* CSS for screens smaller than 576px (iPhone SE) */
    @media (max-width: 576px) {
  #ManageQuestion, #ProgressR,#QuestionC, #Leader{
    margin-left: 20px;
  }

  .btn-sm {
    margin-top: 5px;
  }
}

@media (min-width: 577px) {
  #ManageQuestion, #ProgressR,#QuestionC, #Leader {
    margin-left: 290px;
  }
}

img:hover {
    transform: scale(7);
    transform-origin: top left;

  }

  .dash{
  border-radius: 10px; 
  -webkit-backdrop-filter: blur(6.5px);
  backdrop-filter: blur(6.5px);
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
  border: 0.8px solid white;
}
</style>
  </head>

  <body style="
  background-image:url(Pic/Bckg_3.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment:fixed;
  color: #272606;
  
  ">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Code Quest
      <?php if (isset($profile_picture)): ?>
      <img src="<?=$profile_picture;?>" style="height: 20px; width: 20px; margin-left: 100px; border-radius: 50%; transition: transform 0.1s;">
    <?php endif; ?>
      </a>
      

      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="Logout.php">Sign out</a>

          
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky" style="background-color:#C9EEFF; ">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#Home">
                  <span data-feather="home"></span>
                  <b>Dashboard</b> <span class="sr-only">(current)</span>
                </a>
              </li>
              
             <li class="nav-item">
                <a class="nav-link" href="#ProgressR">
                  <span  class="bi bi-graph-up"></span>
                  &nbsp;<b>Progress Report</b>
                </a>
              </li>
              

              <!-- <li class="nav-item">
                <a class="nav-link" href="#QuestionC">
                  <span  class="bi bi-pencil-square"></span>
                  &nbsp;Question Customization
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="#Leader">
                  <span  class="bi bi-trophy"></span>
                  &nbsp;<b>Leaderboards</b>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#ManageQuestion">
                  <span  class="bi bi-trophy"></span>
                  &nbsp;<b>Manage Question</b>
                </a>
              </li>

              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="at-sign"></span>
                  <b>Account Used: <?php echo $wow; ?></b>
                </a>
              </li>
              

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
            </h6>
            
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#Progress">
                  <span data-feather="file-text"></span>
                  Progress
                </a>
              </li> -->
              
          

          </div>
        </nav> 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 Home" id="Home">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
          
            </div>
          </div>

          <div class="container-fluid">
  <div class="row">
    <div class="col-6 col-sm-6 col-md-3 mb-3">
      
    <div class="dash">
        <div class="card-body d-flex align-items-center justify-content-center">
          <div>
            <h1 class="text-center mb-0"><?php echo $count;?></h1>
            <p class="text-center mb-0"><b>Registered Student</b></p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-6 col-sm-6 col-md-3 mb-3">
      <div class="dash">
        <div class="card-body d-flex align-items-center justify-content-center">
        <div>
            <h1 class="text-center mb-0"><?php echo $totalCount;?></h1>
            <p class="text-center mb-0"><b>Registered Student Sections</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-6 col-md-3 mb-3">
      <div class="dash">
        <div class="card-body d-flex align-items-center justify-content-center">
        <div>
        <h1 class="text-center mb-0">...</h1>
        <p class="text-center mb-0">...</p>
        </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-6 col-md-3 mb-3">
      <div class="dash">
        <div class="card-body d-flex align-items-center justify-content-center">
        <div>
        <h1 class="text-center mb-0">...</h1>
        <p class="text-center mb-0">...</p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
          
          </section>

          </div>

          <div id="menu" class="fas fa-bars"></div>


<!-- ############################################################################################################## -->

<?php
    require 'conn.php';
?>


<section class="ProgressR" id="ProgressR" style="margin-top: 32%;" >

    <br>
    <br>
    <br>

    <div class="container mt-4">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="dash" style="border: 3px outset #fff; border-radius:15px;">
                <div class="card-header">
                    <h4><b>Student Details</b></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="border-radius: 15px;">
                        <table class="table table-dark" style=" border: 3px  #fff;">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Student'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['Username']; ?></td>
                                                <td><?= $student['Email']; ?></td>
                                                <td><?= $student['FirstN']; ?></td>
                                                <td><?= $student['LastN']; ?></td>
                                                <td><?= $student['SectionN']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $student['ID']; ?>" class="btn btn-info btn-sm">Progress</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5>No Record Found</h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    <!-- </div>
                    <a href="student-create.php" class="btn btn-primary mt-3 float-end">Add Students</a>
                </div> -->
            </div>
        </div>
    </div>
</div>

</section>

        
<!-- ############################################################################################################## -->
<!-- <section class="QuestionC" id="QuestionC" style="margin-top: 43%;">
<br>
<br>
<br>
Question
</section> -->

<!-- ############################################################################################################## -->
<section class="Leader" id="Leader" style="margin-top: 43%;">
                                
                                  
            
    <br>
    <br>
    <br>

    <div class="container mt-4">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="dash" style="border: 3px outset #fff; border-radius:15px;">
                <div class="card-header">
                    <div class="container-fluid">
                    <div class="row">
                          <div class="col-10">
                                  <h4><b>LeaderBoard Ranking</b></h4>
                          </div>
                          <div class="col-2">
                          <label><b>Rank by:</b></label>
                        <select id="rank" name="rank" class="form-control" style="width: 105%; height: 55%; font-size: 15px; border-radius: 15px;">
                        <option value="Teacher" style="border-radius: 15px;">Section</option>
                        <option value="Student" style="border-radius: 15px;">C# Fundamentals</option>
                        <option value="Student" style="border-radius: 15px;">Classes & Objectives</option>
                        <option value="Student" style="border-radius: 15px;">Abstraction</option>
                        <option value="Student" style="border-radius: 15px;">Encapsulation</option>
                        <option value="Student" style="border-radius: 15px;">Inheritance</option>
                        <option value="Student" style="border-radius: 15px;">Polymorphism</option>
                      </select>
                          </div>

                    </div>
                    

                    </div>
                </div>
                


                <div class="card-body">
                    <div class="table-responsive" style="border-radius: 15px;">
                        <table class="table table-dark" style=" border: 3px  #fff;">
                            <thead>
                                <tr>
                                  <th>Rank</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                      $query = "SELECT * FROM thesisdata WHERE RoleSTI ='Student'";
                                      $query_run = mysqli_query($conn, $query);

                                      if(mysqli_num_rows($query_run) > 0){
                                          $rank = 1; // initialize the rank counter
                                      foreach($query_run as $student)
                                      {
                                ?>
                                <tr>
                                    <td><?= $rank++; ?></td> <!-- print the rank and increment the counter -->
                                    <td><?= $student['Username']; ?></td>
                                    <td><?= $student['Email']; ?></td>
                                    <td><?= $student['FirstN']; ?></td>
                                    <td><?= $student['LastN']; ?></td>
                                    <td><?= $student['SectionN']; ?></td>
                                    <!-- <td>
                                      <a href="student-view.php?id=<?= $student['ID']; ?>" class="btn btn-info btn-sm">Progress</a>
                                      <form action="code.php" method="POST" class="d-inline">
                                      </form>
                                    </td> -->
                                </tr>
                              <?php
                                      }
                                    }else
                                      {
                                        echo "<h5>No Record Found</h5>";
                                      }
                              ?>
                            </tbody>
                        </table>
                      </div>
                   </div>
                </div>
            </div>

</section>



<br><br><br>

<!-- -->
<section class="ManageQuestion" id="ManageQuestion" style="margin-top: 32%; margin-bottom: 32%;" >

    <br>
    <br>
    <br>

    <div class="container mt-4">
    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="dash" style="border: 3px outset #fff; border-radius:15px;">
                <div class="card-header">
                    <h4><b>Manage Question</b></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="border-radius: 15px;">
                        <table class="table table-dark" style=" border: 3px  #fff;">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Question</th>
                                  <th>Type</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                      $query = "SELECT * FROM default_questions";
                                      $query_run = mysqli_query($conn, $query);

                                      if(mysqli_num_rows($query_run) > 0){
                                          $id = 1; // initialize the rank counter
                                      foreach($query_run as $question)
                                      {
                                ?>
                                <tr>
                                    <td><?= $id++; ?></td> <!-- print the rank and increment the counter -->
                                    <td><?= $question['question_title']; ?></td>
                                    <td><?= $question['question_type']; ?></td>
                                    <td>
                                      <a href="question-edit.php?id=<?= $question['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                      <form action="code.php" method="POST" class="d-inline">
                                      </form>
                                    </td>
                                </tr>
                              <?php
                                      }
                                    }else
                                      {
                                        echo "<h5>No Record Found</h5>";
                                      }
                              ?>
                            </tbody>
                        </table>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

<br><br><br>

    

















<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    
    </script>
  </body>
</html>
