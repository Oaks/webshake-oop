<?php include __DIR__ . '/header.php'; ?>
--><div id="content">
        <!-- Main contents -->
        <?php foreach ( $users as $user ) {?>
            <div class="row">
                <div class="col col-md-3"><?= $user->getNickname() ?></div>
                <div class="col col-md-3"><?= $user->getEmail() ?></div>
                <div class="col col-md-3"><?= $user->getRole() ?></div>
                <div class="col col-md-3"><?= $user->getCreatedAt() ?></div>
            </div>
        <?php }?>
        <div id="main-content" style="height: 1800px"></div>
    </div>
</div>
<?php include __DIR__ . '/footer.php'; ?>
