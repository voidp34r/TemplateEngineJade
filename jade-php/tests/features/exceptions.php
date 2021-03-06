<?php

class JadeExceptionsTest extends PHPUnit_Framework_TestCase {

    /**
     * @expectedException Exception
     */
    public function testDoNotUnderstand() {

        get_php_code('a(href=="a")');
    }

    /**
     * @expectedException Exception
     */
    public function testUnexpectingValue() {

        get_php_code('a(href="foo""bar")');
    }

    /**
     * @expectedException Exception
     */
    public function testExpectedIndent() {

        get_php_code(':a+()');
    }

    /**
     * @expectedException Exception
     */
    public function testUnexpectingToken() {

        get_php_code('a:' . "\n" . '!!!5');
    }

    /**
     * @expectedException Exception
     */
    public function testExceptionThroughtJade() {

        get_php_code('a(href="a" . (throw new Exception("Error Processing Request", 1)) . "b")');
    }

    /**
     * @expectedException Exception
     */
    public function testNonParsableExtends() {

        get_php_code(__DIR__ . '/../templates/auxiliary/extends-failure.jade');
    }

    /**
     * @expectedException Exception
     */
    public function testBrokenExtends() {

        get_php_code(__DIR__ . '/../templates/auxiliary/extends-exception.jade');
    }
}
