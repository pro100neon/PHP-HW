<?php
abstract class PublicationClass
{
    abstract public function getSource();
    abstract public function getContent();
    abstract public function getAll();
}


class News extends PublicationClass
{
    private $title;
    private $text;
    private $link;

    public function __construct(string $title, string $text, string $link)
    {
        $this->title = $title;
        $this->text = $text;
        $this->link = $link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSource(): string
    {
        return $this->link;
    }

    public function getContent(): string
    {
        return $this->text;
    }

    public function getAll() {}
}

class Announce extends PublicationClass
{
    private $title;
    private $text;
    private $author;

    public function __construct(string $title, string $text, string $author)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSource(): string
    {
        return $this->author;
    }

    public function getContent(): string
    {
        return $this->text;
    }

    public function getAll() {}
}


interface ConnectionInterface
{
    public function query(string $queryString, array $queryParams, array $queryParamsType): array;
    public function execute(string $queryString, array $queryParams, array $queryParamsType): void;
}

class MySQLConnection implements ConnectionInterface
{
    private $connString = "mysql:host=localhost;dbname=my_db";
    private $connLogin = "php";
    private $connPassword = "php";
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO($this->connString,$this->connLogin,$this->connPassword);
    }

    public function query(string $queryString, array $queryParams, array $queryParamsType): array
    {
        $queryExe = $this->pdo->prepare($queryString);
        $resultArray = [];
        foreach ($queryParams as $paramName => $paramValue)
        {
            $queryExe->bindValue(":$paramName", $paramValue, $queryParamsType[$paramName]);
        }
        $queryExe->execute();
        $resultArray = $queryExe->fetchAll(PDO::FETCH_ASSOC);
        return $resultArray;
    }

    public function execute(string $queryString, array $queryParams, array $queryParamsType): void
    {
        $queryExe = $this->pdo->prepare($queryString);
        foreach ($queryParams as $paramName => $paramValue)
        {
            $queryExe->bindValue(":$paramName", $paramValue, $queryParamsType[$paramName]);
        }
        $queryExe->execute();
    }
}

class NewsDB {
    private $conn;

    public function __construct(ConnectionInterface $dbConn)
    {
        $this->conn = $dbConn;
    }

    public function all(): array
    {
        $array = $this->conn->query('select title,text,link from my_db.news', [], []);
        $i = 0;
        $newsArray = [];
        foreach ($array as $element)
        {
            $newsArray[$i] = new News($element['title'],$element['text'],$element['link']);
            $i++;
        }
        return $newsArray;
    }

    public function create(string $title, string $text, string $source): News
    {
        $this->conn->execute('insert into my_db.news (title, text, link) values (:title, :text, :link)',
            ['title' => $title, 'text' => $text, 'link' => $source],
            ['title' => PDO::PARAM_STR, 'text' => PDO::PARAM_STR, 'link' => PDO::PARAM_STR]);
        return new News($title, $text, $source);
    }

}

class AnnounceDB {
    private $conn;

    public function __construct(ConnectionInterface $dbConn)
    {
        $this->conn = $dbConn;
    }

    public function all(): array
    {
        $array = $this->conn->query('select title,text,author from my_db.announces', [], []);
        $i = 0;
        $newsArray = [];
        foreach ($array as $element)
        {
            $newsArray[$i] = new Announce($element['title'],$element['text'],$element['author']);
            $i++;
        }
        return $newsArray;
    }

    public function create(string $title, string $text, string $source): Announce
    {
        $this->conn->execute('insert into my_db.announces (title, text, author) values (:title, :text, :author)',
            ['title' => $title, 'text' => $text, 'author' => $source],
            ['title' => PDO::PARAM_STR, 'text' => PDO::PARAM_STR, 'author' => PDO::PARAM_STR]);
        return new Announce($title, $text, $source);
    }
}

$connection = new MySQLConnection();

$connection->execute('delete from my_db.news', [], []);
$connection->execute('delete from my_db.announces', [], []);

$newsDB = new NewsDB($connection);
$announceDB = new AnnounceDB($connection);

for ($i = 0; $i < 10; $i++)
{
    $newsDB->create('Заголовок новости_'.($i + 1), 'Текст новости_'.($i + 1), 'Линк новости_'.($i + 1));
    $announceDB->create('Заголовок объявления_'.($i + 1), 'Текст объявления_'.($i + 1), 'Автор объявления_'.($i + 1));
}

$newsArray = $newsDB->all();
$announceArray = $announceDB->all();

$publicationArray = $newsArray;
$newsLength = count($newsArray);
for ($i = 0; $i < count($announceArray); $i++)
{
    $publicationArray[$i + $newsLength] = $announceArray[$i];
}

for ($i = 0; $i < count($publicationArray); $i++)
{
    echo $publicationArray[$i]-> getTitle(), " ",
    $publicationArray[$i]-> getContent(), " ",
    $publicationArray[$i]-> getSource(), "\n";
}


