<?php 
declare(strict_types=1);
namespace Sunbird;

use Sunbird\Subject\Sun;
use Sunbird\Observers\Flower;
use Sunbird\Observers\Sunbird;

$flower = new Flower('The Flowers', 20);
$sunbird = new Sunbird('The Sunbird', 10);
$sun = new Sun('Day');