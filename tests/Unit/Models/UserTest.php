<?php

namespace Tests\Unit\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
    * @param string $plan
    * @param int $remainingCount
    * @param int $reservationCount
    * @param bool $canReserve
    * @dataProvider dataCanReserve
    */
    public function testCanReserve(string $plan, int $remainingCount, int $reservationCount, bool $canReserve)
    {
        $user = new User();

        // パターン1
        $user->plan = 'regular';
        $remainingCount = 1;
        $reservationCount = 4;
        $this->assertTrue($user->canReserve($remainingCount, $reservationCount));

        // パターン2
        $user->plan = 'regular';
        $remainingCount = 1;
        $reservationCount = 5;
        $this->assertFalse($user->canReserve($remainingCount, $reservationCount));

        // 残りのパターン

        // パターン3
        $user->plan = 'regular';
        $remainingCount = 0;
        $reservationCount = 4;
        $this->assertTrue($user->canReserve($remainingCount, $reservationCount));

        // パターン4
        $user->plan = 'gold';
        $remainingCount = 1;
        $reservationCount = 5;
        $this->assertTrue($user->canReserve($remainingCount, $reservationCount));

        // パターン5
        $user->plan = 'gold';
        $remainingCount = 0;
        $reservationCount = 5;
        $this->assertTrue($user->canReserve($remainingCount, $reservationCount));
    }
}
