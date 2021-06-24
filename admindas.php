<?php 
include("conn.php");




if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}


$no_of_records_per_page = 8; // Set your desire Number here
if($pageno)
	$offset = ($pageno-1) * $no_of_records_per_page;
else
	$offset =0;
$limit =  " LIMIT ".$offset.", ".$no_of_records_per_page." ;"; 



$stmnt_count = "SELECT COUNT(*) FROM `book`";
$data=mysqli_query($conn,$stmnt_count);
$total_rows = mysqli_fetch_array($data)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);






?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
body{
  background: url("2.jpg");
}
    table{
                width: 100%;
                border-collapse: collapse;
                height: auto;
        text-align: center;
        color: white;
        font-weight: bold;

            }
    
    th{
        font-size: 17px;
        text-decoration: underline;
        font-style: italic;
    }
    
    .main{
        width: 80%;
        box-shadow: 0px 0px 20px red;
        border-radius: 20px;
        overflow: auto;
        margin-left: 10%;
        margin-top: 2%;
        height:270px;
        background: rgba(0, 0, 0, 0.57);
    }
.box{
  width:74%;
  height:160px;
  background-image: url("lib.jpeg");
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
 border:solid 1px #CF0403;
  border-radius: 12px;

}
.boxtwo{
  background-image: url("lg3.jpg");
  background-size: cover;
  box-shadow:0px 0px 15px lightgreen;
  border-radius:12px;

}
ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 200px;
  height: 40px;
  background-color: purple;
  opacity: .8;
  line-height: 40px;
  text-align: center;
  font-size: 20px;
  margin-right: 2px;
}
ul li a{
  text-decoration: none;
  color: white;
  display: block;
}
ul li a:hover{
  background-color: green;
}
ul li ul li{
  display: none;
}
ul li:hover ul li{
  display: block;

}
.nav{
  padding-left:12%;

}
.three{
  margin-left: 60%;
  margin-top: 5px;
  box-shadow:0px 0px 15px green;
}
    button{
        margin-top: 10px;
    }
</style>


<title>Admin Dasboard</title>
</head>
<body>

  
    <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
            <td style="color:white"><h1 align="center"><marquee><i>Welcome To online Library System</i>  </marquee></h1></td></tr>
        <tr>
          <td align="center"><b><i><mark style="color:white;background-color:maroon";>ADMIN PANEL</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
        <ul>
          <li><a style="background-color: green" href="admindas.php">Home</a></li>
          <li><a href="add_book.php">Add Book</a></li>
          <li><a href="edit_book.php">Edit Book</a></li>
            <li><a href="delbook.php">Delete Book</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
           </div>
    <br><br>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:84%; height:400px; margin-left:9%;margin-top:10px;background-color:white">
      
<!--    <input type="text" placeholder="search by book id"><button type="button">search</button>  -->
       <p style="text-align:center;color:yellow;font-weight:bold">ALL BOOKS</p>
   <div class="main">
      
       <table>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Book Writter</th>
                    <th>Actual Copy</th>
                    <th>Available Copy</th>
                    <th>Depertment</th>
                    <th>Ebook Name</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                
                
                
                    
                    
                    
            <?php 
           
           $data=mysqli_query($conn,"SELECT * FROM `book` ".$limit." ;");
	              while($row = mysqli_fetch_array($data))
	               {   
                        echo "<tr>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo $row["booksname"]; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["copies"]; echo "</td>";
                        echo "<td>"; echo $row["avl_cpy"]; echo "</td>";
                        echo "<td>"; echo $row["dept"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
						echo "<td>"; echo "<a href='editbookbylink.php?id=".$row["b_id"]."'>Edit</a>"; echo "</td>";
						echo "<td>"; echo "<a href='delete_book.php?id=".$row["b_id"]."'>Delete</a>"; echo "</td>";
                        echo "</tr>";
                    }

	            ?>
                </table>
      
      </div>   
   
<hr>
		<center><b><p class="text-light">Page No.  <?php echo $pageno; ?> of <?php echo $total_pages; ?></p></b></center>
		<br><br>
  </div>
      
      
      
      <div class="text-center">
			
	<?php
	

	
	
	echo ' <div  class="page-item" style="display:inline-block;" ><a class="page-link" href="?pageno=1">First page</a></div>';
	
	for($i=1;$i<=$total_pages;$i++)
	{
		if($pageno==$i)
			echo'<div class="page-item active" style="display:inline-block;">
        <a class="page-link"  href="?pageno='.$i.'">P '.$i.'</a></div>';
		else
			echo'<div class="page-item" style="display:inline-block;">
        <a class="page-link"  href="?pageno='.$i.'">P '.$i.'</a></div>';
	}
	
	?>
    <div  class="page-item" style="display:inline-block;"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last page</a></div>
				
</div>
	
 




        <div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:84%; height:40px; margin-left:9%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">For any query please <a href="aboutus.php">contact us</a>.Thank You.</h6></marquee>


        </div>

   
    </body>
  
</html>
