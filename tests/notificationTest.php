<?php
class ShouldNotifyCustomerUnitTest extends \PHPUnit_Framework_TestCase {
    public function testHenkWithHighUsage() {
        $this->assertTrue(shouldNotifyCustomer("henk@example.com", 0.76));
    }

    public function testHenkWithLowUsage() {
        $this->assertFalse(shouldNotifyCustomer("henk@example.com", 0.75));
    }

    public function testOtherWithHighUsage() {
        $this->assertFalse(shouldNotifyCustomer("other@example.com", 0.76));
    }

    public function testOtherWithLowUsage() {
        $this->assertFalse(shouldNotifyCustomer("other@example.com", 0.75));
    }
}

class NotifyCustomerUnitTest extends \PHPUnit_Framework_TestCase {
    public function testMailIsSent() {
        $stub = $this->getMockBuilder('Mailer')->getMock();
        $stub->method('send')->willReturn(true);
        $this->assertTrue(notifyCustomer($stub, 'user@example.com', 0.9));
    }
}

class checkUsageAndNotifyIntegrationTest extends \PHPUnit_Framework_TestCase {
    public function testIntegration() {
        $mock = $this->getMockBuilder('Mailer')
                     ->setMethods(array('send'))
                     ->getMock();

        $mock->expects($this->once())
            ->method('send')
            ->with('henk@example.com', 'High usage', 'Your usage is high: 1');

        checkUsageAndNotify($mock);
    }
}
