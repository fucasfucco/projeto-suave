<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>  
* {
  text-align: center;
}
p {
  font-weight: bold;
  color: red;
}
</style>
</head>
<body>
  <h3 style="text-align: center">Exemplo completo PHP+MySQL+Session+Login</h3>
  <?php
    include_once("../controller/UserController.php");
    $obj = new UserController();
    $obj->control();
  ?>
</body>
</html>