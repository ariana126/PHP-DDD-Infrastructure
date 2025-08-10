<?php

namespace DDD\Application;

interface QueryHandler
{
    public function execute(Query $query): QueryResult;
}