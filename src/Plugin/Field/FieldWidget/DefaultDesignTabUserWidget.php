<?php

namespace Drupal\desktop_user\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'default_design_tab_user_widget' widget.
 *
 * @FieldWidget(
 *   id = "default_design_tab_user_widget",
 *   label = @Translation("Default Design User widget"),
 *   field_types = {
 *     "design_user"
 *   }
 * )
 */
class DefaultDesignTabUserWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'fieldset_state' => 'open',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    $elements['fieldset_state'] = [
      '#type' => 'select',
      '#title' => t('Fieldset default state'),
      '#options' => [
        'open' => t('Open'),
        'closed' => t('Closed')
      ],
      '#default_value' => $this->getSetting('fieldset_state'),
      '#description' => t('The default state of the fieldset which contains the two plate fields: open or closed')
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = t('Fieldset state: @state', ['@state' => $this->getSetting('fieldset_state')]);

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['details'] = [
      '#type' => 'details',
      '#title' => $element['#title'],
      '#open' => $this->getSetting('fieldset_state') == 'open' ? TRUE : FALSE,
      '#description' => $element['#description'],
    ] + $element;

    $element['details']['flux'] = [
      '#type' => 'select',
      '#title' => t('Flux'),
      '#default_value' => isset($items[$delta]->flux) ? $items[$delta]->flux : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('Only me'),
        2 => t('Public'),
        3 => t('Only my friend'),
      ),
      '#required' => TRUE,
    ];

    $element['details']['projets'] = [
      '#type' => 'select',
      '#title' => t('Projets'),
      '#default_value' => isset($items[$delta]->projets) ? $items[$delta]->projets : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('Only me'),
        2 => t('Public'),
        3 => t('Only my friend'),
      ),
      '#required' => TRUE,
    ];

    $element['details']['agenda'] = [
      '#type' => 'select',
      '#title' => t('Agenda'),
      '#default_value' => isset($items[$delta]->agenda) ? $items[$delta]->agenda : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('Only me'),
        2 => t('Public'),
        3 => t('Only my friend'),
      ),
      '#required' => TRUE,
    ];

    $element['details']['revue'] = [
      '#type' => 'select',
      '#title' => t('Revue'),
      '#default_value' => isset($items[$delta]->revue) ? $items[$delta]->revue : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('Only me'),
        2 => t('Public'),
        3 => t('Only my friend'),
      ),
      '#required' => TRUE,
    ];

    $element['details']['banner'] = [
      '#type' => 'select',
      '#title' => t('Banner'),
      '#default_value' => isset($items[$delta]->banner) ? $items[$delta]->banner : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('On'),
      ),
      '#required' => TRUE,
    ];

    $element['details']['links'] = [
      '#type' => 'select',
      '#title' => t('Links'),
      '#default_value' => isset($items[$delta]->links) ? $items[$delta]->links : 0,
      '#options' => array(
        0 => t('Off'),
        1 => t('On'),
      ),
      '#required' => TRUE,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    foreach ($values as &$value) {
      $value['flux'] = $value['details']['flux'];
      $value['projets'] = $value['details']['projets'];
      $value['agenda'] = $value['details']['agenda'];
      $value['revue'] = $value['details']['revue'];
      $value['banner'] = $value['details']['banner'];
      $value['links'] = $value['details']['links'];
      unset($value['details']);
    }

    return $values;
  }
}
