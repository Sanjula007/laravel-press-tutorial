<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/4/2019
 * Time: 5:11 PM
 */

namespace sanjula007\Press\Tests;


use Orchestra\Testbench\TestCase;
use Parsedown;
use sanjula007\Press\MarkdownParser;


class MarkDownParserTest extends TestCase
{
    /** @test */
    public function experiment()
    {
        $parsedown = new Parsedown();
        $outout = MarkdownParser::parse('# Heading');
        $this->assertStringContainsStringIgnoringCase("Heading", $outout);
    }
}
