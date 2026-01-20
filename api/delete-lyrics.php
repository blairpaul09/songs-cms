<?php
session_start();

include __DIR__ . '/../models/Songs.php';
include __DIR__ . '/../helpers/Helpers.php';

if (Helpers::filled($_GET['id'] ?? '')) {

    $song = new Songs;

    $song->delete($_GET['id']);
}

header('Location: /exam-lyrics-cms/pages/');
