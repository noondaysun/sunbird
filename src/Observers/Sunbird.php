<?php 
declare(strict_types=1);
namespace Sunbird\Observers;

class Sunbird implements \SplObserver
{
    /**
     * @var  string
     */
    protected $name;

    /**
     * @var int
     */
    protected $priority = 0;
    
    /**
     * Accepts observer name and priority, default to zero
     */
    public function __construct($name, $priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }
    
    /**
     * Receive update from subject and print result
     *
     * {@inheritDoc}
     * @see \SplObserver::update()
     * @param \SplSubject $publisher
     * @return void
     */
    public function update(\SplSubject $publisher){
        
        print_r($this->name.': '. $publisher->getEvent(). PHP_EOL);
        
    }
    
    /**
     * Get observer priority
     *
     * @return int
     */
    public  function getPriority(){
        return $this->priority;
    }
}