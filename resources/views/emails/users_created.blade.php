<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ваш аккаунт</title>
</head>
<body>
    <h2>Здравствуйте, {{ $user->name }}!</h2>
    <p>Для вас был создан аккаунт.</p>
    <p><strong>Email (логин):</strong> {{ $user->email }}</p>
    <p><strong>Временный пароль:</strong> {{ $password }}</p>
    <p>Рекомендуем сразу сменить пароль после входа.</p>
</body>
</html>
