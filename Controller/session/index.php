<?php

Middleware::restrict();
Validation::unsetAttributes('registration');

view("session/index.view.php");