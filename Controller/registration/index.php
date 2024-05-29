<?php

Middleware::restrict();
Validation::unsetAttributes('login');

view("registration/index.view.php");