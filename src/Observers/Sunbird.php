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
     * Accepts observer name
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
}