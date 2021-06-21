<?php include("conn.php");

if($_GET['id'])

{


  $id=$_GET['id'];


  if($id!="")
  {
      $sql="DELETE FROM `book` WHERE `book`.`b_id` ="."'$id'";

	$data = mysqli_query($conn, $sql);

      if($data)
	  {
	    echo "Book Deletion Successful";
	  }
	  else
	  {
	    echo "Something Went Wrong..";
	  }
}
    else
	  {
	   echo "Book ID Required";
	  }
	  
	  header("Refresh:2; url=admindas.php");
}
?>
