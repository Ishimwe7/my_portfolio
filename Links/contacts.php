
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_in_agriculture";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
} else{
if(isset($_POST["Send"])){
if(!isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['specialization'],$_POST['message'])){
    $message='Empty filed(s)';
    echo 'Empty filed(s)';
    exit();
} else{
if(empty($_POST['fname']) || empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['province'])||empty($_POST['district'])||empty($_POST['address'])||empty($_POST['specialization'])||empty($_POST['message'])){
    $message='There is Empty Value(s)';
    echo 'There is Empty Value(s)';
    exit();
} 
else{
       if($stmt = $conn->prepare('INSERT INTO user_messages(fname, lname, email, province, district, address, specialization, message) values(?,?,?,?,?,?,?,?)')) {
        $stmt->bind_param('ssssssss',$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['specialization'],$_POST['message']);
        $stmt->execute();
        $message='Message SentSuccessfully!!';
        //echo "alert('Form submitted successfully!');";
        //echo 'Successfully Registered!!';
        header("Location: messageSent.php");
       }
       else{
        $message='An expected Error occurred!';
        //echo 'An expected Error occurred!';
        header("Location: messageError.php");
       }
    }
} 
    $stmt->close();
    $conn->close();
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>contact me</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../CSS/styles.css" />
  </head>
  <body>
    <div class="contacts">
      <h1>My contacts</h1>
      <h3>Email: ishimweinstein@gmail.com</h3>
      <h3>Phone number: 0780146235</h3>
      <h3>LinkedIn: ishimwe7</h3>
      <h3>GitHub: ishimwe7@github.com</h3>
    </div>
    <div id="loc" >
      <h1 style="text-decoration:underline">Our Location</h1>
      <p style="font-size:x-large">Kigali, Rwanda<br>Remera,Gishushu, Near RDB</p>
  </div>
</div>
<div class="signUp">
  <h1 id="heading1">Fill this Form to send us your Query!</h1>
  <div>
      <form action="" method="POST">
          <div class="row">
              <label for="fname">First Name:</label>
              <input required type="text" id="fname" placeholder="Enter your first name..." name="fname">
              <label class="required">*</label>
              <label id="fname-required"></label>
              <br>
          </div>
          <div class="row">
              <label for="lname">Last Name:</label>
              <input required type="text" id="lname" placeholder="Enter your last name..." name="lname">
              <label class="required">*</label>
              <label id="lname-required"></label>
              <br>
          </div>
          <div class="row">
              <label for="email">Email:</label>
              <input type="email" id="email" required placeholder="Enter your email..." name="email">
              <label class="required">*</label>
              <label id="email-required"></label>
               <br>
          </div>
          
          <div class="row">
              <label for="address">Address:</label>
              <input type="text" id="address" placeholder="Enter your address..." name="address">
              <label class="required">*</label>
              <label id="address-required"></label>
          </div>
          <div class="row">
              <label for="message">Message:</label>
              <textarea style="height: 80px;width:350px" name="message" id="message" placeholder="Type your message here." cols="30" rows="10">Type your message here.</textarea>
          </div>
          <div class="buttons">
              <button id="submitButton" name="Send" type="submit">Send Message</button>
              <button id="resetButton" type="reset">Clear</button>
          </div>
      </form>
  </div>
</div>
    <h3 style="text-align: center" class="home">
      Go Back <a style="color: aqua" href="../index.html">Home</a>
    </h3>
    <div class="footer">
      
     
      <div class="foot">
          <div class="addresses">
              <h4 style="text-decoration: underline;padding-bottom: 1px;text-align: center">Address</h4>
              <p>Rwanda, Kigali;</p>
              <p>Gasabo, Gishushu;</p>
          </div>
          <div class="contact">
              <h3 style="text-decoration: underline;padding-bottom: 1px;text-align: center">Contacts</h3>
              <p>Tel numbers: +250780146235</p>
              <p>Email: ishimweinstein@gmail.com</p>
              
          </div>
          <div class="qlinks">
               <h3 style="text-decoration: underline;padding-bottom: 1px;text-align: center">Quick Links</h3>
               <p> <a href="about.html">About Us</a> 
               <a href="profile.html" target="_parent">Profile</a> <a href="portfolio.html" target="_parent">portfolio</a> 
               <a href="gallery.html" target="_parent">Gallery</a> </p>
               
          </div>
      </div>
      <p class="rights" style="text-align: center;">All rights reserved  &#169ishimwe~2023</p>
  </div>
  </body>
</html>
