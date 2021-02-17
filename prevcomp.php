<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <title>Report the crime</title>
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="font-size: 120%; background-color: #0B00CA;">
        <a class="navbar-brand" href="index.php">Report the crime</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Report new crime</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="prevcomp.php">Previous complaints<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.crimemapping.com/">Crime Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sticky-footer">About us</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login/ Signup
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal2">Login</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Sign up</a>
              </div>
            </li>
          </ul>
        </div>
    </nav>

    <!--JUMBOTRON-->

    <br><br>
    <div class="jumbotron">
        <h1 class="display-4">Hello, 
        <?php
            echo $_COOKIE["whoisuser"];
        ?>
        </h1>
        <p class="lead">Here you can see details of your previous complaints, track them and edit information</p>
        <hr class="my-4">
        <p>Scroll down to see more details</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#complaints" role="button">View</a>
        </p>
      </div>

    <!--CARDS-->

    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div>
    <h1 class="display-4">Your complaints</h1>
    <div class="row" id="complaints">
        
        <div class="row" >
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database="reportcrime";
              $conn = new mysqli($servername, $username, $password, $database);

              $sql_command="select * from crime where username='".$_COOKIE["whoisuser"]."';";
              $result=$conn->query($sql_command);
              while($row = mysqli_fetch_assoc($result)) 
              {
                $un=$row["username"];
                $ca=$row["crimeAddress"];
                $cr=$row["crime"];
                $ci=$row["city"];
                $st=$row["state"];
                $pr=$row["status"];
                $pc=$row["pincode"];
                    echo "<div class='col-sm shadow p-3 mb-5 bg-white rounded'>
                            <div class='card'>
                              <div class='card-body'>
                                <h5 class='card-title'>" .$ca. "</h5>
                                <p class='card-text'>" .$cr. "</p>
                                <br>
                                <p class='card-text'>" .$ci. ", " .$st. ", " .$pc."</p>
                                <h5 class='card-title'>Investigation Progress</h5>
                                <div class='progress'>
                                  <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100' style='width: ".$pr."%'></div>
                                </div>
                                <br>
                                <a href='#' class='btn btn-primary'>Edit crime</a>
                              </div>
                            </div>
                          </div>
                    ";
              }
            ?>
          </div>
    </div>
    </div>
    <br>
    <!--FOOTER  -->

    <footer id="sticky-footer" class="py-4 bg-blue text-white-50" style="background-color: #d01223;">
        <footer class="page-footer font-small mdb-color pt-4">
            <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mt-3 pb-3">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Report the crime</h6>
                <p>Report the crime is a location based crime reporting web application that helps users to directly connect with the local police officers</p>
                </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Other important links</h6>
                <p>
                    <a href="#!"></a>
                </p>
                <p>
                    <a href="https://negd.gov.in/" style="color: #f89b9b;">NEGP Portal</a>
                </p>
                <p>
                    <a href="https://www.meity.gov.in/content/mission-mode-projects" style="color: #f89b9b;">Mission mode Projects</a>
                </p>
                <p>
                    <a href="https://digital.gov/" style="color: #f89b9b;">Digital India Portal</a>
                </p>
                </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Follow on</h6>
                <p>
                    <a href="https://www.linkedin.com/mwlite/in/john-arthur-samuel-d-0a1b5817b" style="color: #f89b9b;">LinkedIn</a>
                </p>
                <p>
                    <a href="https://twitter.com/jasChirp" style="color: #f89b9b;">Twitter</a>
                </p>
                <p>
                    <a href="https://github.com/jasDestiny" style="color: #f89b9b;">Github</a>
                </p>
                
                </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>
                    <i class="fas fa-home mr-3"></i> Pondicherry, India</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> jasboson@gmail.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> +91 8300439150</p>
                
                </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
                <div class="col-md-7 col-lg-8">
                <p class="text-center text-md-left">© 2020 Copyright:
                    <a href="https://github.com/jasDestiny" style="color: #f89b9b;">
                    <strong>John Arthur Samuel D</strong>
                    </a>
                </p>
        
                </div>
                <div class="col-md-5 col-lg-4 ml-lg-0">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </footer>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sign-up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" action="index.php" method="post">
                <form action="index.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input name="phoneNumber" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Aadhaar Number</label>
                        <input name="aadhaar" type="text" class="form-control">
                      </div>
                    <button type="submit" class="btn btn-primary">Sign-up</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
      <!--exampleModal-->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <form action="index.php" method="get">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input name="usr" type="txt" placeholder="Enter username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input name="pass" type="password" placeholder="Enter password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>

            </div>
          </div>
        </div>
      </div>
      <!--exampleModal-->
      <!--exampleModal-->
    <!--JQUERy-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>