<?
require_once ('connect.php');

echo '<br>';

function register($conn, $login, $password) {
  $sql = "INSERT INTO `users` (`login`, `password`, `role`) VALUES ('$login', '$password', 'guest')";
  if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function authorization($conn, $login, $password) {
  $users =  mysqli_query($conn, "SELECT * FROM `users`");
  $vars = [];
  while ($var = mysqli_fetch_assoc($users)) {
    array_push($vars, [$var['login'], $var['password']]);
  }
  $result = '';
  for ($i=0; $i < count($vars); $i++) {
    if ($login === $vars[$i][0] && $password === $vars[$i][1]) {
      $result = 'succses';
      break;
    }
  }
  if ($result === 'succses') {
    echo 'Authorization is successful';
  } else {
    echo 'Invalid username or password entered';
  }
}
?>