<?php


class BasicStringReplacementTest extends \PHPUnit\Framework\TestCase
{

    public function testSingleQuoteEscape()
    {
        $string = "'test";
        $s1 = mysql_escape_string($string);
        $s2 = "\'test";
        $this->assertEquals($s2, $s1);
    }

    public function testDoubleQuoteEscape()
    {
        $string = "\"test";
        $s1 = mysql_escape_string($string);
        $s2 = '\"test';
        $this->assertEquals($s2, $s1);
    }

    public function testUnEscapedSlashEscape()
    {
        $string = "\\test\\";
        $s1 = mysql_escape_string($string);
        $s2 = '\\\\test\\\\';
        $this->assertEquals($s2, $s1);
    }

    public function testPercentEscape()
    {
        $string = '%test';
        $s1 = mysql_escape_string($string);
        $s2 = '\\%test';
        $this->assertEquals($s2, $s1);
    }

    public function testComplexString()
    {
        $string = chr(26) . "%test\n\\";
        $s1 = mysql_escape_string($string);
        $s2 = "\\z\%test\\n\\\\";
        $this->assertEquals($s2, $s1);
    }
}
