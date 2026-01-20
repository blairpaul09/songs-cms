<?php
session_start();

include './Songs.php';
include './Helpers.php';

if (Helpers::filled($_GET['id'] ?? '')) {

    $song = new Songs;

    $song->delete($_GET['id']);
}

header('Location: /exam-lyrics-cms/pages/');
