<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="reportcrime";
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $sql_command= "insert into user values ('".$_POST["email"]."' , '".$_POST["password"]."' , '".$_POST["username"]."' , '".$_POST["phoneNumber"]."','-1','-1', '".$_POST["aadhaar"]."');";
    $result=$conn->query($sql_command);
    $cookie_name = "whoisuser";
    $cookie_value = $_POST["username"];
    setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");
    echo "<script>alert('Logged in as ".$_COOKIE["whoisuser"]."');</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{   
    if(isset($_GET["usr"]))
    {
        $sql_command="select * from user where username='".$_GET["usr"]."' and password='".$_GET["pass"]."';";
        $result=$conn->query($sql_command);
        if($result->num_rows>0)
        {
            $cookie_name = "whoisuser";
            $cookie_value = $_GET["usr"];
            setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");
            echo "<script>alert('Logged in as ".$_COOKIE["whoisuser"]."');</script>";
        }
        else
        {
            echo "<script>alert('Invalid user data');</script>";
        }
    }
    
    else if(isset($_GET["pn"]))
    {
      $sql_command= "insert into crime values ('".$_GET["pn"]."' , '".$_GET["un"]."' , '".$_GET["ad"]."' , '".$_GET["cr"]."' , '".$_GET["ci"]."' , '".$_GET["st"]."' , '"."25"."' , '".$_GET["pc"]."');";
      $result=$conn->query($sql_command);
    }
}

#navbar - userdata, view complaints status, view crime data, add complaint
?>
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="font-size: 115%; background-color: #0B00CA;">
        <a class="navbar-brand" href="index.php">Report the crime</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#crime">Report new crime<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="prevcomp.php">Previous complaints</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.crimemapping.com/">Crime Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sticky-footer">About us</a>
            </li>
            <li class="nav-item dropdown" id="loggin">
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
      <!--Navbar above-->
      <br><br><br>
      <blockquote class="blockquote">
        <p class="mb-0 text-center" style="font-size:170%;">Crime prevention is everyone's business</p>
        <footer class="blockquote-footer text-center"><cite title="Source Title">Harry Hall</cite></footer>
      </blockquote>
      <!--quote-->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/crime-scene-tape-facebook-cover.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/160234.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/52-529510_red-and-blue-police-lights-wallpapaer1.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/1.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/52-529510_red-and-blue-police-lights-wallpapaer2.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--image-carousel-->

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
                      <input id="target1" name="usr" type="txt" placeholder="Enter username" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input id="target2" name="pass" type="password" placeholder="Enter password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                    </div>
                    <button id="target3" type="submit" class="btn btn-primary">Login</button>
                  </form>

            </div>
          </div>
        </div>
      </div>
      <!--exampleModal-->
      <div>&nbsp</div>
      
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Important links</h5>
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        What is a crime?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        In ordinary language, a crime is an unlawful act punishable by a state or other authority. The term crime does not, in modern criminal law, have any simple and universally accepted definition, though statutory definitions have been provided for certain purposes. The most popular view is that crime is a category created by law; in other words, something is a crime if declared as such by the relevant and applicable law. One proposed definition is that a crime or offence (or criminal offence) is an act harmful not only to some individual but also to a community, society, or the state ("a public wrong"). Such acts are forbidden and punishable by law.
                        <br><br>
                        <button onclick="window.location.href='https://en.wikipedia.org/wiki/Crime'" type="button" class="btn btn-danger">Know more</button>
                    </div>
                   
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What are criminal laws?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Criminal law is the body of law that relates to crime. It proscribes conduct perceived as threatening, harmful, or otherwise endangering to the property, health, safety, and moral welfare of people inclusive of one's self. Most criminal law is established by statute, which is to say that the laws are enacted by a legislature. Criminal law includes the punishment and rehabilitation of people who violate such laws.

                        Criminal law varies according to jurisdiction, and differs from civil law, where emphasis is more on dispute resolution and victim compensation, rather than on punishment or rehabilitation.
                        
                        Criminal procedure is a formalized official activity that authenticates the fact of commission of a crime and authorizes punitive or rehabilitative treatment of the offender.
                        <br><br>
                        <button onclick="window.location.href='https://en.wikipedia.org/wiki/Criminal_law'" type="button" class="btn btn-danger">Know more</button>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Who to look out for?
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Violence and crime stain the pages of world history, and sadly, they're all but certain to be part of our future.

                        Still, the criminal mind fascinates us, and you couldn't name or number all the TV shows, movies and novels that all but glamorize true crime.

                        <br><br>
                        Here's a list of most notorious criminals is a daunting task. Of course, there is no single criterion, and morbid factors, such as body count, sadism and notoriety must all be considered. Keeping that in mind, here's a list of some of World's most dangerous and violent villains.
                        <br><br>
                        <button onclick="window.location.href='https://en.wikipedia.org/wiki/Category:Lists_of_criminals'" type="button" class="btn btn-danger">Know more</button>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card shadow-none p-3 mb-5 bg-light rounded">
            <div class="card-body">
                <h5 class="card-title" id="crime">Report Form</h5>
                <form action="index.php" action="get">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Phone Number</label>
                        <input name="pn" type="text" class="form-control" id="inputEmail4" placeholder="Enter phone number">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Username</label>
                        <input name="un" type="text" class="form-control" id="inputPassword4" placeholder="Enter username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Crime Location</label>
                      <input name="ad" type="text" class="form-control" id="inputAddress" placeholder="Example: Dubai Cross Street, Dubai Main Road, Dubai.">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" maxlength="100">Explain crime in 100 words</label>
                        <textarea name="cr" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="As I was walking down the..."></textarea>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input name="ci" type="text" class="form-control" id="inputCity" placeholder="Chennai">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select name="st" id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Andhra">Andhra</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Pondicherry">Tamil Nadu</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Pincode</label>
                        <input name="pc" placeholder="600028" type="text" class="form-control" id="inputZip">
                      </div>
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-danger">Report</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
      <!--report crime-->
      
      <div>&nbsp</div>

      <footer id="sticky-footer" class="py-4 bg-blue text-white-50" style="background-color: #d01223;">
        <!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">
  
      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3">
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Report the crime</h6>
          <p>Report the crime is a location based crime reporting web application that helps users to directly connect with the local police officers</p>
        </div>
        <!-- Grid column -->
  
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
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
        <!-- Grid column -->
  
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
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
  
        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
          <p>
            <i class="fas fa-home mr-3"></i> Pondicherry, India</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> jasboson@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> +91 8300439150</p>
          
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Footer links -->
  
      <hr>
  
      <!-- Grid row -->
      <div class="row d-flex align-items-center">
  
        <!-- Grid column -->
        <div class="col-md-7 col-lg-8">
  
          <!--Copyright-->
          <p class="text-center text-md-left">© 2020 Copyright:
            <a href="https://github.com/jasDestiny" style="color: #f89b9b;">
              <strong>John Arthur Samuel D</strong>
            </a>
          </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-5 col-lg-4 ml-lg-0">
  
          <!-- Social buttons -->
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
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
  </footer>
  <!-- Footer -->
  



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

