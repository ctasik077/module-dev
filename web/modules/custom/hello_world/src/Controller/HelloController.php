<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Class HelloController
 * Provides methods for responding to different routes.
 */
/**
 * Hello World method
 */
class HelloController extends ControllerBase {
  public function hello($name = NULL, $nid = NULL) {
    $output = $this->t('Hello :name!', [':name' => $name]);
    if(!is_null($nid) && is_numeric($nid)){
      $node = Node::load($nid);
      
      if($node) {
        //ksm($node);
        //ksm($node->getTitle());
        //ksm($node->title->value);
        //ksm($node->toLink());
    

        //$title = $node->getTitle();
        //$link = $node->toLink()->toString();
        $url = Url::fromRoute('entity.node.canonical', ['node' => $nid]);
        //ksm($url);
        $link = Link::fromTextAndUrl($node->getTitle(), $url);
        //ksm($link);

        $output = $this->t('Hello @name, The title is @title', ['@name' => $name, '@title' => $link->toString()]);
      }
      else {
        $output = $this->t('Hello :name! This is not a node with ID @nid', ['@name' => $name, '@nid' => $nid]);
      }
    }
      return [
          '#type' => 'markup',
          '#markup' => $output,
        ];
    }
}

