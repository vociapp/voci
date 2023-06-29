<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;


class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $pdo = DB::connection()->getPdo();
        $this->assertInstanceOf(\PDO::class, $pdo);
    }
    
}
