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
        $columns = $this->showColumn();
        $getter = [];
        $attributes = '';
        $count = count($columns)-1;
        foreach ( $columns as $key=>$column) {
            $getterFunction = 'get'.ucfirst($column);
            $getter[] = $entity->$getterFunction();
            if ($key != $count) {
                $attributes .= '? ,';
            } else {
                $attributes .= '?';
            }
            
        }
        var_dump($getter);
        $this->sql = 'insert into '.$this->table.' values ('.$attributes.')';
        $this->prepare($getter);
    }

    private function showColumn()
    {
        $this->sql = 'SHOW COLUMNS FROM '.$this->table;
        $this->prepare();
        $columns = $this->request->fetchAll();
        $return = [];
        foreach ($columns as $column) {
            $return[] = $column[0];
        }
        return $return;
    }
}