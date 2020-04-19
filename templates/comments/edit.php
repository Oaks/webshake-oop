<div style="margin: 20px 0">

    <?php if(!empty($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="comment">Редактирование комментария</label><br>
        <textarea name="comment" id="comment" rows="10" cols="80"><?= $comment->getComment()?></textarea><br>
        <br>
        <input type="submit" value="Создать">
    </form>

</div>

