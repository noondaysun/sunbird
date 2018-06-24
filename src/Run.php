<?php 
declare(strict_types=1);
namespace Sunbird;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Sunbird\Subject\Sun;
use Sunbird\Observers\{Flower, Sunbird};

// The subject
$sun = new Sun('Day');
// It's observers
$flower = new Flower('The Flowers');

$sun->attach($flower);
$sun->attach(new Sunbird('The Sunbird'));

$sun->onDayStart();