<?php

namespace Drupal\desktop_user\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'design_user_type' field type.
 *
 * @FieldType(
 *   id = "design_user",
 *   label = @Translation("Design profil"),
 *   description = @Translation("Field for design user profil"),
 *   default_widget = "default_design_tab_user_widget",
 *   default_formatter = "default_design_tab_user_formatter"
 * )
 */
class DesignTabUserField extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = [
      'columns' => [
        'flux' => [
          'type' => 'int',
          'length' => 2,
        ],
        'projets' => [
          'type' => 'int',
          'length' => 2,
        ],
        'agenda' => [
          'type' => 'int',
          'length' => 2,
        ],
        'revue' => [
          'type' => 'int',
          'length' => 2,
        ],
        'banner' => [
          'type' => 'int',
          'length' => 2,
        ],
        'links' => [
          'type' => 'int',
          'length' => 2,
        ],
      ],
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
        'flux' => 0,
        'projets' => 0,
        'agenda' => 0,
        'revue' => 0,
        'banner' => 0,
        'links' => 0,
      ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['flux'] = DataDefinition::create('integer')
      ->setLabel(t('Flux tab'));

    $properties['projets'] = DataDefinition::create('integer')
      ->setLabel(t('Projets tab'));

    $properties['agenda'] = DataDefinition::create('integer')
      ->setLabel(t('Agenda tab'));

    $properties['revue'] = DataDefinition::create('integer')
      ->setLabel(t('Revue tab'));
    
    $properties['banner'] = DataDefinition::create('integer')
      ->setLabel(t('Banner'));

    $properties['links'] = DataDefinition::create('integer')
      ->setLabel(t('Links'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $isEmpty = 
      empty($this->get('flux')->getValue()) &&
      empty($this->get('projets')->getValue()) &&
      empty($this->get('agenda')->getValue()) &&
      empty($this->get('revue')->getValue()) &&
      empty($this->get('banner')->getValue()) &&
      empty($this->get('links')->getValue());
    return $isEmpty;
  }
}