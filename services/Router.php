<?php

class Router {
    private UserController $uc;
    private CategoryController $cc;
    private PictureController $pic;
    private ProjectController $pc;

    public function __construct()
    {
        $this->uc = new UserController();
        $this->pc = new ProjectController();
        $this->pic = new PictureController();
        $this->cc = new CategoryController();
    }

    private function splitRouteAndParameters(string $route) : array
    {

    }

    public function checkRoute(string $route) : void
    {
        
    }
}

?>