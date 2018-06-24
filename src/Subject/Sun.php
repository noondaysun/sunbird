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
     * What is the current hour
     *
     * @var integer
     */
    protected $hour = 0;
    
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
     * Fire when the day ends hour 23
     *
     * @return void
     */
    public function onDayEnd()
    {
        $this->event = 'Day Ended';
        $this->hour = 0;
        $this->notify();
    }
    
    /**
     * Fire when the day starts hour 00
     *
     * @return void
     */
    public function onDayStart()
    {
        $this->event = 'Day Started';
        $this->notify();
    }
    
    /**
     * Fire each time the hour changes
     * 
     * @return void
     */
    public function onHourChange()
    {
        $this->event = 'Hour Changed';
        $this->hour++;
        $this->notify();
    }
}