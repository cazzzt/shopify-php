<?php
/**
 * @copyright Copyright (c) 2017 Shopify Inc.
 * @license MIT
 */

namespace Shopify;

class ShopifyCheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $mockClient;

    public function setUp()
    {
        $this->mockClient = $this->getMockBuilder('Shopify\ShopifyClient')
            ->setConstructorArgs(['abc', '040350450399894.myshopify.com'])
            ->getMock();
    }

    public function testReadList()
    {
        $this->mockClient->expects($this->once())
            ->method('call')
            ->with('GET', 'checkouts', null, []);
        $this->mockClient->checkouts->readList();
    }

    public function testCount()
    {
        $this->mockClient->expects($this->once())
            ->method("call")
            ->with("GET", "checkouts/count", null, ["created_at_max" => "2014-04-25T16:15:47-04:00"]);
        $this->mockClient->checkouts->readCount(["created_at_max" => "2014-04-25T16:15:47-04:00"]);
    }
}
