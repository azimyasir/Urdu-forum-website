
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

  

  <body style="background-color: cyan;">
  <div class="first">
  <?php include 'partials/_dbconnect.php';?>
  <?php include 'partials/_header.php';?>
  

  <?php


$update = false;
$delete = false;



if(isset($_GET['delete'])){

  $thread_id = $_GET['delete'];

  $delete = true;
  $sql = "DELETE FROM `threads` WHERE `thread_id` = $thread_id";
  $result = mysqli_query($conn, $sql);
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['thread_idEdit'])) {

    $thread_id = $_POST["thread_idEdit"];
    $thread_title = $_POST["thread_titleEdit"];
    $thread_desc = $_POST["thread_descEdit"];

    $sql = "UPDATE `threads` SET `thread_title` = '$thread_title' , `thread_desc` = '$thread_desc' WHERE `threads`.`thread_id` = $thread_id";
$result = mysqli_query($conn, $sql);

    if ($result) {
      
      $update = true;



    } else {

      echo "we couldnot update the record successfully";
    }



  } 
  else {


    $thread_title = $_POST["thread_title"];
    $thread_desc = $_POST["thread_desc"];


    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`) VALUES ('$thread_title', '$thread_desc')";
$result = mysqli_query($conn, $sql);
    if ($result) {


      $insert = true;
    } 
    else {
echo "The record was not  inserted sucessfully because of this error-->" . mysqli_error($conn);
    }
  }
}
?>


<div class="first">
<!-- Edit modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
    Edit Modal
  </button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"> <FONT COLOR="#ff0000">URDU words are allowed Edit this question</FONT></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="/forum/participatorquestionsurdu.php" method="post">
      <div class="modal-body">
      <input  type="hidden" name="thread_idEdit" id="thread_idEdit">
  <div class="form-group">
    <label for="title">Note Title</label>
    
    <input placeholder="Name" style="font-family:Jameel Noori Nastaleeq, Serif; width: 450px;" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"    type="text" class="form-control"  id="thread_titleEdit" name="thread_titleEdit" aria-describedby="emailHelp">
    
</div>
  
  <div class="form-group">
    <label for="desc">Note Description</label>
    <textarea placeholder="Name" style="font-family:Jameel Noori Nastaleeq, Serif; width: 450px;" value="اڈوبی عریبک بولڈ"  type="text"dir="rtl"  class="form-control" id="thread_descEdit" name="thread_descEdit" rows="3">
      
    </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Update Note</button>






  
      </div>
    </div>
  </div>
</div>


</form>









  




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
  <h1>PARTICIPATOR EDIT AND  DELETE THE QUESTIONS</h1>




<div class="container my-4">








<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">thread_id</th>
      <th scope="col">thread_title</th>
      <th scope="col">thread_desc</th>
      <th scope="col">thread_cat_id</th>
      <th scope="col">thread_user_id</th>
      
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>

  <?php







$sql = "SELECT * FROM `threads`";

     $result = mysqli_query($conn, $sql);
  $thread_id = 0;
while($row = mysqli_fetch_assoc($result)){

  





  $thread_id=$thread_id + 1;
  
    echo "<tr>
   <th scope='row'>" . $thread_id . "</th>
   <td>" . $row['thread_title'] . "</td>
   <td>" . $row['thread_desc'] . "</td>
   <td>" . $row['thread_cat_id'] . "</td>
   <td>" . $row['thread_user_id']  . "</td>
   

   <td class='d-flex justify-content-between'>
   <button class='edit btn btn-primary equal-length' id=".$row['thread_id'].">Edit</button> 
   <button class='delete btn btn-primary equal-length' id=d".$row['thread_id'].">Delete</button>
 </td>
 <style>
 .equal-length {
   width: 80px;
 }


 .edit {
  margin-right:10px;
}
</style>






   
 </tr>";

 

  }


?>
</tbody>
</table>



<hr>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
edits=document.getElementsByClassName('edit');
Array.from(edits).forEach((element) =>{
element.addEventListener("click",(e)=>{
console.log("edit ");
tr = e.target.parentNode.parentNode;
thread_title=tr.getElementsByTagName("td")[0].innerText;
thread_desc=tr.getElementsByTagName("td")[1].innerText;
console.log(thread_title, thread_desc);

thread_titleEdit.value =thread_title;
thread_descEdit.value=thread_desc;
thread_idEdit.value =e.target.id;
console.log(e.target.id)
$('#editModal').modal('toggle');


})
  
})

deletes=document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) =>{
element.addEventListener("click",(e)=>{
console.log("edit ",);

thread_id=e.target.id.substr(1,);

if(confirm("Are you sure you want to delete this note!")){
console.log("yes");
window.location=`/forum/participatorquestionsurdu.php?delete=${thread_id}`;

}
else{
console.log("no");
}
})
  })
</script>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


</div>


<?php include 'partials/_footer.php';?>
</div>

</body>
</html>