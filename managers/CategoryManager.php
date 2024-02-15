<?php

class CategoryManager extends AbstractManager {
    public function addCategory(Category $category)
    {
        $query=$this->db->prepare("INSERT INTO categories (name) VALUES (:name)");
        $parameters=['name' => $category->getName()];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $category->setId($this->db->lastInsertId());

        return $category;
    }

    public function getCategoryByName(string $name) : Category
    {
        $query=$this->db->prepare("SELECT * FROM categories WHERE categories.name = :name");
        $parameters=['name' => $name];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $category = new Category($data['name']);
        $category->setId($data['id']);

        return $category;
    }
}

?>