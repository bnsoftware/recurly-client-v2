<?php
/**
 * class Recurly_ExternalSubscription
 * @property Recurly_Stub $account
 * @property Recurly_ExternalProductReference $external_product_reference
 * @property Recurly_ExternalPaymentPhase[] $external_payment_phases
 * @property string $uuid
 * @property DateTime $last_purchased
 * @property boolean $auto_renew
 * @property boolean $in_grace_period
 * @property boolean $imported
 * @property boolean $test
 * @property string $app_identifier
 * @property integer $quantity
 * @property string $external_id
 * @property DateTime $activated_at
 * @property DateTime $canceled_at
 * @property DateTime $expires_at
 * @property DateTime $trial_started_at
 * @property DateTime $trial_ends_at
 * @property string $state
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalSubscription extends Recurly_Resource
{
/**
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalSubscription|null
 * @throws Recurly_Error
 */
  public static function get($uuid, $client = null) {
    return Recurly_Base::_get(Recurly_ExternalSubscription::uriForExternalSubscription($uuid), $client);
  }

/**
 * @param $external_id
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalSubscription|null
 * @throws Recurly_Error
 */
  public static function getByExternalId($external_id, $client = null) {
    return Recurly_Base::_get(Recurly_ExternalSubscription::uriForExternalSubscriptionExternalId($external_id), $client);
  }

  /**
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalSubscription|null
 * @throws Recurly_Error
 */
public static function getByUuid($uuid, $client = null) {
  return Recurly_Base::_get(Recurly_ExternalSubscription::uriForExternalSubscriptionUuid($uuid), $client);
}

  public function getExternalPaymentPhase($external_payment_phase_uuid, $client = null) {
    return Recurly_Base::_get($this->uriForExternalPaymentPhase() . '/' . $external_payment_phase_uuid, $client);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_ExternalSubscription::uriForExternalSubscription($this->uuid);
  }

  protected static function uriForExternalSubscription($uuid) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS, $uuid);
  }

  protected static function uriForExternalSubscriptionExternalId($external_id) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS, "external-id-$external_id");
  }

  protected static function uriForExternalSubscriptionUuid($uuid) {
    return self::_safeUri(Recurly_Client::PATH_EXTERNAL_SUBSCRIPTIONS, "uuid-$uuid");
  }

  protected function uriForExternalPaymentPhase() {
    return $this->uri() . '/' . Recurly_Client::PATH_EXTERNAL_PAYMENT_PHASES;
  }

  protected function getNodeName() {
    return 'external_subscription';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
