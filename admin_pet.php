<?php
    include('connect.php');
   

	if(isset($_POST["submit"]))
    {
	
		$ptype=$_POST["type"];
		$place=$_POST["place"];
		$pstatus=$_POST["status"];
		$pimg=$_FILES["file"]["name"];
		$sql="INSERT INTO pet_details (images,type_of_pet,place_of_adoption,status) VALUES('$pimg','$ptype','$place','$pstatus')";
		$res=mysqli_query($conn,$sql);

		if(!$res)
        {
            echo"not connected!!";
        }
        
	
    }
	
	?>
    <html>
        <head>
            <link rel="stylesheet" href="admin.css">
</head>
<body >


   <?php 
   include('admin-header.html');
   ?> 
<div class="pet-ins-main">   
<div class="petins">
<h1>UPLOAD PET DETAILS</h1>
    
    
    <div class="formbox">
        <div class="formitems">
        <form method="POST" action="#" enctype="multipart/form-data" >
        <label>File Upload:</label><br>
        <input type="file" name="file" /><br><br>
        <label>Pet Type</label><br>
        <input type="text" name="type"/><br><br>
        <label>place of adoption:<br>
        </label><input type="text" name="place"/><br><br>
        <label>Status</label> <br>
        <select name="status" id="status" placeholder="select option">
        <option value="adopted">Adopted</option>
        <option value="toadopt">To adopt</option>
        </select>
        <br><br>
         <input class="pet-det-sbt"type="submit" name="submit"/>
</form>
</div>
</div>
<div class="pet-det">
<a href="admin_view_pets.php">ADOPTED PETS</a>

</div>


        
        

        
</div>
</div>
</body>
</html>


