<?php
session_start();

include './Songs.php';
include './Helpers.php';

$_SESSION['error_bag'] = [];
$_SESSION['old_value'] = [];

$data = [
    'title' => $_POST['title'] ?? null,
    'artist' => $_POST['artist'] ?? null,
    'lyrics' => $_POST['lyrics'] ?? null,
];

$_SESSION['old_value'] = $data;

if (!Helpers::filled($data['title'])) {
    $_SESSION['error_bag']['title'] = 'The title field is required';
}

if (!Helpers::filled($data['artist'])) {
    $_SESSION['error_bag']['artist'] = 'The artist field is required';
}

if (!Helpers::filled($data['lyrics'])) {
    $_SESSION['error_bag']['lyrics'] = 'The lyrics field is required';
}

if (Helpers::filled($_SESSION['error_bag'])) {
    header('Location: /exam-lyrics-cms/pages/create-lyrics.php');
} else {
    $song = new Songs;

    $song->create($data);

    unset($_SESSION['old_value'], $_SESSION['error_bag']);

    header('Location: /exam-lyrics-cms/pages/');
}
