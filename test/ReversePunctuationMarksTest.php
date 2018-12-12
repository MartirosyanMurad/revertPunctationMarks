<?php
namespace Test;

use App\ReversePunctuationMarks;
use PHPUnit\Framework\TestCase;

class ReversePunctuationMarksTest extends TestCase
{
    public function testMarksRevers()
    {
        $test = new ReversePunctuationMarks();
        $this->assertEquals('Привет?&nbsp;Как&nbsp;твои&nbsp;дела!',$test->getSentence('Привет! Как твои дела?'));
    }
}