<?php

namespace Drupal\desktop_user\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\RemoveCommand;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\desktop_user\UserPageTabFlux;
use Drupal\desktop_user\TabPageFonction;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProjetsTabController.
 */
class FluxTabController extends ControllerBase {

  use TabPageFonction;

  protected $flux;

  /**
   * FluxTabController constructor.
   *
   * @param \Drupal\desktop_user\UserPageTabFlux $flux
   */
  public function __construct(UserPageTabFlux $flux) {
    $this->flux = $flux;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('desktop_user.tab_flux')
    );
  }

  /**
   * userFluxPage.
   *
   * @return string
   *   Return Hello string.
   */
  public function userFluxPage() {
    return $this->flux->getFlux();
  }

  /**
   * getCurrentPagePermission.
   *
   * @return int
   *   Return current permission for the current page int.
   * Can not query access management with a variable in the design field permission
   * We are obliged to repeat this function for each controller
   * We can use a variable, the permissions for page access are respected but not for the visibility of the menu item tab
   */
  public function getCurrentPagePermission() {
    // Load field_design of owner to current page
    $user = \Drupal::entityTypeManager()->getStorage('user')->load(TabPageFonction::getOwnerCurrentPage());
    $perm = (isset($user->get('field_design')->getValue()[0]['flux'])) ? $user->get('field_design')->getValue()[0]['flux'] : 0;
    return (int)$perm;
  }

  /**
   * Handles the access checking. It's not actually used anywhere anymore
   * since we opted for the service-based approach so this method is no longer
   * referenced in the route definition.
   *
   * @param AccountInterface $account
   *
   * @return AccessResultInterface
   */
  public function access(AccountInterface $account) {

    $access = TabPageFonction::getCurrentAccessPermission($this->getCurrentPagePermission());

     switch ($access) {
      case 1:
        return AccessResult::forbidden();
        break;
      case 2:
        return AccessResult::allowed();
        break;
      case 3:
        return AccessResult::forbidden();
        break;
      case 4:
        return AccessResult::allowed();
        break;
      case 5:
        return AccessResult::allowed();
        break;
    }
  }

}
