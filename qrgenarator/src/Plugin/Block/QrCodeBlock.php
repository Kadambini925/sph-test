<?php

namespace Drupal\qrgenarator\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'QR Code' block.
 *
 * @Block(
 *   id = "qrcodeblock",
 *   admin_label = @Translation("QR Code block")
 * )
 */
class QrCodeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
   
    $buildbuild = [];
    // Get the current node
    $node = \Drupal::routeMatch()->getParameter('node');

   if ($node instanceof \Drupal\node\NodeInterface) {

      $qr_code_path = \Drupal::service('qrgenarator.qr_code_generator')->getQrCode($node->field_app_purchase_link->uri);

      $build = [
        '#theme' => 'qr_code_block',
        '#qr_code_path' => $qr_code_path,
      ];
      return $build;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
      return 0;
  }
}
