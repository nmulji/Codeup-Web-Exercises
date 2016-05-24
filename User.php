<?php

require_once 'adlister_credentials.php';
require_once 'db_connect.php';
require_once 'Model.php';

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record

        $add_user = "INSERT INTO users (name, email, password)
        VALUES (:name, :email, :password)";

        $stmt = self::$dbc->prepare($add_user);

        $stmt->bindValue(':name',       $this->name,         PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->email,        PDO::PARAM_STR);
        $stmt->bindValue(':password',   $this->password,     PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result) {
            $this->attributes['id'] = self::$dbc->lastInsertId();
        }   

    }

    /** Update existing entry in the database */
    protected function update()
    {
        // @TODO: Use prepared statements to ensure data security

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        $update_user = "UPDATE users
        SET name = :name, email = :email, password = :password
        WHERE id = :id";

        $stmt = self::$dbc->prepare($update_user);

        $stmt->bindValue(':id',         $this->id,           PDO::PARAM_INT);
        $stmt->bindValue(':name',       $this->name,         PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->email,        PDO::PARAM_STR);
        $stmt->bindValue(':password',   $this->password,     PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result) {
            $this->attributes['id'] = self::$dbc->lastInsertId();
        }

    }


    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        
        $select_user = 'SELECT * FROM users WHERE id = :id';

        $stmt = self::$dbc->prepare($select_user);

        $stmt->bindValue(':id',       $id,         PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
 

        // @TODO: Store the result in a variable named $result

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();

        $returnAll = "SELECT * FROM users";

        $returnAll->execute;


        // @TODO: Learning from the find method, return all the matching records
    }
}
