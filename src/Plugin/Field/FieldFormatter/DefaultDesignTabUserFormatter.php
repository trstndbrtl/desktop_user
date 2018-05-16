<?php

namespace Drupal\desktop_user\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'default_design_tab_user_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "default_design_tab_user_formatter",
 *   label = @Translation("Default Design User formatter"),
 *   field_types = {
 *     "design_user"
 *   }
 * )
 */
class DefaultDesignTabUserFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = $this->viewValue($item);
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return array
   */
  protected function viewValue(FieldItemInterface $item) {
    $flux = $item->get('flux')->getValue();
    $projets = $item->get('projets')->getValue();
    $agenda = $item->get('agenda')->getValue();
    $revue = $item->get('revue')->getValue();
    $banner = $item->get('banner')->getValue();
    $links = $item->get('links')->getValue();
    // return [
    //   '#theme' => 'desktop_user',
    //   '#flux' => $flux,
    //   '#projets' => $projets,
    //   '#agenda' => $agenda,
    //   '#revue' => $revue,
    //   '#banner' => $banner,
    //   '#links' => $links,
    // ];
  }

}
