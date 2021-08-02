<?php
/**
 * Created by PhpStorm.
 * User: sanjulah
 * Date: 11/5/2019
 * Time: 9:47 AM
 */

namespace sanjula007\Press\Tests;


use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use sanjula007\Press\PressFileParser;

class PressFileParserTest extends TestCase
{
    /** @test */
    public function the_head_and_body_get_split()
    {
        $pressFileParser = (new PressFileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getRawData();

        $this->assertStringContainsString('title: My Title', $data[1]);
        $this->assertStringContainsString('description: Description here', $data[1]);
        $this->assertStringContainsString('Blog post body here', $data[2]);
    }


    /**     @test */
    public function each_head_field_gets_separated()
    {
        $pressFileParser = (new PressFileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();

        $this->assertStringContainsString('My Title', $data['title']);
        $this->assertStringContainsString('Description here', $data['description']);
    }

    /**
     * @test
     */
    public function the_body_gets_saved_and_trimmed()
    {
        $pressFileParser = (new PressFileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $pressFileParser->getData();
        dump($data['body']);
        $this->assertStringContainsString("Blog post body here", $data['body']);
    }

    /** @test */
    public function a_date_field_gets_parsed()
    {
        $pressFileParser = (new PressFileParser("---\r\ndate: May 14, 1988\r\n---\r\nBlog post body here"));
        $data = $pressFileParser->getData();

        $this->assertInstanceOf(Carbon::class, $data['date']);
        $this->assertEquals('05/14/1988', $data['date']->format('m/d/Y'));
    }

    /** @test */
    public function a_extra_field_gets_parsed()
    {
        $pressFileParser = (new PressFileParser("---\r\nauthor: John Doe\r\n---\r\nBlog post body here"));
        $data = $pressFileParser->getData();

        $this->assertEquals(json_encode(['author' => 'John Doe']), $data['extra']);
    }

    /** @test */
    public function two_additional_fields_are_into_extra()
    {
        $pressFileParser = (new PressFileParser("---\r\nauthor: John Doe\r\nimage: some/image.jpg\r\n---\r\nBlog post body here"));
        $data = $pressFileParser->getData();

        $this->assertEquals(json_encode(['author' => 'John Doe', 'image' => 'some/image.jpg']), $data['extra']);
    }
}
