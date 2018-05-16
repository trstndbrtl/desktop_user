<?php

namespace Drupal\desktop_user;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Prepares all pages.
 */
class UserPageTabRevue {

  use StringTranslationTrait;

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * UserPageTab constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * Returns the page
   */
  public function getRevue() {
    $render['#theme'] = 'desktop_user_template';
    $render['#data']['#markup'] = 'Revue stuff';
    $render['#cache']['max-age'] = 0;
    return $render;
  }
  
}