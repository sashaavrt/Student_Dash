 <?php
 //Подключение к БД
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "training";

 $conn = new mysqli($servername, $username, $password, $dbname);
 // Проверка подключения
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

 // Обработка данных из формы регистрации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Вставка данных в таблицу пользователей
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "Регистрация успешна";
    } else {
         echo "Ошибка: " . $conn->error;
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <h2>Регистрация</h2>

        <form action="register.php" method="post">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>

</html>