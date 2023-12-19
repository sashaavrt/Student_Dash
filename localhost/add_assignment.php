<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}
// обработка данных из формы добавления задания
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $deadline = $_POST["deadline"];
  $description = $_POST["description"];
  // Вставка данных в таблицу заданий
  $query = "INSERT INTO assigments (title, deadline, description) VALUES ('$title', '$deadline', '$description')";
  if ($conn->query($query) === TRUE) {
   // echo "Задание успешно добавлено";
    header("Location: http://localhost/Student_Dash.php");
  } else {
    echo
      "Ошибка добавления задания: " . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1…0">
  <link rel="stylesheet" href="style.css">
  <title>Добавление заданий</title>
</head>

<body>
  <div class="container">
    <h2>Добавление заданий</h2>
    <form action="add_assignment.php" method="post">
      <label for="title">Название:</label>
      <input type="text" id="title" name="title" required>

      <label for="deadline">Дедлайн: </label>
      <input type="date" id="deadline" name="deadline" required>

      <label for="description">Описание задания: </label>
      <textarea id="description" name="description" rows="4" required></textarea>

      <button type="submit">добавить задание</button>
    </form>
  </div>
</body>

</html>