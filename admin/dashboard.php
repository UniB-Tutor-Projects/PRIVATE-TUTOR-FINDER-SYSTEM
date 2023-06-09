<?php
  session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Dashboard</title>
		<link href="../css/dashboard.css" rel="stylesheet" type="text/css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://use.fontawesome.com/releases/v5.0.8/js/all.js'></script>	

    <style>
            .card-counter{
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
      }
    
      .card-counter:hover{
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
      }
    
      .card-counter.primary{
        background-color: #007bff;
        color: #FFF;
      }
    
      .card-counter.danger{
        background-color: #ef5350;
        color: #FFF;
      }  
    
      .card-counter.success{
        background-color: #66bb6a;
        color: #FFF;
      }  
    
      .card-counter.info{
        background-color: #26c6da;
        color: #FFF;
      }  
    
      .card-counter i{
        font-size: 5em;
        opacity: 0.2;
      }
    
      .card-counter .count-numbers{
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
      }
    
      .card-counter .count-name{
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
      }
        </style>	
  </head>
	</head>
  <body class="sidebar-is-reduced">
    <header class="l-header">
      <div class="l-header__inner clearfix">
        <div class="c-header-icon js-hamburger">
          <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
        </div>
        <div class="c-header-icon has-dropdown"><span class="c-badge c-badge--red c-badge--header-icon animated swing">13</span><i class="fa fa-bell"></i>
          <div class="c-dropdown c-dropdown--notifications">
            <div class="c-dropdown__header"></div>
            <div class="c-dropdown__content"></div>
          </div>
        </div>
        <div class="c-search">
          <input class="c-search__input u-input" placeholder="Search..." type="text"/>
        </div>
        <div class="header-icons-group">
          <div class="c-header-icon basket"><span class="c-badge c-badge--blue c-badge--header-icon animated swing">4</span><i class="fa fa-shopping-basket"></i></div>
          <div class="c-header-icon logout">
            <form action="../includes/logout.php" method="post" class="c-header-icon logout">
              <button class="c-header-icon logout" type="submit" name="logout-submit" style="border:none;"><a href="#"><i class="fa fa-power-off"></i></a></button>  
            </form>
          </div>
        </div>
      </div>
    </header>
    <div class="l-sidebar">
      <div class="logo">
        <div class="logo__txt">A</div>
      </div>
      <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
          <ul class="u-list">
            <li class="c-menu__item is-active" data-toggle="tooltip" title="Flights">
              <div class="c-menu__item__inner"><i class="fa fa-plane"></i>
                <div class="c-menu-item__title"><span>Users</span></div>
              </div>
            </li>
           
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Statistics">
              <div class="c-menu__item__inner"><i class="far fa-chart-bar"></i>
                <div class="c-menu-item__title"><span>Tutors</span></div>
              </div>
            </li>
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Gifts">
              <div class="c-menu__item__inner"><i class="fa fa-gift"></i>
                <div class="c-menu-item__title"><span>Appointments</span></div>
              </div>
            </li>
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
              <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                <div class="c-menu-item__title"><span>Subjects</span></div>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </body>
  <main class="l-main">
    <div class="content-wrapper content-wrapper--with-bg">
      <h1 class="page-title">Admin Dashboard</h1>
      <div class="page-content">Welcome back <em style="font-size: 18px; color: chartreuse;"><?php echo ucfirst($_SESSION['adminName']);?>!</em></div>

      <?php
        include('../includes/databaseconnection.php');
        //Count Users
        $sqlUser = "SELECT * FROM users";
        $queryUser = mysqli_query($conn, $sqlUser);
        $countUsers = mysqli_num_rows($queryUser);

        //Count Tutors
        $sqlTutor = "SELECT * FROM tutor";
        $queryTutor = mysqli_query($conn, $sqlTutor);
        $countTutors = mysqli_num_rows($queryTutor);

        //Count Appointments

        $sqlAppointment = "SELECT * FROM appointment";
        $queryAppointment = mysqli_query($conn, $sqlAppointment);
        $countAppointment = mysqli_num_rows($queryAppointment);

        //Count Subjets
        $sqlSubject = "SELECT * FROM subject";
        $querySubject = mysqli_query($conn, $sqlSubject);
        $countSubjects = mysqli_num_rows($querySubject);
      ?>
      
      <div class="container mt-3">
        <div class="row mt-4">
            <div class="col-md-3">
              <div class="card-counter primary">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <span class="count-numbers"><?php echo $countTutors; ?></span>
                <span class="count-name">Tutors</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter danger">
              <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="count-numbers"><?php echo $countAppointment; ?></span>
                <span class="count-name">Appointments</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers"><?php echo $countUsers; ?></span>
                <span class="count-name">Users</span>
              </div>
            </div>
        
            <div class="col-md-3">
              <div class="card-counter info">
                <i class="fa fa-users"></i>
                <span class="count-numbers"><?php echo $countSubjects; ?></span>
                <span class="count-name">Subjects</span>
             </div>
            </div>
        </div>
    </div>
      
      <nav class="navbar navbar-light justify-content-center fs-3 mb-5 mt-4" style="background-color:#00ff5573;">
            View All Data Records!
      </nav>

      <div class="container">

        <?php
          if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        ?>
        <a href="add_user.php" class="btn btn-dark mb-3">Add User</a>

        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>
              <td scope="col">ID</td>
              <td scope="col">User Name</td>
              <td scope="col">Age</td>
              <td scope="col">Gender</td>
              <td scope="col">Phone Number</td>
              <td scope="col">Email</td>
              <td scope="col">Address</td>
              <td scope="col">Actions</td>
            </tr>
          </thead>

          <tbody>

          <?php
            include('../includes/databaseconnection.php');
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                  <a href="edit_user.php?id=<?php echo $row['user_id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
                  <a href="delete_user.php?id=<?php echo $row['user_id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>

              <?php
            }
          ?>
            
          </tbody>
        </table>
      </div>

      <div class="container">
        <a href="add_tutor.php" class="btn btn-dark mb-3">Add Tutor</a>

        <table class="table table-hover text-center"> 
          <thead class="table-dark">
            <tr>
              <td scope="col">ID</td>
              <td scope="col">Name</td>
              <td scope="col">Age</td>
              <td scope="col">Gender</td>
              <td scope="col">Certificate</td>
              <td scope="col">Subject</td>
              <td scope="col">Phone</td>
              <td scope="col">Email</td>
              <td scope="col">Address</td>
              <td scope="col">Actions</td>
            </tr>
          </thead>

          <tbody>

            <?php
                include('../includes/databaseconnection.php');
                $sql = "SELECT * FROM tutor";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['tutor_id']; ?></td>
                  <td><?php echo $row['tutor_name']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['certificate']; ?></td>
                  <td><?php echo $row['subject_tutoring']; ?></td>
                  <td><?php echo $row['tutor_phone']; ?></td>
                  <td><?php echo $row['tutor_email']; ?></td>
                  <td><?php echo $row['tutor_address']; ?></td>
                  <td>
                    <a href="edit_tutor.php?id=<?php echo $row['tutor_id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
                    <a href="delete_tutor.php?id=<?php echo $row['tutor_id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                  </td>
                </tr>

                <?php
              }
            ?>
      
          </tbody>
        </table>
      </div>

      <div class="container">
        

        
        <a href="add_appointment.php" class="btn btn-dark mb-3">Add Appointment</a>

        <table class="table table-hover text-center"> 
          <thead class="table-dark">
            <tr>
              <td scope="col">ID</td>
              <td scope="col">Tutor Id</td>
              <td scope="col">Subject Id</td>
              <td scope="col">Start Time</td>
              <td scope="col">Stop Time</td>
              <td scope="col">Appointment Date</td>
              <td scope="col">Actions</td>
            </tr>
          </thead>

          <tbody>

            <?php
                include('../includes/databaseconnection.php');
                $sql = "SELECT * FROM appointment";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['appointment_id']; ?></td>
                  <td><?php echo $row['tutor_id']; ?></td>
                  <td><?php echo $row['subject_id']; ?></td>
                  <td><?php echo $row['appointment_time_start']; ?></td>
                  <td><?php echo $row['appointment_time_end']; ?></td>
                  <td><?php echo $row['appointment_date']; ?></td>
                  <td>
                    <a href="edit_appointment.php?id=<?php echo $row['appointment_id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
                    <a href="delete_appointment.php?id=<?php echo $row['appointment_id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                  </td>
                </tr>

                <?php
              }
            ?>
      
          </tbody>
        </table>
      </div>

      <div class="container">
        

        
        <a href="add_subject.php" class="btn btn-dark mb-3">Add Subject</a>

        <table class="table table-hover text-center"> 
          <thead class="table-dark">
            <tr>
              <td scope="col">ID</td>
              <td scope="col">Subject Name</td>
              <td scope="col">Subject Code</td>
              <td scope="col">Tutor Id</td>
              <td scope="col">Actions</td>
            </tr>
          </thead>

          <tbody>

            <?php
                include('../includes/databaseconnection.php');
                $sql = "SELECT * FROM subject";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $row['subject_id']; ?></td>
                  <td><?php echo $row['subject_name']; ?></td>
                  <td><?php echo $row['subject_code']; ?></td>
                  <td><?php echo $row['tutor_id']; ?></td>
                  <td>
                    <a href="edit_subject.php?id=<?php echo $row['subject_id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-3 me-3"></i></a>
                    <a href="delete_subject.php?id=<?php echo $row['subject_id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                  </td>
                </tr>

                <?php
              }
            ?>
      
          </tbody>
        </table>
      </div>


    </div>
  </main>

  
  <!-- partial -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
  <script>
      let Dashboard = (() => {
  let global = {
    tooltipOptions: {
      placement: "right" },

    menuClass: ".c-menu" };


  let menuChangeActive = el => {
    let hasSubmenu = $(el).hasClass("has-submenu");
    $(global.menuClass + " .is-active").removeClass("is-active");
    $(el).addClass("is-active");

    // if (hasSubmenu) {
    // 	$(el).find("ul").slideDown();
    // }
  };

  let sidebarChangeWidth = () => {
    let $menuItemsTitle = $("li .menu-item__title");

    $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
    $(".hamburger-toggle").toggleClass("is-opened");

    if ($("body").hasClass("sidebar-is-expanded")) {
      $('[data-toggle="tooltip"]').tooltip("destroy");
    } else {
      $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
    }

  };

  return {
    init: () => {
      $(".js-hamburger").on("click", sidebarChangeWidth);

      $(".js-menu li").on("click", e => {
        menuChangeActive(e.currentTarget);
      });

      $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
    } };

})();

Dashboard.init();
  </script>

		  </body>
</html>