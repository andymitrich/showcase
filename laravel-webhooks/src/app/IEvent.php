<?php

namespace App;

interface IEvent
{
    /**
     * @return string
     */
    public function getContent();
}
