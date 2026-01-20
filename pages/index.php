<?php
$title = 'List';
include './../Songs.php';
$songs = (new Songs)->list();
ob_start();
?>


<a href="/exam-lyrics-cms/pages/create-lyrics.php" class="btn btn-success">Add</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Artist</th>
            <th scope="col">Title</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($songs as $song) : ?>
            <tr>
                <th scope="row"><?= $song['id'] ?></th>
                <td><?= $song['artist'] ?></td>
                <td><?= $song['title'] ?></td>
                <td>
                    <a href="/exam-lyrics-cms/pages/edit-lyrics.php?id=<?= $song['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/exam-lyrics-cms/delete-lyrics.php?id=<?= $song['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php
$body = ob_get_clean();

include '../layout/base.php';
