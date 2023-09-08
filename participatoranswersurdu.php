<!doctype html>
<html lang="en">
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

    



  














<link rel="stylesheet"href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>







</head>

  <body style="background-color: cyan;" >

  

   
  <div class="first">

  <?php include 'partials/_dbconnect.php'; ?>
    
    <?php include 'partials/_header.php'; ?>
    
 

  








<?php


$update = false;
$delete = false;




if(isset($_GET['delete'])){

  $comment_id = $_GET['delete'];

  $delete = true;
  $sql = "DELETE FROM `comments` WHERE `comment_id` = $comment_id";
  $result = mysqli_query($conn, $sql);
  }


  
    
  
  



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if(isset($_POST['comment_idEdit'])){

   $comment_id = $_POST["comment_idEdit"];
   $comment_content = $_POST["comment_contentEdit"];
   $comment_by = $_POST["comment_byEdit"];

  $sql = "UPDATE `comments` SET `comment_content` = '$comment_content' , `comment_by` ='$comment_by' WHERE `comments`.`comment_id` = $comment_id";
   $result = mysqli_query($conn, $sql);

if($result){

      $update = true;
}
else{

  echo"We  couldnot update the record successfully";
}

  } 
  else {

    $comment_content = $_POST["comment_content"];
    $comment_by = $_POST["comment_by"];
    $sql = "INSERT INTO `comments` (`comment_content`, `comment_by`) VALUES ('$comment_content', '$comment_by')";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      //echo "The record was  inserted successfully !<br>";
      $insert = true;
    } else {
      echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
    }

  }

}
?>







 

<!--  Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"><FONT COLOR="#ff0000">Restriction Only 30 English words are allowed Edit this answer</FONT></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <form action="/forum/participatoranswersurdu.php" method="post">
      <div class="modal-body">
      

      <input type="hidden" name="comment_idEdit" id="comment_idEdit">

  <div class="form-group">
    <label for="title">comment_content</label>
    <textarea placeholder="Name" style="font-family:Jameel Noori Nastaleeq, Serif; width: 450px;" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"  type="text" class="form-control" id="comment_contentEdit" name="comment_contentEdit" aria-describedby="emailHelp"></textarea>
    
  </div>
  
  <div class="form-group">
    <label for="desc">comment_by</label>
    <textarea placeholder="Name" style="font-family:Jameel Noori Nastaleeq, Serif; width: 450px;" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl" type="text" class="form-control" id="comment_byEdit" name= "comment_byEdit" rows="3"></textarea>
  
  <button type="submit" class="btn btn-primary">Update note</button>
  

  </div>

      </div>
      </div>
      <div class="modal-footer d-block mr-auto">
        
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
</div>



<div class="first">

<?PHP


?>

<?php
if($delete){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>success!</strong> Your note has been deleted successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";

}
?>
<?php
if($update){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>success!</strong> Your note has been updated successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";

}
?>
<div class="container my-4">
  <h2>PARTICIPATOR CAN EDIT AND DELETE THE ANSWER</h2>
  



</div>

<div class="container my-4">



<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">comment_id</th>
      <th scope="col">comment_content</th>
      <th scope="col">comment_by</th>
      
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql = "SELECT * FROM `comments`";
$result = mysqli_query($conn, $sql);

  $comment_id = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $comment_id = $comment_id + 1;
    echo "<tr>
    <th scope='row'>" . $row['comment_id'] . "</th>
    <td>" . $row['comment_content'] . "</td>
    <td>" . $row['comment_by'] . "</td>
    <td class='d-flex justify-content-between'>
      <button class='edit btn btn-primary equal-length'  id=".$row['comment_id'].">Edit</button> 
      <button class='delete btn btn-primary equal-length ' id=d".$row['comment_id'].">Delete</button>
    </td>

    <style>

    .equal-length {
      width: 80px;
    }


    .edit {
      margin-right: 2px;
    }
  </style>
  



 </tr>";
 


 

}
?>



    
  </tbody>
</table>


</div>
<hr>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"  > </script>


<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

    <script>
edits =document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>
{
  
  element.addEventListener("click",(e)=>{
    console.log("edit " );
tr=e.target.parentNode.parentNode;

comment_content=tr.getElementsByTagName("td")[0].innerText;
comment_by=tr.getElementsByTagName("td")[1].innerText;
console.log(comment_content, comment_by);

comment_contentEdit.value =comment_content;
comment_byEdit.value =comment_by;
comment_idEdit.value =e.target.id;
console.log(e.target.id)
$('#editModal').modal('toggle');

  })
})
deletes=document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) =>{
element.addEventListener("click",(e)=>{
console.log("edit ",);

comment_id=e.target.id.substr(1,);

if(confirm("Are you sure you want to delete this note!")){
console.log("yes");
window.location=`/forum/participatoranswersurdu.php?delete=${comment_id}`;

}
else{
console.log("no");
}
})
  })
</script>
<?php include 'partials/_footer.php';?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</div>
</body>
</html>
