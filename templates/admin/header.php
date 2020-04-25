<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/admin-styles.css">
</head>
<body>


<style type="text/css">

html {
    height: 100%;
}

body {
    margin: 0;
    height: 100%;
}

#container {
    height: 100%;
}

#sidebar {
    background-color: #2980b9;
    display: inline-block;
    vertical-align: top;
    height: 100%;
    width: 18%;
    overflow: auto;
}

#content {
    background-color: #f8f8f8;
    display: inline-block;
    vertical-align: top;
    height: 100%;
    width: 82%;
    overflow: auto;
}

</style>
</head>

<body>

<div id="container">
    <div id="sidebar" style="text-align: center">
        <!-- Sidebar contents -->
        <div > Админ панель </div>

            <?php if (!empty($user)) {?>
                <div> <?="{$user->getNickname()}({$user->getRole()})" ?></div>
            <?php }?>
        <div id="sidebar-content" style="height: 2800px"></div>
    </div><!--
