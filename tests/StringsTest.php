<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        // TODO "Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");

        // TODO "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        // TODO Heredoc
        $this->assertEquals('Hello world',<<<WOW
Hello $foo
WOW);

        // TODO Nowdoc
        $this->assertEquals('Hello $foo',<<<'WOW'
Hello $foo
WOW);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello', ltrim('   Hello'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals('Hello', rtrim('Hello!!!!,','!\,'));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hELLO', lcfirst('HELLO'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('Hello', strip_tags('Hello<br>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&lt;a href=\'Hello\'&gt;Test&lt;/a&gt;', htmlspecialchars('<a href=\'Hello\'>Test</a>'));

        // addslashes — Quote string with slashes
        $this->assertEquals("Hello O\'Reilly", addslashes("Hello O'Reilly"));

        // strcmp — Binary safe string comparison
        $this->assertEquals('1', strcmp('hello', 'Hello'));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals('0', strncasecmp('Hello', 'hello', 1));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('Hello world!', str_replace('Andrew', 'world', 'Hello Andrew!'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('8', strpos('fjebcysoam','a'));

        // strstr — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('name', strstr('name@gmail.com', '@', true));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals("eris", strrchr('kdjeris', 'e'));

        // substr — Return part of a string
        $this->assertEquals('worl', substr('Hello world', 6, 4));

        // sprintf — Return a formatted string
        $this->assertEquals('I got 80 from 100 in my English exam', sprintf('I got %d from 100 in my %s exam', 80, 'English' ));
    }
}