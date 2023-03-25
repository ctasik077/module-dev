<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HelloController
 * Provides methods for responding to different routes.
 */
/**
 * Hello World method
 */
class HelloController extends ControllerBase {
  public function hello($name = NULL) {
      if ($name){
          $output = $this->t("Hello @name", ['@name' => $name]);
        }
      else{
          $output = $this->t("Hello World");
        }
      return [
          '#type' => 'markup',
          '#markup' => $output,
        ];
    }
}

