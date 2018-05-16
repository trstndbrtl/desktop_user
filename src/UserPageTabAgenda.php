<?php

namespace Drupal\desktop_user;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Session\AccountInterface;

/**
 * Prepares all pages.
 */
class UserPageTabAgenda {

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
  public function getAgenda() {
    $render['#theme'] = 'desktop_user_template';
    $render['#data']['#markup'] = 'Agenda stuff';
    $render['#cache']['max-age'] = 0;
    return $render;
  }
  
}