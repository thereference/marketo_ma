<?php

namespace Drupal\marketo_ma;

/**
 * Service interface for the `marketo_ma` worker service.
 *
 * @todo Should this service has a syncLoad method as well, which would allow us
 *   to send them in bulk via a queue? On top of that there might be more things
 *   we could put into it, like the alter hook, see marketo_ma.api.php.
 *
 * @package Drupal\marketo_ma
 */
interface MarketoMaServiceInterface {


  /**
   * Gets the marketo_ma config.
   *
   * @return \Drupal\Core\Config\ImmutableConfig|null
   */
  public function config();

  /**
   * Handles `hook_page_attachments` for the marketo_ma module.
   *
   * @param $page
   * @return null
   */
  public function pageAttachments(&$page);

  /**
   * Check configuration vs the current request to determine tracking requirement.
   *
   * @return bool
   *   Whether the current request should be tracked.
   */
  public function shouldTrackCurrentRequest();

  /**
   * Gets the tracking method from settings.
   *
   * @return string
   *   The tracking method.
   */
  public function trackingMethod();

  /**
   * Sets temporary user data for this session.
   *
   * @param $data
   *   The marketo user data.
   * @return $this
   */
  public function setUserData($data);

  /**
   * Gets temporary user data for the current session.
   *
   * @return array
   *   The temporary user data.
   */
  public function getUserData();

  /**
   * Resets (deletes) the temporary user data for the current session.
   *
   * @return $this
   */
  public function resetUserData();

  /**
   * Determines whether the current session contains any temporary user data.
   *
   * @return bool
   */
  public function hasUserData();


  /**
   * Updates lead information respecting batch settings.
   *
   * @param \Drupal\marketo_ma\LeadInterface $lead
   *   The Lead object.
   *
   * @return $this
   */
  public function updateLead($lead);

}
