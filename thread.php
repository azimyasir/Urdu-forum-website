<!doctype html>

<head>
    <!doctype html>
    <html lang="ur">

    <head>
        <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
        <meta charset="utf-8" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@500&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Urdu Q/A Portal forum</title>

    </head>

<body style="background-color: cyan;">

<div class="first">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
<?php
    error_reporting(0);
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        //Querry the user table to find out the name of the op
        $sql2  = "SELECT user_email FROM `users`where sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $posted_by = $row2['user_email'];
    }

    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert in to  comment in to DB

        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        $sno = $_POST['sno'];

        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong>  Your comment has been added successfully

</button>
</div>';
        }
    }
    ?>

    <!--carousel startsCategory containers starts hers -->
   

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title; ?></h1>
            <p class="lead"> <?php echo $desc; ?> </p>
            <hr class="my-4">
            

            <p align=right>

                ان فورمز میں رہیں، آپ سے توقع کی جاتی ہے کہ اس اصول پر عمل کریں۔ توہین آمیز، امتیازی سلوک یا ہراساں کرنے
                والے رویے اور تقریر سے پرہیز کریں۔ تمام پوسٹیں پیشہ ورانہ اور شائستہ ہونی چاہئیں۔ آپ کو اپنے ساتھی سے
                اختلاف کرنے کا پورا حق ہے. کمیونٹی کے ممبران اپنے نقطہ نظر کی وضاحت کریں. ۔ تاہم، آپ حملہ کرنے، نیچا
                دکھانے، توہین کرنے کے لیے آزاد نہیں ہیں۔۔ اس سے کوئی فرق نہیں پڑتا ہے کہ آپ کون سا عنوان پر بحث
                کرتے ہیں۔ تمام پوسٹیں پیشہ ورانہ اور شائستہ ہونی چاہئیں۔ آپ کو اپنے ساتھی کمیونٹی کے اراکین سے اختلاف
                کرنے اور اپنے نقطہ نظر کی وضاحت کرنے کا پورا حق ہے۔ تاہم، آپ ان پر حملہ کرنے، نیچا دکھانے، ان کی توہین
                کرنے، یا دوسری صورت میں ان یا اس کمیونٹی کے معیار کو کم کرنے کے لیے آزاد نہیں ہیں

       

            </p>
           

        </div>
        </p>

        <p><b> Posted by:<?php echo $posted_by; ?> </b></p>

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
<h1 class="py-2"><FONT COLOR="#ff0000">Post a comment in English </FONT> </h1>
<form action="' . $_SERVER["REQUEST_URI"] . ' " method="Post">



       
     
     <div class=""input-group"">
     <FONT COLOR="#ff0000"> <b>Ellaborate your concern</b></FONT>
     <textarea   placeholder="Message"  maxlength="100" data-max-chars="100" class="input-control count-chars"  id="comment" name="comment" rows="3"  class="input-control"></textarea>
     <div class="input-msg text-orange"></div>


     <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
     <button type="submit" class="btn btn-success">Submit</button>
     <script src="js/count.js"></script>

     </div>
     </form>
     </body>
     </html>

     <div class="count-container">
     <h1 class="py-2"><FONT COLOR="#ff0000">Post a Comment in Urdu</FONT></h1>
     <form action="' . $_SERVER["REQUEST_URI"] . ' " method="Post">
     <FONT COLOR="#ff0000"> <b>Problem title</b></FONT>
     <textarea style="font-family:Jameel Noori Nastaleeq, Serif" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"    placeholder="Message" class="input-control count-chars"  id="comment" name="comment" rows="3"  class="input-control"></textarea>
               
     
    
    
    

    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">


    <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
 </div>
 
 
 
























<input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">

            </div>
            

        </form>
</div>';
    } else {
        echo '
<div class="container">
<h1 class="py-2">Post a comment </h1>
<p class="lead">You are not logged in.Please login to be able to post comments</p>
</div>';
    }

    ?>


<div class="first" id="ques">
    <div class="container mb-5">
        <h1 class="py-2">Discussions</h1>
        <?php
        error_reporting(0);
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];
            $sql2  = "SELECT user_email FROM `users`where sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

















            

            echo '<div class="media my-3">
  <img src="/forum/images/userdefault.png"  width="60px" class="mr-3" alt="...">
  <div class="media-body">
<p  class="bg-primary px-2  text-white text-justify">   ' . $content .  ' </p>  ' . '<p> <b> Answer by: ' . $row2['user_email'] . ' at ' . $thread_time . '</div>' .  
  '  </b></p>
  </div>'; 


  
        }



        
        // echo var_dump ($noResult);
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Comments Found</p>
      <p class="lead">Be the first person to comment</p>
    </div>
  </div>';
        }
        ?>
        </div>

        <?php include 'partials/_footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

</div>
</body>

</html>