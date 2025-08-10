<?php

namespace DDD\Application;

interface CommandHandler
{
    public function execute(Command $command): void;
}