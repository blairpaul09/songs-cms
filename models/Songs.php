<?php

include __DIR__ . '/../database/DB.php';

class Songs
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DB::connect();
    }

    public function list(): array
    {
        $sql = "SELECT * FROM songs";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $sosngs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $sosngs;
    }

    public function create(array $data): void
    {
        $sql = "INSERT INTO songs (title, artist, lyrics) VALUES (:title, :artist, :lyrics)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':title' => $data['title'],
            ':artist' => $data['artist'],
            ':lyrics' => $data['lyrics'],
        ]);
    }

    public function find(int $id): array
    {
        $sql = "SELECT * FROM songs WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([':id' => $id]);

        $song = $stmt->fetch(PDO::FETCH_ASSOC);

        return $song;
    }

    public function update(int $id, array $data): void
    {
        $sql = "UPDATE songs SET title = :title, artist = :artist, lyrics = :lyrics WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':title' => $data['title'],
            ':artist' => $data['artist'],
            ':lyrics' => $data['lyrics'],
            ':id' => $id,
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM songs WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([':id' => $id]);
    }
}
