<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getParsedText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="/articles/<?=$article->getId() ?>/delete">Delete</a>
<?php include __DIR__ . '/../footer.php'; ?>
