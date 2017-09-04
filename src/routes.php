<?php

// Routes , Front
$app->get('/' , $container[\App\Controller\Start\StartController::class]);

$app->get('/admin/', $container[\Admin\Controller\Dashboard\DashboardController::class]);