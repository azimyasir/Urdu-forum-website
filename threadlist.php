<!DOCTYPE html>
<html lang="ur">

<head>
    <title> Limit Textbox Length </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <meta charset="utf-8" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Urdu Q/A Portal forum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<div class="first">

<?php include 'partials/_dbconnect.php'; ?>

<?php include 'partials/_header.php'; ?>

<body style="background-color: cyan;">
    

        <?php
        error_reporting(0);

        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            $catname = $row['category_name'];
            $catdesc = $row['category_description'];


        

        }

        ?>

        <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            //Insert in to  Thread in to DB
            $th_title = $_POST['title'];
            $th_desc =   $_POST['desc'];
            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace(">", "&gt;", $th_title);

            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace(">", "&gt;", $th_desc);





            $sno = $_POST['sno'];
            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong>  Your thread has been added successfully!Please wait for community to respond

</button>
</div>';
            }
        }
        ?>


        <div class="container my-15">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to <?php echo $catname; ?> forums </h1>
                <p class="lead"> <?php echo $catdesc; ?> </p>
                <hr class="my-4">
                <div id="wrapper">

                    <p align=right>

                                         ان فورمز میں رہیں، آپ سے توقع کی جاتی ہے کہ اس اصول پر عمل کریں۔ توہین آمیز،امتیازی سلوک یا  ہراساں
                                                                   کرنے والے رویے اور تقریر سے پرہیز کریں۔ تمام پوسٹیں پیشہ ورانہ اور شائستہ ہونی چاہئیں۔ آپ کو اپنے
  ساتھی سے اختلاف کرنے کا پورا حق ہے. کمیونٹی کے ممبران اپنے نقطہ نظر کی وضاحت کریں. ۔ تاہم، آپ
                        حملہ
                        کرنے، نیچا دکھانے، توہین کرنے کے لیے آزاد نہیں ہیں۔۔ اس سے کوئی فرق نہیں پڑتا ہے کہ آپ کون سا
                        عنوان
                        پر بحث
                        کرتے ہیں۔ تمام پوسٹیں پیشہ ورانہ اور شائستہ ہونی چاہئیں۔ آپ کو اپنے ساتھی کمیونٹی کے اراکین سے
                        اختلاف کرنے اور اپنے نقطہ نظر کی وضاحت کرنے کا پورا حق ہے۔ تاہم، آپ ان پر حملہ کرنے، نیچا
                        دکھانے، ان
                        کی توہین کرنے، یا دوسری صورت میں ان یا اس کمیونٹی کے معیار کو کم کرنے کے لیے آزاد نہیں ہیں۔
     </p>
                </div>
            </div>
            <p><b>This forum is sharing knowledge to each other</b> </p>
            
        </div>
    </div>





    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">



<!DOCTYPE html>
<html lang="ur">
<head>
	<title> Limit Textbox Length </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div class="count-container">
<h1 class="py-2"><FONT COLOR="#ff0000">Start a Discussion in English </FONT> </h1>
<form action="' . $_SERVER["REQUEST_URI"] . ' " method="Post">

<FONT COLOR="#ff0000"> <b>Problem title</b></FONT>
     <div class="input-group">
       <input    placeholder="Name" maxlength="20" data-max-chars="20" class="input-control count-chars" id="title" name= "title" >
       
       <div class="input-msg text-red"></div>
       
     </div>
     <div class=""input-group"">
     <FONT COLOR="#ff0000"> <b>Ellaborate your concern</b></FONT>
     <textarea   placeholder="Message"  maxlength="100" data-max-chars="100" class="input-control count-chars"  id="desc" name="desc" rows="3"  class="input-control"></textarea>
     <div class="input-msg text-orange"></div>


     <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
     <button type="submit" class="btn btn-success">Submit</button>
     <script src="js/count.js"></script>

     </div>
     </form>
     </body>
     </html>

     <div class="count-container">
     <h1 class="py-2"><FONT COLOR="#ff0000">Start a Discussion in  Urdu</FONT></h1>
     <form action="' . $_SERVER["REQUEST_URI"] . ' " method="Post">
     
     
     <FONT COLOR="#ff0000"> <b>Problem title</b></FONT>
     
     <div class="form-group">
                    <label for="exampleInputEmail1">Problem Title</label>
                    <input style="font-family:Jameel Noori Nastaleeq, Serif; width: 1200px;" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"    type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <FONT COLOR="#ff0000"> <b>Ellaborate your concern</b></FONT>
                </div>
                
                

     <textarea style="font-family:Jameel Noori Nastaleeq, Serif" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"  placeholder="نام"   placeholder="Message" class="input-control count-chars"  id="desc" name="desc" rows="3"  class="input-control"></textarea>
               

    

    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">


    <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
 </div>
 
 
 
 
            
         
            
</div>';
    }

    // checked
    else {
        echo '
<div class="container">
<h1 class="py-2">Start a Discussion </h1>
<h3><p style="color:green" ><u>You are not logged in.Please login to be able to start the discussion.</p></u></h3>
</div>


';
    }

    ?>
    <div class="first">
        <div class="container mb-5" id="ques">
            <h1 class="py-2">Browse Questions</h1>
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_time = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
        
                echo '<div class="media my-3">
            <img src="img/user-default.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">' .
                    '<h5 class="mt-0"> <a class="class="btn btn-primary"" href="thread.php?threadid=' . $id . '">      ' . $title . ' </a></h5> 
                    <p  class="bg-primary px-2  text-white text-justify">   ' . $desc .  ' </p>  ' . '<p> <b> Asked by: ' . $row2['user_email'] . ' at ' . $thread_time . '</div>' .  
                    '  </b></p>
                    </div>'; 
            }
            // echo var_dump($noResult);
            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
            }
            ?>

        </div>




























        

<?php include 'partials/_footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


    </div>


</body>

</html>