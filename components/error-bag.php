<?php if (isset($_SESSION['error_bag'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($_SESSION['error_bag'] as $key => $value): ?>
            <p><?= $value ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>