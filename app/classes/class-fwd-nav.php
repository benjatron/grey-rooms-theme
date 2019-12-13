<?php
/**
 * FWD Navigation class and methods
 */

abstract class FWD_Nav extends FWD_Component {

  /**
   * Displays a navigation menu with custom markup
   *
   * WordPress' normal nav menu is powerful, but verbose. This seeks to work
   * around that by reducing the markup and also adding the option of adding a
   * toggle for menus that have child items.
   *
   * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
   *
   * @param array $args {
   *  An array of arguments to pass, similar to those used for wp_nav_menu
   *
   *  @option string 'menu_location'    Desired registered menu location.
   *  @option string 'menu_class'       Base CSS class to use for the container
   *                                    block which forms the menu
   *  @option string 'menu_id'          The ID that is applied to the container
   *                                    element which forms the menu. Default
   *                                    is a variant of the menu slug
   *  @option boolean 'toggles'         Whether or not to include toggle
   *                                    buttons for menu items with child lists
   *  @option string 'toggle_icon'      If toggle buttons are enabled, the
   *                                    markup to appear within the buttons
   *  @option boolean 'top_links'       If the top-level items should be links 
   *                                    or not. Items with no children will
   *                                    always be linked
   * }
   * @return string       HTML markup for the menu
   */
  public function the_menu( $args = array() ) {

    // Default settings array, to be added to the $args if they're not set
    $defaults = array(
      'menu_location' => '',
      'menu_class' => '',
      'menu_id' => '',
      'toggles' => false,
      'toggle_icon' => '&plus;',
      'top_links' => true
    );
    $args = wp_parse_args( $args, $defaults );

    // Sets variables for use in the function
    $location = $args['menu_location'];
    $class = $args['menu_class'];
    $id = $args['menu_id'];
    $toggle = $args['toggles'];
    $icon = $args['toggle_icon'];
    $link = $args['top_links'];

    // Gets menu locations
    $menu_locations = get_nav_menu_locations();

    // Grabs menu and the items within the menu provided
    if( !get_term( $menu_locations[$location], 'nav_menu' ) ):
      echo 'That menu does not exist';
    else:
      // Sets the menu to be loaded and gets the menu items
      $menu = get_term( $menu_locations[$location], 'nav_menu' );
      $items = wp_get_nav_menu_items( $menu->name );
      ?>
      <nav id="<?php echo $id; ?>" class="<?php echo $class; ?>">
        <ul class="<?php echo $class; ?>__list">
          <?php
          // Cycles through each menu item to create top-level links
          foreach( $items as $item ):
            // Skip items that are not top-level
            if( $item->menu_item_parent != '0' ):
              continue;
            endif;
            $currentID = $item->ID;

            // If there are sub-items, identify that
            $hasChildren = false;
            foreach( $items as $childCheck ):
              if( $childCheck->menu_item_parent == $currentID ):
                $hasChildren = true;
              endif;
            endforeach;

            // If the item has children...
            if( $hasChildren == true ):
            ?>
              <li class="<?php echo $class; ?>__item <?php echo $class; ?>__item--hasChildren">
                <?php
                // Show item title, as a link if top links are enabled
                if( $link == true ):
                ?>
                  <a class="<?php echo $class; ?>__link" href="<?php echo $item->url; ?>">
                    <?php echo $item->title; ?>
                  </a>
                <?php
                else:
                ?>
                  <span class="<?php echo $class; ?>__link <?php echo $class; ?>__link--inactive">
                    <?php echo $item->title; ?>
                  </span>
                <?php
                endif;

                // If toggles are enabled, show it
                if( $toggle ):
                ?>
                  <button class="<?php echo $class; ?>__toggle">
                    <?php echo $icon; ?>
                  </button>
                <?php
                endif;
              // Create submenus
              FWD_Nav::the_sub_nav( $args, $items, $currentID );

            // If the item has no children
            elseif( $hasChildren == false ):
            ?>
              <li class="<?php echo $class; ?>__item">
                <a class="<?php echo $class; ?>__link" href="<?php echo $item->url; ?>">
                  <?php echo $item->title; ?>
                </a>
            <?php
            endif;
            ?>
            </li>
          <?php
          endforeach;
          ?>
        </ul>
      </nav>
      <?php
    endif;
  }

  /**
   * Recursive function to create sub navigation menus
   *
   * @param array $args           Navigation menu arguments, similar to
   *                              wp_nav_menu()
   * @param array $items          The contens of the menu to be created and
   *                              checked against
   * @param string $currentID     The ID of the post to start the submenu for
   *
   * @return mixed                The sub menu markup
   */
  protected function the_sub_nav( $args, $items, $currentID ) {
    // Sets variables for use in the function
  $class = $args['menu_class'];
  $toggle = $args['toggles'];
  $icon = $args['toggle_icon'];
  ?>
  <ul class="<?php echo $class; ?>__sub">
    <?php
    // Cycles through each menu item to create sub-level links
    foreach( $items as $item ):
      // Skip items with the incorrect parent post
      if( $item->menu_item_parent != $currentID ):
        continue;
      endif;
      $subID = $item->ID;

      // If there are sub-items, list them here
      $hasChildren = false;
      foreach( $items as $childCheck ):
        if( $childCheck->menu_item_parent == $subID ):
          $hasChildren = true;
        endif;
      endforeach;
      if( $hasChildren == true ):
      ?>
        <li class="<?php echo $class; ?>__subItem <?php echo $class; ?>__subItem--hasChildren">
          <a class="<?php echo $class; ?>__subLink" href="<?php echo $item->url; ?>">
            <?php echo $item->title; ?>
          </a>
          <?php
          if( $toggle ):
          ?>
            <button class="<?php echo $class; ?>__toggle">
              <?php echo $icon; ?>
            </button>
          <?php
          endif;
          // Create submenus
          FWD_Nav::the_sub_nav( $args, $items, $subID );

        // If the item has no children
        elseif( $hasChildren == false ):
        ?>
          <li class="<?php echo $class; ?>__subItem">
            <a class="<?php echo $class; ?>__subLink" href="<?php echo $item->url; ?>">
              <?php echo $item->title; ?>
            </a>
        <?php
        endif;
        ?>
      </li>
      <?php
    endforeach;
    ?>
  </ul>
  <?php
  }

}