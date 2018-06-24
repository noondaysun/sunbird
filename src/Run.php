<?php 
declare(strict_types=1);
namespace Sunbird;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Sunbird\Subject\Sun;
use Sunbird\Observers\{Flower, Sunbird};

$flower = new Flower('The Flowers', 20);
$sunbird = new Sunbird('The Sunbird', 10);
$sun = new Sun('Day');

$sun->attach($flower);
$sun->attach($sunbird);

for ($i=0; $i<$flower->getFlowerFeedAmountRemaining(); $i++) {
    $sun->onDayStart();
    $sun->onHourChange();
}