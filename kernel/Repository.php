<?php
namespace Keha\Kernel;

use Keha\Kernel\DbContext;

/*
* Classe qui a la responsabilité de créer des requêtes vers la BDD
*/
class Repository {
    private \PDO $connexion;
    private string $model;
    private string $table;
    private ?string $sql;
    private ?\PDOStatement $request;

    /*
    * Crée une connexion à la BDD via DbContext
    * Prend un paramètre qui est le nom de la table à adresser
    */
    public function __construct(string $model) {
        $this->connexion = DbContext::getConnexion();
        $this->table = $model;
        // Se réfère à la classe sur laquelle mapper les résultats
        $this->model = $_ENV['model'].$model;
    }

    /*
    * Récupère un objet en fonction de l'id fournit en paramètre
    */
    public function getById(int $id): ?object
    {
        $this->sql = 'select * from '.$this->table.' where id = ?';
        $this->prepare([$id]);
        return $this->getResult(false);
    }

    /*
    * Récupère un tableau d'objets depuis la BDD
    */
    public function getAll(): ?array
    {
        $this->sql = 'select * from '.$this->table;
        $this->prepare();
        return $this->getResult();
    }

    /*
    * Récupère les enregistrements en fonction des paramètres passés en arguments
    * 
    */
    public function getByAttribute($attribute, $value)
    {
        $this->sql = 'select * from '.$this->table.' where '.$attribute.' = ?';
        $this->prepare([$value]);
        return $this->getResult();
    }

    /*
    * Récupère un jeu de résultats
    * si $all vaut true, tout le tableau est renvoyé
    * sinon , seul le premier élément du tableau est renvoyé
    */
    private function getResult(bool $all =true): mixed
    {
        $result = $this->flush();
        if ($result) {
            if ($all === true) {
                return $result;
            }
            return $result[0];            
        } else {
            return null;
        }
    }

    /*
    * Crée un nouvel enregistrement à partir d'un objet de type Model
    * 
    *
    */
    public function insert($entity):void {
        //Récupère les noms des colonnes de la table qui correspond à l'entité
        $columns = $this->showColumn();
        $values = [];
        $attributes = '';
        $count = count($columns)-1;
        foreach ( $columns as $key=>$column) {
            //on crée dynamiquement le getter pour la proprité de la classe
            $getterFunction = 'get'.ucfirst($column);
            // On inèsre dans le tableau getter la valeur pour la proprité de l'objet entity
            $values[] = $entity->$getterFunction();
            // On gère les attributs pour la requête préparée
            if ($key != $count) {
                $attributes .= '? ,';
            } else {
                $attributes .= '?';
            }    
        }
        // On écrit la requête SQL
        $this->sql = 'insert into '.$this->table.' values ('.$attributes.')';
        // On prépare et exécute la requête d'insertion
        $this->prepare($values);
    }

    public function update($entity):void
    {
        $columns = $this->showColumn();
        $values = [];
        $set = '';
        $count = count($columns)-1;
        foreach ($columns as $key=>$column) {
            // on récupère le nom de la méthode accesseur
            $getterFunction = 'get'.ucfirst($column);
            // on récupère la valeur en appelant l'accesseur
            $values[] = $entity->$getterFunction();
            if ($key != $count) {
                $set .= ' '.$column.'= ? ,';
            } else {
                $set .= ' '.$column.'= ?';
            }
        }

        $this->sql = 'update '.$this->table.' set '.$set.' where id='.$entity->getId();
        $this->prepare($values);
    }


    /*
    * Récupère les informations des colonnes
    * pour une table
    */
    private function showColumn(): array
    {
        $this->sql = 'SHOW COLUMNS FROM '.$this->table;
        $this->prepare();
        $columns = $this->request->fetchAll();
        $return = [];
        //Récupère le nom de la colonne
        foreach ($columns as $column) {
            $return[] = $column[0];
        }
        return $return;
    }

    
    /*
    * Pépare et exécute une requête
    * le paramètre args est un tableau d'arguments pour la requête SQL
    */
    public function prepare(?array $args = null): void
    {
        $this->request = $this->connexion->prepare($this->sql);
        if ($args !== null) {
            $args = PrepareSqlRequest::sanitize($args);
        }
        $this->request->execute($args);
    }

    /*
    * Récupère un jeu de données (requête select) et 
    * mappe les résultats sur la classe correspondante à la table
    */
    public function flush(): array
    {
        return $this->request->fetchAll(\PDO::FETCH_CLASS, $this->model);
    }

}