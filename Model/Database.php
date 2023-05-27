<?php
class DBconnection
{
    public $connection;
    public function __construct()
    {
        $config = [
            'host' => 'localhost',
            'dbname' => 'NoteApp',
            'charset' => 'utf8mb4'
        ];
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $username = 'ephrem';
        $password = '1234';
        $this->connection = new PDO($dsn, $username, $password);
    }
    function Query($query, $params)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function ReadOrInsert($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function Insert($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        echo "inserted";
    }
    function SearchEmail($value)
    {
        $qry = 'select * from User where email= :email';
        $stmt = $this->connection->prepare($qry);
        $stmt->execute(['email' => $value]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
