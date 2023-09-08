<?php
session_start();
echo '<nav class="navbar fixed-my-15 navbar-expand-lg navbar-dark bg-primary" style="width: 1930px;" >
  <div class="container-fluid" >
    <a class="navbar-brand" href="/forum">Urdu Q/A Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent ">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum"><button type="button" class="btn btn-primary">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="about.php"><button type="button" class="btn btn-primary">About</button></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Catagories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql = "SELECT category_name, category_id FROM `categories`";
$result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($result)){
           echo '<li><a class="dropdown-item" href="threadlist.php?catid=' .$row['category_id'].'">'. $row['category_name'] .'</a></li>';
            
     }
         echo'</ul>
        
      </ul>
      
      <div class="row mx-2">
      </div>';
      if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
echo '<form class="d-flex" method="get" action="search.php">
       

<div class="dropdown"  my-30>
  <button class="dropbtn" >PARTICIPATOR</button>
  <div class="dropdown-content">
    <a href="/forum/participatorquestionseng.php">Participator Edit/delete  Questions in English</a>
    <a href="/forum/participatoranswerseng.php">Participator Edit/delete  Answers in EngLISH</a>
    <a href="/forum/participatorquestionsurdu.php">Participator Edit/delete  Questions in Urdu</a>
    <a href="/forum/participatoranswersurdu.php">Participator Edit/delete  Answers in Urdu</a>
  </div>
</div>




<input class="form-control my-10 mx-10" name="search" type="search" placeholder="Search" aria-label="Search" style="width: 400px;">




<button class="btn btn-success text-center my-3 mx-2 " type="submit">Search</button>
<p class="text-light my-3 mx-2">'.$_SESSION['useremail'].'</p>



<a href="partials/_logout.php" class="btn btn-success text-center my-3 mx-2">Logout</a>


<a href="/forum/dashboard.php" class="btn btn-success text-center my-3 mx-2">Admin</a>







</form>';

      }
      else{
echo'<form class="d-flex">
<input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
 <button class="btn btn-success text-center my-3 mx-2" type="submit">Search</button>

  
        </form>
        
        <button class="btn btn-success mx-2 " data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
      }


echo '</div>
          </div>
          </nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>