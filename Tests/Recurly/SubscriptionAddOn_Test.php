<?php

class Recurly_SubscriptionAddOn_Test extends Recurly_TestCase
{
    public function testToString() {
        $addon = new \Recurly_SubscriptionAddOn();

        $this->assertSame('<Recurly_SubscriptionAddOn[new] >', $addon->__toString());
    }
}
