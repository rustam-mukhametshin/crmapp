<?php


namespace _support;


class AcceptanceHelper
{
    /**
     * @param $content
     * @param int $trigger_length
     */
    public function seeContentIsLong($content, $trigger_length = 100)
    {
        $this->assertGreatherThen($trigger_length, strlen($content));
    }
}