<?php 

declare(strict_types=1);
namespace Sunbird\Traits;

trait TimeTrait
{
    /**
     * Which day are we on
     *
     * @var int
     */
    protected $day = 0;
    
    /**
     * Which hour is it?
     * @var int
     */
    protected $hour = 0;
    
    /**
     * 
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }
    
    /**
     * Get the current hour
     *
     * @return int
     */
    public function getHour(): int
    {
        return $this->hour;
    }
}