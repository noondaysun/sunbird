<?php 
declare(strict_types=1);
namespace Sunbird\Subject;

class Sun implements \SplSubject
{
    /**
     * Daylight hours
     * @var array
     */
    const DAY = [
        7,8,9,10,11,12,13,14,15,16,17,18
    ];
    
    /**
     * Night hours
     * @var array
     */
    const NIGHT = [
        19,20,21,22,23,0,1,2,3,4,5,6
    ];
    
    /**
     * Which event fired?
     *
     * @param string
     */
    protected $event;
    
    /**
     * Linked list of observers
     *
     * @var array
     */
    protected $linkedList = array();
    
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
     * @param \SplObserver $observer
     */
    public function attach(\SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
        $this->linkedList[$observerKey] = $observer->getPriority();
        arsort($this->linkedList);
    }
    
    /**
     * Detach an observer
     * 
     * @param \SplObserver $observer
     */
    public function detach(\SplObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
        unset($this->linkedList[$observerKey]);
    }
    
    /**
     * Notify all observers of a change
     *
     * @return void 
     */
    public function notify()
    {
        foreach ($this->linkedList as $key => $value) {
            $this->observers[$key]->update($this);
        }
    }
    
    /**
     * Set or update event
     *
     * @param $event
     * @return void
     */
    public function setEvent($event)
    {
        $this->event = $event;
        $this->notify();
    }
    
    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }
    
    /**
     * Check to see if the current hour is during the day, or not
     *
     * @param int $hour
     * @return bool
     */
    public function checkHourDuringDaylightHours(int $hour): bool
    {
        return in_array($hour, self::DAY);
    }
}