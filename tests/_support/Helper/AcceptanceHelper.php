<?php


namespace Helper;

use Codeception\Module;

/**
 * Class AcceptanceHelper
 * @package Helper
 */
class AcceptanceHelper extends Module
{
    /**
     * @param $content
     * @param int $trigger_length
     */
    public function seeContentIsLong($content, $trigger_length = 100)
    {
        $this->assertGreaterThan($trigger_length, strlen($content));
    }
}