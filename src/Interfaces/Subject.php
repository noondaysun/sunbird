<?php
declare(strict_types = 1);

namespace Sunbird\Interfaces;

interface Subject
{

        /**
         * Attach an Observe
         * @param Observer $observer
         * @return void
         */
        public function attach (Observer $observer);

        /**
         * Detach an observer
         * @param Observer $observe
         * @return void
         */
        public function detach (Observer $observer);

        /**
         * Notify an observer
         * @return void
         */
        public function notify ();

}
