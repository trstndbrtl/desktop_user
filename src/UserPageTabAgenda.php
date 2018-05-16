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

    $url = Url::fromRoute('desktop_user.hide_tab_block');
    $link_options = array(
      'attributes' => array(
        'class' => array(
          'use-ajax',
          'my-second-class',
        ),
      ),
    );
    $url->setOptions($link_options);
    $link = Link::fromTextAndUrl(t('Link title'), $url)->toString();

    $render['#theme'] = 'desktop_user_template';
    $render['#data']['#markup'] = 'Agenda stuff + ' . $link;
    $render['#cache']['max-age'] = 0;

    return $render;
  }
}