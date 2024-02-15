<?php

class Picture {
    private ?int $id;
    private Project $project;
    private string $alt;
    private string $url;

    public function __construct(Project $project, string $alt, string $url)
    {
        $this->id = null;
        $this->project = $project;
        $this->alt = $alt;
        $this->url = $url;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getProject(): Project
    {
        return $this->project;
    }
    public function setProject(Project $project) : void
    {
        $this->project = $project;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }
    public function setAlt(string $alt) : void
    {
        $this->alt = $alt;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }
}

?>