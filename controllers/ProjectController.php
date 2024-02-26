<?php

class ProjectController extends AbstractController {
    private ProjetManager $pm;

    public function __construct()
    {
        $this->pm = new ProjetManager();
    }
}

?>