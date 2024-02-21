<?php

class ProjetManager extends AbstractManager {
    private UserManager $um;
    private CategoryManager $cm;

    public function __construct()
    {
        parent::__construct();
        $this->um = new UserManager();
        $this->cm = new CategoryManager();
    }

    public function getProjectByName(string $name) : Project
    {
        $query=$this->db->prepare("SELECT * FROM projects WHERE projects.name = :name");
        $parameters=['name' => $name];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $project = new Project($this->um->getUserById($data['user_id']),
                                $data['title'],
                                $data['description'],
                                $data['beginning_date'],
                                json_decode($data['languages']),
                                $data['github'],
                                $this->cm->getCategoryById($data['catagory_id']));
        $project->setId($data['id']);

        return $project;
    }

    public function getProjectById(int $id) : Project
    {
        $query=$this->db->prepare("SELECT * FROM projects WHERE projects.id = :id");
        $parameters=['id' => $id];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $project = new Project($this->um->getUserById($data['user_id']),
                                $data['title'],
                                $data['description'],
                                $data['beginning_date'],
                                json_decode($data['languages']),
                                $data['github'],
                                $this->cm->getCategoryById($data['catagory_id']));
        $project->setId($data['id']);

        return $project;
    }

    public function addProject(Project $project)
    {
        $query=$this->db->prepare("INSERT INTO project (user_id, title, description, beginning_date, languages, github, category_id)
                                    VALUES (:user_id, :title, :description, :beginning_date, :languages, :github, :category_id)");
        $parameters = [
            'user_id' => $project->getUser()->getId(),
            'title' => $project->getTitle(),
            'description' => $project->getDescription(),
            'beginning_date' => $project->getBeginningDate(),
            'languages' => json_encode($project->getLanguages()),
            'github' => $project->getGithub(),
            'category_id' => $project->getCategory()->getId()
        ];
        $query->execute($parameters);

        $data=$query->fecth(PDO::FETCH_ASSOC);
        $project->setId($this->db->lastInsertId());

        return $project;
    }
}

?>