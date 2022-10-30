<?php
session_start();
$sitid=$_SESSION['sitid'];
$userid=$_GET['userid'];
$price=NULL;
include("connect.php");
if(isset($_POST['btn']))
{
 
//getting total amount from pet sitting table
                  $sql="select payment from pet_sitting where sitting_id='$sitid'";
                  $res=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_assoc($res);
                  if($row['payment']=="1-day"){
                    echo"hii";
                      //echo"<script> alert('{$curuser}')</script>";
                      $price="6 $";
                  }
                  elseif($row['payment']=="2-day"){
                      //echo"<script> alert('{$curuser}')</script>";
                      $price="12 $";
                  }
                  elseif($row['payment']=="3-day"){
                      //echo"<script> alert('{$curuser}')</script>";
                      $price="18 $";
                  }
                  elseif($row['payment']=="4-day"){
                      //echo"<script> alert('{$curuser}')</script>";
                      $price="24 $";
                  }
                  elseif($row['payment']=="5-day"){
                      //echo"<script> alert('{$curuser}')</script>";
                      
                      $price="30 $";
                  }
                  else{
                      echo"error";
                  }
//inserting billing details
                  $name=$_POST['fname'];
                  $email=$_POST['email'];
                  $address=$_POST['address'];
                  $city=$_POST['city'];
                  $state=$_POST['state']; 
                  $zip=$_POST['zip']; 
                  $sql2 = "INSERT INTO sitting_bills(sitid,full_name,email,address,city,state,zip,total,userid) value ('$sitid','$name','$email','$address','$city','$state','$zip','$price',$userid)";
                  $query=mysqli_query($conn,$sql2);
                if(!$query){
                  echo "not";
                }else{
                      header("pet sitting booked");
                  }
                  
  
}


?>
<html>
    <head>
    <link rel="stylesheet" href="sitting_billing_style.css">
        <title>billing</title>
</head>
<body class="body" id="body">

    <div class="container">
      <form action="#" method="POST" onsubmit="openPopup()">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
         
        
       
      
    </div>
  </div>
</div>

    <input type="submit" formmethod="POST"value="CONFIRM BOOKING"class="btn" name="btn" >
    
     <div class="popup" id="popup">
            <img src="tick.png">
            <h2>Thank You .</h2>
            <p>Your booking details have been submitted.</br>
            Total Price:<?php echo $price;?></p> 
            <button type="button" onclick="closePopup()">OK</button>

        </div>
     </button>
     </form>
    <script>
        let popup = document.getElementById("popup");
        let p=document.getElementById("body");
        
        function openPopup(){
          p.classList.add("close");
        popup.classList.add("open-popup");
        
       
      }
        function closePopup(){
        popup.classList.remove("open-popup");
        location.replace("dashboard.php")
        }
       
        </script>
       
</body>
</html>