<?php


use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    public function test_it_parse_a_comma_separated_list_tags()
    {
        $parser = new TagParser;

        $tags = $parser->parse('bread, milk, meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);

        $tags = $parser->parse('bread,milk,meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);
    }

    public function test_it_parse_a_pipe_separated_list_tags()
    {
        $parser = new TagParser;

        $tags = $parser->parse('bread | milk | meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);
    }
}