<?php
declare(strict_types = 1);

namespace Sunbird\Interfaces;

interface Observer
{
        /**
         * Receive update from subject
         * @param SplSubject $subject
         * @return void
         */
        public function update (Subject $subject);

}
