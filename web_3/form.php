<?php

$user = 'u67326';
$pass = '6963806';
$db = new PDO('mysql:host=localhost;dbname=u67326', $user, $pass, [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>

<html lang="ru">

<head>
    <link rel="icon" type="image/x-icon" href="favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Задание 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="forma" class="col-7 my-5">
        <form id="form1" action="" method="POST">
            <div class="form-group">
                <label for="name">ФИО:</label>
                <input name="fio" id="fio" class="form-control" placeholder="Введите ваше имя">
            </div>
            <div class="form-group">
                <label for="tel">Номер телефона:</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Введите телефон">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>

                <input name="email" type="email" class="form-control" id="email" placeholder="Введите вашу почту">

            </div>
            <div class="form-group">

                Дата рождения:
                <input name="date_of_birth" id="date_of_birth" type="date" class="form-control" />
                
            </div>
            <div class="form-group">
                Пол:
                <label for="g1"><input type="radio" class="form-check-input" name="gender" id="g1" value="m">
                    Мужской</label>
                <label for="g2"><input type="radio" class="form-check-input" name="gender" id="g2" value="w">
                    Женский</label>
            </div>
            <div class="form-group">
                <label for="mltplslct">Любимые Язык Программирования:</label>
                <select class="form-control" name="languages[]" id="mltplslct" multiple="multiple">
                    <?php foreach ($languages as $language): ?>
                        <option value="<?= htmlspecialchars($language['id']); ?>">
                            <?= htmlspecialchars($language['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="bio">Биография:</label>
                <textarea name="bio" id="bio" rows="5" class="form-control"></textarea>
            </div>
            <label><input type="checkbox" class="form-check-input" id="checkbox" value="1" name="checkbox">
                с контрактом ознакомлен (а) </label><br>
            <input type="submit" class="btn btn-primary" value="Отправить">
        </form>
    </div>
</body>
