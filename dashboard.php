

<!doctype html>
<html lang="ur">
<head>
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <meta charset="utf-8" />
<style>
    #maincontainer {
        min-height: 100vh;
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Urdu Q/A Portal forum</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@500&display=swap" rel="stylesheet">

</head>

<body style="background-color: cyan;">
<div class="first">

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>


    <!--slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!--carousel startsCategory containers starts hers -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/forum/images/card-1.jpg" height="700" width="4000" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/forum/images/card-2.jpg" height="700" width="4000" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/forum/images/card-3.jpg" height="700" width="4000" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-4">
    <h2 class="text-center my-4">Admin PANEL </h2>
        <h2 class="text-center my-4">Urdu Q/A Portal-Browse categories</h2>
        
        <div class=" text-align: center;">
       
       <h2 class="text-center my-4">Dashboard </h2>
      
       <li>
       <a href="http://localhost/forum/">
         <i class='bx bx-chat' ></i>
         <span class="links_name"><h2>CATEGORIES</h2></span>
       </a>
       <span class="tooltip">CATEGORIES</span>
     </li>

    
       <a href="/forum/adminquestions.php" >
         <i class='bx bx-user' ></i>
         <span class="links_name"><h2>AdMIN EDIT AND DELETE THE QUESTIONS</h2></span>
       </a>
       <span class="tooltip">AdMIN QUESTIONS</span>
      <br>
       <a href="/forum/adminanswer.php" >
         <i class='bx bx-user' ></i>
         <span class="links_name"><h2>AdMIN EDIT AND DELETE THE ANSWERS</h2></span>
       </a>
       <span class="tooltip">AdMIN ANSWERS</span>

            </div>









        <div class="row my-4">
            <!-- Fetch all the categories and  Use a  loop to iterate through categories -->
            <?php $sql ="SELECT * FROM `categories`";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){


             //echo $row['category_id'];
             //echo $row['category_name'];
            $id = $row['category_id'];
             $cat =$row[ 'category_name'];
             $desc = $row['category_description'];
             echo'<div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/card-'.$id. '.jpg "  class="card-img-top" alt="image for this category">
                    <div class="card-body my-2">
                        <h5 class="card-title"><a href="threadlist.php?catid=' . $id .' " >'. $cat .  '</a> </h5>
                        <div class="first">
                        <p class="card-text" align=right   >'.($desc).' </p>
                        </div>
                        <a href="threadlist.php?catid='. $id .'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
              
              }
?>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        </div>

        








        <?php include 'partials/_footer.php';?>
</body>

</html>













  
  

      
     
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
  
</body>
</html>
