<?php 
declare(strict_types=1);
namespace Sunbird\Observers;

use Sunbird\Subject\Sun;

class Sunbird
{
    /**
     * Daylight hours
     * @var array
     */
    protected $dayHours = [
        0,1,2,3,4,5,6,7,8,9,10,11
    ];
    
    /**
     * @var  string
     */
    protected $name;
    
    /**
     * Accepts observer name
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * Fire when the day ends hour 23
     *
     * @return void
     */
    public function onDayEnd(Sun $sun)
    {
        
    }
    
    /**
     * Fire when the day starts hour 00
     *
     * @return void
     */
    public function onDayStart(Sun $sun)
    {
        
    }
    
    /**
     * Fire each time the hour changes
     *
     * @return void
     */
    public function onHourChange(Sun $sun)
    {
        $this->event = 'Hour Changed';
        echo 'Hour: ' . $sun->getHour() . PHP_EOL;
        if (!$this->testIfHourDuringDay($sun->getHour())) {
            echo 'Sleep' . PHP_EOL;
        }
    }
    
    /**
     * Should we be feeding the sunbirds
     *
     * @param int $hour
     * @return bool
     */
    private function testIfHourDuringDay(int $hour): bool
    {
        return in_array($hour, $this->dayHours);
    }
}