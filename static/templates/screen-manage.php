<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div id="col-container" class="<?php //about-wrap ?>">
  <?php
  echo '<div class="updated">' . wpautop( sprintf( __( 'See below for a list of the UsabilityDynamics Products active on %s. You can %s, as well as our %s on how this works. %s', $this->domain ), get_bloginfo( 'name' ), '<a href="'. trailingslashit( $this->api_url ) .'my-account">view your licenses here</a>', '<a href="https://usabilitydynamics.com/tutorials/licenses/">documentation</a>', '&nbsp;&nbsp;<a href="' . esc_url( admin_url( 'update-core.php' ) ) . '" class="button">' . __( 'Check for Updates', $this->domain ) . '</a>' ) ) . '</div>' . "\n";
  ?>
  <div>
    <form id="activate-products" method="post" action="" class="validate">
      <input type="hidden" name="action" value="activate-products" />
      <input type="hidden" name="page" value="<?php echo esc_attr( $this->page_slug ); ?>" />
      <?php
      //echo "<pre>"; print_r( $this ); echo "</pre>"; die();
      $this->list_table = new UsabilityDynamics\UD_API\Licenses_Table( array(
        'name' => $this->name,
        'domain' => $this->domain,
        'page' => $this->menu_slug,
      ) );
      $this->list_table->data = $this->get_detected_products();
      $this->list_table->prepare_items();
      $this->list_table->display();
      submit_button( __( 'Activate Products', $this->domain ), 'button-primary' );
      ?>
    </form>
  </div><!--/.col-wrap-->
</div><!--/#col-container-->