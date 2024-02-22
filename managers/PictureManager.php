<?php

class PictureManager extends AbstractManager {
    private ProjetManager $pm;

    public function __construct()
    {
        parent::__construct();
        $this->pm = new ProjetManager();
    }

    public function addPicture(Picture $picture)
    {
        $query=$this->db->prepare("INSERT INTO pictures (project_id, alt, url) VALUES (:project_id, :alt, :url)");
        $parameters = [
            'project_id' => $picture->getProject()->getId(),
            'alt' => $picture->getAlt(),
            'url' => $picture->getUrl(),
        ];
        $query->execute($parameters);

        $data=$query->fetch(PDO::FETCH_ASSOC);
        $picture->setId($this->db->lastInsertId());

        return $picture;
    }

    public function getPicturesByProject(int $id) : array
    {
        $query=$this->db->prepare('SELECT * FROM pictures WHERE pictures.project_id = :id');
        $parameters=['id' => $id];
        $query->execute($parameters);

        $pictures = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($pictures as $picture)
        {
            $picture['project_id'] = $this->pm->getProjectById($picture['project_id']);
        }

        return $pictures;
    }
}

?>