<?php 
declare(strict_types=1);
namespace Sunbird\Observers;

class Flower implements \SplObserver
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
     * Receive update from subject and print result
     *
     * {@inheritDoc}
     * @see \SplObserver::update()
     * @param \SplSubject $publisher
     * @return void
     */
    public function update(\SplSubject $publisher)
    {
        $flower = random_int(0, self::FLOWERS);
        var_dump(flower);
    }
    
    /**
     * How much total feed do we have left
     *
     * @return int
     */
    public function getFlowerFeedAmountRemaining(): int
    {
        return array_sum($this->flowerFeedAmount);
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