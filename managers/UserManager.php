<?php

class UserManager extends AbstractManager {
    public function addUser(User $user)
    {
        $query=$this->db->prepare("INSERT INTO users (first_name, last_name, email, password) 
                                    VALUES (:first_name, :last_name, :email, :password)");
        $parameters = [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $user->setId($this->db->lastInsertId());

        return $user;
    }

    public function getUserById(int $id) : User
    {
        $query=$this->db->prepare("SELECT * FROM users WHERE users.id = :id");
        $parameters=['id' => $id];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $user = new User($data['first_name'], $data['last_name'], $data['email'], $data['password']);
        $user->setId($data['id']);

        return $user;
    }

    public function getUserByEmail(string $email) : User
    {
        $query=$this->db->prepare("SELECT * FROM users WHERE users.email = :email");
        $parameters=['email' => $email];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $user = new User($data['first_name'], $data['last_name'], $data['email'], $data['password']);
        $user->setId($data['id']);

        return $user;
    }
}

?>