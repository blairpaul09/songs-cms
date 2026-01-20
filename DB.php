<?php

class DB
{
    private string $host = '127.0.0.1';
    private int $port = 3006;
    private string $username = 'root';
    private string $password = '';
    private ?string $database = null;

    public function __construct(array $configs = [])
    {
        $this->setDBCredentials($configs);
    }

    private function setDBCredentials(array $configs): void
    {
        foreach ($configs as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->database};port={$this->port};charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);

            return $pdo;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
