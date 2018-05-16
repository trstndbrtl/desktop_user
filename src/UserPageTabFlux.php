<?php

namespace Drupal\desktop_user;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Session\AccountInterface;

/**
 * Prepares all pages.
 */
class UserPageTabFlux {

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
  public function getFlux() {
    $render['#theme'] = 'desktop_user_template';
    $render['#data']['#markup'] = 'Flux stuff';
    $render['#cache']['max-age'] = 0;
    return $render;
  }

}