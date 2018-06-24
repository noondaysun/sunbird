<?php 
declare(strict_types=1);
namespace Sunbird\Observers;

use Sunbird\Subject\Sun;

class Flower
{
    /**
     * How many flowers are there in total
     *
     * @var integer
     */
    const FLOWERS = 10;
    
    /**
     * How many times can a single flower be fed upon
     *
     * @var integer
     */
    const FEEDAMOUNT = 10;
    
    /**
     * Daylight hours
     * @var array
     */
    protected $dayHours = [
        0,1,2,3,4,5,6,7,8,9,10,11
    ];
    
    /**
     * List each flowers available feed
     *
     * @var array
     */
    protected $flowerFeedAmount = [];
    
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
        $this->setUpFlowerFeedAmounts();
    }
    
    /**
     * Fire when the day ends hour 23
     *
     * @return void
     */
    public function onDayEnd(Sun $sun)
    {
        $this->event = 'Day Ended';
    }
    
    /**
     * Fire when the day starts hour 00
     *
     * @return void
     */
    public function onDayStart(Sun $sun)
    {
        $this->event = 'Day Started';
        
    }
    
    /**
     * Fire each time the hour changes
     *
     * @return void
     */
    public function onHourChange(Sun $sun)
    {
        
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
    
    /**
     * Initial setup of feed amounts per flower
     *
     * @return bool
     */
    private function setUpFlowerFeedAmounts(): bool
    {
        if (!empty($this->flowerFeedAmount)) {
            return false;
        }
        for ($i=0; $i<10; $i++) {
            $this->flowerFeedAmount[$i] = self::FEEDAMOUNT;
        }
        return true;
    }
}