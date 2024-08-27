<?php


class Recurly_ExternalSubscriptionListTest extends Recurly_TestCase
{

  public function testGetAll() {
    $url = '/external_subscriptions';
    $this->client->addResponse('GET', $url, 'external_subscriptions/index-200.xml');

    $external_subscriptions = Recurly_ExternalSubscriptionList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_ExternalSubscriptionList', $external_subscriptions);
    $this->assertEquals($url, $external_subscriptions->getHref());

    $external_subscription = $external_subscriptions->current();
    $this->assertInstanceOf('Recurly_ExternalSubscription', $external_subscription);
    $this->assertInstanceOf('Recurly_Stub', $external_subscription->account);
    $this->assertEquals('https://api.recurly.com/v2/external_subscriptions/rjx71rx8gs2m/external_invoices', $external_subscription->external_invoices->getHref());
    $this->assertEquals('https://api.recurly.com/v2/external_subscriptions/rjx71rx8gs2m/external_payment_phases', $external_subscription->external_payment_phases->getHref());
    $this->assertInstanceOf('DateTime', $external_subscription->created_at);
    $this->assertInstanceOf('DateTime', $external_subscription->updated_at);
    $this->assertEquals($external_subscription->quantity, 18);
    $this->assertEquals($external_subscription->external_id, '1_ext_id');
    $this->assertEquals($external_subscription->state, 'active');
    $this->assertEquals($external_subscription->auto_renew, false);
    $this->assertEquals($external_subscription->in_grace_period, false);
    $this->assertEquals($external_subscription->imported, false);
    $this->assertEquals($external_subscription->test, false);
    $this->assertInstanceOf('DateTime', $external_subscription->canceled_at);
    $this->assertInstanceOf('DateTime', $external_subscription->expires_at);
    $this->assertInstanceOf('DateTime', $external_subscription->trial_started_at);
    $this->assertInstanceOf('DateTime', $external_subscription->trial_ends_at);
    $this->assertEquals($external_subscription->uuid, '72bb9966bb5dc3767461ce4368a6b366');
    $external_product_reference = $external_subscription->external_product_reference;
    $this->assertEquals($external_product_reference->id, 'rauqpcdmxc4a');
    $this->assertEquals($external_product_reference->reference_code, '1234');
    $this->assertEquals($external_product_reference->external_connection_type, 'apple_app_store');
    $this->assertInstanceOf('DateTime', $external_product_reference->created_at);
    $this->assertInstanceOf('DateTime', $external_product_reference->updated_at);
  }
}
