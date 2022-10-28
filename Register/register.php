<?php
$showerror=false;
if (isset($_POST['submit']))
{
  include 'dbconnect.php';
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $birthdate=$_POST["birthdate"];
  $password=$_POST["password"];
  $email=$_POST["email"];
  $sql_1="select * from users where email='$email'";
  $result = mysqli_query($conn,$sql_1);
  $num=mysqli_num_rows($result);
  if($num>0){
    $showerror="Email exist";
  }
  else{
  $sql="INSERT INTO `users` (`firstname`,`lastname`,`dob`,`password`,`email`) VALUES ('$firstname','$lastname','$birthdate','$password','$email')";
  $result = mysqli_query($conn,$sql);
  session_start();
  $SESSION['email']=$email;
   header("location:http://localhost/education/chatbot.php");

}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>

body 
{
align-items: center; 
background-color: #000; 
display: flex; 
justify-content: center; 
background-image: url('images/bgimg.png');
}
form 
{
background-color: #232645;
border-radius: 40px;
box-sizing: border-box; 
height: fit-content;
padding: 20px;
width: 400px;
margin-top: 50px;
}
.heading
{
  color: #eee; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 50px;font-weight: 600;
  position: fixed;
  top: 0px;
  z-index: 1;
  left: 0px;
  background-color: #000;overflow: hidden; 
  border-right: .15em solid orange; 
  white-space: nowrap;
  margin: 0 auto; 
  letter-spacing: .15em; 
  animation: 
  typing 3.5s steps(40, end),
  blink-caret .75s step-end infinite;
}

@keyframes typing {
  from { width: 0 }
  to { width: 33% }
}

@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: whitesmoke; }
}
.title 
{
color: #eee; 
font-family: sans-serif; 
font-size: 36px;
font-weight: 600;
margin-top: 20px;
}
.subtitle 
{
color: #eee;
font-family: sans-serif;
font-size: 16px; 
font-weight: 600; 
margin-top: 10px;
}
.input-container 
{
  height: 50px;
  position: relative;
  width: 100%;
}
.ic1 
{
  margin-top: 40px;
} 
.ic2 
{
   margin-top: 30px;
}
.ic3 
{
  margin-top: 30px;
}
.input 
{
background-color: #303245;
border-radius: 12px;
border: 0;
box-sizing: border-box; 
color: #eee;
font-size: 18px;
height: 100%;
outline: 0;
padding: 4px 20px 0; 
width: 100%;
}
.cut 
{
background-color: #15172b;
border-radius: 10px;
height: 20px;
left: 20px;
position: absolute;
top: -20px;
transform: translateY(0); 
transition: transform 200ms; width: 76px;
}
.cut-short 
{
   width: 50px;
}
.input:focus ~ .cut, .input:not(:placeholder-shown) ~ .cut {
transform: translateY(8px); }
.placeholder {
color: #65657b; font-family: sans-serif;
left: 20px;
line-height: 14px;
pointer-events: none;
position: absolute;
transform-origin: 0 50%;
transition: transform 200ms, color 200ms; top: 20px;
}
.input:focus ~ .placeholder, .input:not(:placeholder-shown) ~ .placeholder {
transform: translateY(-30px) translateX(10px) scale(0.75); }
.input:not(:placeholder-shown) ~ .placeholder { color: #808097;
}
.input:focus ~ .placeholder { color: #dc2f55;
}
.submit {
background-color: #08d;
border-radius: 12px; 
border: 0;
box-sizing: border-box;
color: #eee;
cursor: pointer;
font-size: 18px;
height: 50px; 
margin-top: 38px; 
text-align: center; 
width: 100%;
}
.submit:active {
  background-color: #06b;
}
.submit:hover {
  color: lightgray;
}
input:invalid {
background-color: darkslategray;
 }
input:valid { background-color: black;
}
input:focus {
  background-color: teal;
}
input:in-range {
border: 2px solid aquamarine;
}
</style>
<script>
function validator(){
var emailreg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9- ]+(?:\.[a-zA-Z0-9-]+)*$/;
if(document.getElementById("firstname").value == "") 
{
alert("Firstname cannot be empty."); 
}
else if(document.getElementById("lastname").value == "") 
{
alert("Lastname cannot be empty.");  
}
else if(document.getElementById("email").value == "") 
{
alert("E-mail cannot be empty."); 
}
else if(!document.getElementById("email").value.match(emailreg)) 
{
alert("Invalid email address."); 
}
}
</script>
</head>

<body>
<div class="heading">EDUCATION BOT</div>

<form  method="POST">

<div class="title">Welcome</div>
<div class="subtitle">Let's create your account!</div>

<div class="input-container ic2">
<input id="firstname" name="firstname" class="input" type="text" placeholder=" " required/> 
<div class="cut"></div>
<label for="firstname" class="placeholder">First name</label></div>

<div class="input-container ic2">
<input id="lastname" name="lastname" class="input" type="text" placeholder=" " required/>
<div class="cut"></div>
<label for="lastname" class="placeholder">Last name</label></div>

<div class="input-container ic2">
<input id="birthdate" name="birthdate" class="input" type="date" placeholder=" "  required/>
<div class="cut"></div>
<label for="birthdate" class="placeholder">Birth date</label></div>

<div class="input-container ic2">
<input id="password" name="password" class="input" type="password" placeholder=" " required/> 
<div class="cut"></div>
<label for="password" class="placeholder">Password</label></div>

<div class="input-container ic2">
<input id="email" name="email" class="input" type="text" placeholder=" " required/> 
<div class="cut cut-short"></div>
<label for="email" class="placeholder">Email</label>
</div>

<?php
if($showerror)
{echo '<script>alert("Email already exist")</script>';}
?>

<input type="submit" name="submit" class="submit" onclick="validator()"/>
</form>


</body>
</html>
