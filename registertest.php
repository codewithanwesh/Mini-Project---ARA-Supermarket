<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="test1.php" method="post"> 
      <h3>register now</h3>
    
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" id="pass" name="password" required placeholder="enter your password">
      
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="test3.php">login now</a></p>
   </form>

</div>

</body>
</html>