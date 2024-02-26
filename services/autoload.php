<?php

// Require all the models
require 'models/Category.php';
require 'models/Picture.php';
require 'models/Project.php';
require 'models/User.php';

// Require all the managers
require 'managers/AbstractManager.php';
require 'managers/UserManager.php';
require 'managers/CategoryManager.php';
require 'managers/ProjetManager.php';
require 'managers/PictureManager.php';

// Require all the controllers
require 'controllers/AbstractController.php';
require 'controllers/UserController.php';
require 'controllers/CategoryController.php';
require 'controllers/ProjectController.php';
require 'controllers/PictureController.php';

// Require the router
require 'services/Router.php';

?>