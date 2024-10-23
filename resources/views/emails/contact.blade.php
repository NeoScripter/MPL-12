<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись на курс</title>
</head>
<body>
    <h1>Запись на курс</h1>
    <p><strong>Имя:</strong> {{ $emailData['first_name'] }}</p>
    <p><strong>Фамилия:</strong> {{ $emailData['last_name'] }}</p>
    <p><strong>Телефон:</strong> {{ $emailData['phone'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['email'] }}</p>
</body>
</html>
