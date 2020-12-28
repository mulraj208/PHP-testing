<?php


use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    protected $parser;

    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    /**
     * @test
     */
    public function it_parses_a_single_tag()
    {
        $tags = $this->parser->parse('bread');
        $expected_tags = ['bread'];

        $this->assertSame($expected_tags, $tags);
    }

    /**
     * @test
     */
    public function it_parse_a_comma_separated_list_tags()
    {
        $tags = $this->parser->parse('bread, milk, meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);

        $tags = $this->parser->parse('bread,milk,meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);
    }

    /**
     * @test
     */
    public function it_parse_a_pipe_separated_list_tags()
    {
        $tags = $this->parser->parse('bread | milk | meat');
        $expected_tags = ['bread', 'milk', 'meat'];

        $this->assertSame($expected_tags, $tags);
    }
}