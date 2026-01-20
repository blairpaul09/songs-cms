<?php
session_start();
$title = 'Create lyric';
include __DIR__ . '/../models/Songs.php';
$song = (new Songs)->find($_GET['id']);
ob_start();
?>

<?php require_once '../components/error-bag.php'; ?>

<form action="/exam-lyrics-cms/api/update-lyrics.php" method="post">
    <input hidden type="text" name="id" value="<?= $song['id'] ?>">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Title</label>
        <input type="text" name="title" value="<?= $_SESSION['old_value']['title'] ?? $song['title'] ?>" class="form-control" id="formGroupExampleInput" placeholder="Tile">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Artist</label>
        <input type="text" name="artist" value="<?= $_SESSION['old_value']['artist'] ?? $song['artist'] ?>" class="form-control" id="formGroupExampleInput2" placeholder="Artist">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="lyrics" placeholder="Type lyrics" id="floatingTextarea2" style="height: 100px">
            <?= $_SESSION['old_value']['lyrics'] ?? $song['lyrics'] ?>
        </textarea>
        <label for="floatingTextarea2">Lyrics</label>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<?php
$body = ob_get_clean();

include '../layout/base.php';

session_destroy();
