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
     * @param $input
     * @param $expected
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $tags = $this->parser->parse($input);

        $this->assertSame($expected, $tags);
    }

    public function tagsProvider()
    {
        return [
            'single_tag' => ['bread', ['bread']],
            'tags_with_comma' => ['bread, milk, meat', ['bread', 'milk', 'meat']],
            'tags_with_comma_and_no_spaces' => ['bread,milk,meat', ['bread', 'milk', 'meat']],
            'tags_with_pipe' => ['bread | milk | meat', ['bread', 'milk', 'meat']],
            'tags_with_pipe_and_no_spaces' => ['bread|milk|meat', ['bread', 'milk', 'meat']],
        ];
    }
}