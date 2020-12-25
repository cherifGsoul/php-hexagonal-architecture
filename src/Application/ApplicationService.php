<?php


namespace Taxation\Application;


interface ApplicationService
{
    public function execute(object $command);
}