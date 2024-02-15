<?php

class Project {
    private ?int $id;
    private User $user;
    private string $title;
    private string $description;
    private ?string $beginning_date;
    private ?string $ending_date;
    private array $languages;
    private string $url;
    private string $github;
    private Category $category;

    public function __construct(User $user, string $title, string $description, ?string $beginning_date, array $languages, string $github, Category $category)
    {
        $this->id = null;
        $this->user = $user;
        $this->title = $title;
        $this->description = $description;
        $this->beginning_date = $beginning_date;
        $this->ending_date = null;
        $this->languages = $languages;
        $this->url = null;
        $this->github = $github;
        $this->category = $category;
    }

    public function getId() : ?int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getUser() : User
    {
        return $this->user;
    }
    public function setUser(User $user) : void
    {
        $this->user = $user;
    }

    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function getBeginningDate() : ?string
    {
        return $this->beginning_date;
    }
    public function setBeginningDate(string $beginning_date) : void
    {
        $this->beginning_date = $beginning_date;
    }

    public function getEndingDate() : ?string
    {
        return $this->ending_date;
    }
    public function setEndingDate(string $ending_date) : void
    {
        $this->end_date = $ending_date;
    }

    public function getLanguages() : array
    {
        return $this->languages;
    }
    public function setLanguages(array $languages) : void
    {
        $this->languages = $languages;
    }

    public function getUrl() : ?string
    {
        return $this->url;
    }
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    public function getGitHub() : string
    {
        return $this->github;
    }
    public function setGitHub(string $github) : void
    {
        $this->github = $github;
    }

    public function getCategory() : Category
    {
        return $this->category;
    }
    public function setCategory(Category $category) : void
    {
        $this->category = $category;
    }
}

?>