<?php

/**
 * Class Recurly_ProrationSettings
 * @property string $charge Determines how the amount charged is determined for the subscription change
 * @property string $credit Determines how the amount credited is determined for the subscription change
 */
class Recurly_ProrationSettings extends Recurly_Resource
{
  protected function getNodeName() {
    return 'proration_settings';
  }

  protected function getWriteableAttributes() {
    return array(
      'charge',
      'credit'
    );
  }
}
