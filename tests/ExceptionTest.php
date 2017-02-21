<?php

use IBurn36360\TwitchInterface\Exception as TIException;

/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2/18/2017
 * Time: 11:17 PM
 */
class ExceptionTest extends PHPUnit_Framework_TestCase {
    private $exceptionClasses = array(
        'CallFailureException',
        'IncompleteConfigurationException',
        'InvalidParameterException',
        'UnknownEndpointException',
        'UnknownModuleException',
        'UnknownPropertyException'
    );

    private $exceptionNamespace = 'IBurn36360\\TwitchInterface\\Exception\\';

    public function testNamespaceAutoload() {
        foreach ($this->exceptionClasses as $className) {
            $className = "{$this->exceptionNamespace}$className";
            new $className();
        }
    }

    public function testExceptionContainerInheritance() {
        foreach ($this->exceptionClasses as $className) {
            $className = "IBurn36360\\TwitchInterface\\Exception\\$className";

            $this->assertInstanceOf(
                TIException\Exception::class,
                new $className()
            );
        }
    }

    public function testExceptionContainerIsException() {
        $this->assertInstanceOf(
            \Exception::class,
            new TIException\Exception()
        );
    }
}