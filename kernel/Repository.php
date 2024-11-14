<?php
namespace Keha\Kernel;

use Keha\Kernel\DbContext;

class Repository {
    private \PDO $connexion;
    private string $model;
    private string $table;
    private ?string $sql;
    private ?\PDOStatement $request;

    public function __construct(string $model) {
        $this->connexion = DbContext::getConnexion();
        $this->table = $model;
        $this->model = $_ENV['model'].$model;
    }

    public function getById(int $id): array
    {
        $this->sql = 'select * from '.$this->table.' where id = ?';
        $this->prepare([$id]);
        return $this->flush();
    }

    public function getAll(): array
    {
        $this->sql = 'select * from '.$this->table;
        $this->prepare();
        return $this->flush();
    }

    public function prepare(?array $args = null): void
    {
        $this->request = $this->connexion->prepare($this->sql);
        $this->request->execute($args);
    }

    public function flush(): array
    {
        return $this->request->fetchAll(\PDO::FETCH_CLASS, $this->model);
    }

    public function insert($entity) {
        var_dump(get_object_vars($entity));
        $sql = 'insert into '.$this->table.' values (NULL, )';
    }
}