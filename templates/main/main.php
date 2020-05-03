<?php include __DIR__ . '/../header.php'; ?>

<div><a href="/articles/add">Создать статью</a></div>

<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= e($article->getName()) ?></a></h2>
    <p><?= $article->getParsedText() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
