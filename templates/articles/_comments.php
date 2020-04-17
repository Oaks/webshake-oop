<div style="margin: 20px 0">
    <?php if(!empty($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>
    <form action=<?="/articles/{$article->getId()}/comments"?> method="post">
        <label for="comment">Комментарий</label><br>
        <textarea name="comment" id="comment" rows="10" cols="80"><?= $_POST['comment'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать">
    </form>
    <div style="margin: 10px 0">
        <?php $comments = $article->getComments() ?>

        <?php foreach ($comments as $comment) { ?>
            <?php $author = $comment->getAuthor() ?>
            <div><?= !empty($author) ? $author->getNickname() : '' ?></div>
            <div id=<?="comment_{$comment->getId()}"?> ><?=$comment->getComment()?></div>
            <hr>
        <?php } ?>
    </div>
</div>
