<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>

<!--registration form-->
    <form action="../users/register.php" method="post">
      <label for="username">User Name:</label>
      <input type="text" name="name" placeholder="User Name"> <br><br>

      <label for="email">Email:</label>
      <input type="text" name="email" placeholder="Email"><br><br>

      <label for="address">Address:</label>
      <input type="text" name="address" placeholder="Address"><br><br>

      <label for="age">Age:</label>
      <input type="text" name="age" placeholder="Age"><br><br>

      <label for="gender">Gender:</label>

      <label for="male">Male:</label>
      <input type="radio" name="gender" placeholder="Gender">

      <label for="female">Female:</label>
      <input type="radio" name="gender" placeholder="Gender"><br><br>


      <label for="phonenumber">Phone Number:</label>
      <input type="text" name="phonenumber" placeholder="Phone Number"><br><br>

      <label for="password">Password:</label>
      <input type="password" name="email" placeholder="Password"><br><br>

      <button type="submit" name="userregister_submit">Register</button>
    </form>

</body>
</html>

