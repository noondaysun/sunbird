<?php 
declare(strict_types=1);
namespace Sunbird\Subject;

use Sunbird\Traits\TimeTrait;

class Sun
{
    use TimeTrait;

    /**
     * Which event fired?
     *
     * @param string
     */
    protected $event;
    
    /**
     * Name of our subject
     *
     * @var string
     */
    protected $name;
    
    /**
     * Linked observers
     *
     * @var array
     */
    protected $observers = [];
    
    /**
     * Class constructor
     *
     * @param string $name
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * Attach an observer
     *
     * @param object $observer
     */
    public function attach(object $observer)
    {
        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
    }
    
    /**
     * Detach an observer
     * 
     * @param object $observer
     */
    public function detach(object $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
    }
    
    /**
     * Fire when the day ends hour 23
     *
     * @return void
     */
    public function onDayEnd()
    {
        $this->event = 'Day Ended';
        $this->fireLikeEventInObserver();
        $this->day++;
        $this->hour = 0;
        
        echo $this->event . '(' . $this->day . ')' . PHP_EOL;
        $this->onDayStart();
    }
    
    /**
     * Fire when the day starts hour 00
     *
     * @return void
     */
    public function onDayStart()
    {
        $this->event = 'Day Started';
        $this->fireLikeEventInObserver();
        echo $this->event . ' (' . $this->day . ')' . PHP_EOL;
        
        for ($i=0; $i<=23; $i++) {
            $this->onHourChange($i);
            if ($i === 23) {
                $this->onDayEnd();
            }
        }
    }
    
    /**
     * Fire each time the hour changes
     * 
     * @return void
     */
    public function onHourChange(int $hour)
    {
        $this->event = 'Hour Changed';
        echo $this->event . ' (' . $this->hour . ')' . PHP_EOL;
        $this->fireLikeEventInObserver();
        $this->hour++;
    }
    
    /**
     * Call the corresponding function in all observers
     *
     * @return void
     */
    protected function fireLikeEventInObserver()
    {
        $callingFunction = debug_backtrace()[1]['function'];
        foreach ($this->observers as $observer) {
            $observer->$callingFunction($this);
        }
    }
}