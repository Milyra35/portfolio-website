<?php

class PictureController extends AbstractController {
    private PictureManager $pm;

    public function __construct()
    {
        $this->pm = new PictureManager();
    }
}

?>