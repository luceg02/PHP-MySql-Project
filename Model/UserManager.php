<?php
class UserManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        $email = htmlspecialchars($email);
        
        $req = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute(['email' => $email]);
        $user = $req->fetch();

        if ($user && password_verify(htmlspecialchars($password), $user['password'])) {
            return $user;
        }
        return false;
    }

    public function create($user) {
       $lastName = htmlspecialchars($user->getLastName());
       $firstName = htmlspecialchars($user->getFirstName());
       $email = htmlspecialchars($user->getEmail());
       $address = htmlspecialchars($user->getAddress());
       $cp = htmlspecialchars($user->getPostalCode());
       $city = htmlspecialchars($user->getCity());
       
       // Hashage sécurisé du mot de passe
       $hashedPassword = password_hash(
           htmlspecialchars($user->getPassword()), 
           PASSWORD_DEFAULT, 
           ['cost' => 12]
       );

        $req = $this->db->prepare(
        'INSERT INTO user (lastName, firstName, email, address, postalCode, city, password, admin)
        VALUES (:lastName, :firstName, :email, :address, :cp, :city, :password, 0)'
        );

        try {
            return $req->execute([
                'lastName' => $lastName,
                'firstName' => $firstName,
                'email' => $email,
                'address' => $address,
                'cp' => $cp,
                'city' => $city,
                'password' => $hashedPassword
            ]);
        } catch(PDOException $e) {
            error_log("Erreur création utilisateur : " . $e->getMessage());
            return false;
        }
    }

    //Find every users in the db
    public function findAll() {
        $users = array();

        $req = $this->db->prepare(
        'SELECT *
        FROM user');

        $req->execute();
        $users = $req->fetchAll();//get all

        return $users;
    }

    //Count the number of users
    public function countAll() {
        $req = $this->db->prepare(
        'SELECT COUNT(*)
        FROM user');

        $req->execute();
        $result = $req->fetch();

        return $result;
    }

    //Find one user by his id
    public function findOne($id) {
        $user = new User;

        $req = $this->db->prepare(
	    'SELECT *
        FROM user
        WHERE id=:id');

        $req->execute(
            array(
                'id' => $id,
            )
        );

        $user = $req->fetch(); //get the first user

        return $user;
    }

    //Find a user by his mail
    public function findByEmail($email) {
        $req = $this->db->prepare(
        'SELECT *
        FROM user
        WHERE email=:email');

        $req->execute(
            array(
                'email' => htmlspecialchars($email),
            )
        );

        $user = $req->fetch(); //get the first user

        return $user;
    }

    //Update an user of the db
    public function update($user) {
        try {
            // Si un nouveau mot de passe est fourni
            if ($user->getPassword()) {
                $hashedPassword = password_hash(
                    htmlspecialchars($user->getPassword()), 
                    PASSWORD_DEFAULT, 
                    ['cost' => 12]
                );
                
                $req = $this->db->prepare(
                'UPDATE user
                SET lastName = :lastName,
                    firstName = :firstName,
                    email = :email,
                    address = :address,
                    postalCode = :cp,
                    city = :city,
                    password = :password
                WHERE id = :id');

                return $req->execute([
                    'lastName' => htmlspecialchars($user->getLastName()),
                    'firstName' => htmlspecialchars($user->getFirstName()),
                    'email' => htmlspecialchars($user->getEmail()),
                    'address' => htmlspecialchars($user->getAddress()),
                    'cp' => htmlspecialchars($user->getPostalCode()),
                    'city' => htmlspecialchars($user->getCity()),
                    'password' => $hashedPassword,
                    'id' => $user->getId()
                ]);
            } else {
                $req = $this->db->prepare(
                'UPDATE user
                SET lastName = :lastName,
                    firstName = :firstName,
                    email = :email,
                    address = :address,
                    postalCode = :cp,
                    city = :city
                WHERE id = :id');

                return $req->execute([
                    'lastName' => htmlspecialchars($user->getLastName()),
                    'firstName' => htmlspecialchars($user->getFirstName()),
                    'email' => htmlspecialchars($user->getEmail()),
                    'address' => htmlspecialchars($user->getAddress()),
                    'cp' => htmlspecialchars($user->getPostalCode()),
                    'city' => htmlspecialchars($user->getCity()),
                    'id' => $user->getId()
                ]);
            }
        } catch(PDOException $e) {
            error_log("Erreur mise à jour utilisateur : " . $e->getMessage());
            return false;
        }
    }

    public function delete($user) {
        $req = $this->db->prepare(
        'DELETE FROM user
        WHERE id = :id');

        $req->execute(
            array('id' => $user->getId())
        );
    }

}