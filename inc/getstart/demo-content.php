<div class="theme-offer">
	<?php
        // Check if the demo import has been completed
        $ecommerce_landing_page_demo_import_completed = get_option('ecommerce_landing_page_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($ecommerce_landing_page_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'ecommerce-landing-page') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'ecommerce-landing-page') . '</a></span>';
        }

		//POST and update the customizer and other related data
        if (isset($_POST['submit'])) {

            // Check if ibtana visual editor is installed and activated
            if (!is_plugin_active('ibtana-visual-editor/plugin.php')) {
              // Install the plugin if it doesn't exist
              $ecommerce_landing_page_plugin_slug = 'ibtana-visual-editor';
              $ecommerce_landing_page_plugin_file = 'ibtana-visual-editor/plugin.php';

              // Check if plugin is installed
              $ecommerce_landing_page_installed_plugins = get_plugins();
              if (!isset($ecommerce_landing_page_installed_plugins[$ecommerce_landing_page_plugin_file])) {
                  include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                  include_once(ABSPATH . 'wp-admin/includes/file.php');
                  include_once(ABSPATH . 'wp-admin/includes/misc.php');
                  include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                  // Install the plugin
                  $ecommerce_landing_page_upgrader = new Plugin_Upgrader();
                  $ecommerce_landing_page_upgrader->install('https://downloads.wordpress.org/plugin/ibtana-visual-editor.latest-stable.zip');
              }
              // Activate the plugin
              activate_plugin($ecommerce_landing_page_plugin_file);
            }

            // Check if Contact Form 7 is installed and activated
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
              // Install the plugin if it doesn't exist
              $ecommerce_landing_page_plugin_slug = 'woocommerce';
              $ecommerce_landing_page_plugin_file = 'woocommerce/woocommerce.php';

              // Check if plugin is installed
              $installed_plugins = get_plugins();
              if (!isset($installed_plugins[$ecommerce_landing_page_plugin_file])) {
                  include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                  include_once(ABSPATH . 'wp-admin/includes/file.php');
                  include_once(ABSPATH . 'wp-admin/includes/misc.php');
                  include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                  // Install the plugin
                  $ecommerce_landing_page_upgrader = new Plugin_Upgrader();
                  $ecommerce_landing_page_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
              }
              // Activate the plugin
              activate_plugin($ecommerce_landing_page_plugin_file);
            }

            // ------- Create Nav Menu --------
            $ecommerce_landing_page_menuname = 'Main Menus';
            $ecommerce_landing_page_bpmenulocation = 'primary';
            $ecommerce_landing_page_menu_exists = wp_get_nav_menu_object($ecommerce_landing_page_menuname);

            if (!$ecommerce_landing_page_menu_exists) {
                $ecommerce_landing_page_menu_id = wp_create_nav_menu($ecommerce_landing_page_menuname);

                // Create Home Page
                $ecommerce_landing_page_home_title = 'Home';
                $ecommerce_landing_page_home = array(
                    'post_type' => 'page',
                    'post_title' => $ecommerce_landing_page_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $ecommerce_landing_page_home_id = wp_insert_post($ecommerce_landing_page_home);
                // Assign Home Page Template
                add_post_meta($ecommerce_landing_page_home_id, '_wp_page_template', 'page-template/custom-home-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $ecommerce_landing_page_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($ecommerce_landing_page_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'ecommerce-landing-page'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $ecommerce_landing_page_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $ecommerce_landing_page_pages_title = 'Pages';
                $ecommerce_landing_page_pages_content = 'Explore all the pages we have on our website. Find information about our services, company, and more.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $ecommerce_landing_page_pages = array(
                    'post_type' => 'page',
                    'post_title' => $ecommerce_landing_page_pages_title,
                    'post_content' => $ecommerce_landing_page_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $ecommerce_landing_page_pages_id = wp_insert_post($ecommerce_landing_page_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($ecommerce_landing_page_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'ecommerce-landing-page'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $ecommerce_landing_page_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $ecommerce_landing_page_about_title = 'About Us';
                $ecommerce_landing_page_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br>
                 All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $ecommerce_landing_page_about = array(
                    'post_type' => 'page',
                    'post_title' => $ecommerce_landing_page_about_title,
                    'post_content' => $ecommerce_landing_page_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $ecommerce_landing_page_about_id = wp_insert_post($ecommerce_landing_page_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($ecommerce_landing_page_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'ecommerce-landing-page'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $ecommerce_landing_page_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Set the menu location if it's not already set
                if (!has_nav_menu($ecommerce_landing_page_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($locations)) {
                        $locations = array();
                    }
                    $locations[$ecommerce_landing_page_bpmenulocation] = $ecommerce_landing_page_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }

        }


            // Set the demo import completion flag
    		update_option('ecommerce_landing_page_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'ecommerce-landing-page') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'ecommerce-landing-page') . '</a></span>';
            //end


            // Top Bar //
            set_theme_mod('ecommerce_landing_page_topbar_myaccount_icon', 'fas fa-user' );
            set_theme_mod('ecommerce_landing_page_cart_icon', 'fas fa-cart-plus' );

            // slider section start //
            set_theme_mod( 'ecommerce_landing_page_slider_button_text', 'Read More' );
            set_theme_mod( 'ecommerce_landing_page_tagline_title', 'Enjoy Every Single Beat On Headphone' );
            set_theme_mod( 'ecommerce_landing_page_designation_text', 'Lorem ipsum is simply dummy text of the printing and typesetting industry. ipsum is simply dummy text of the printing and typesetting industry.' );
            set_theme_mod( 'ecommerce_landing_page_banner_button_label', 'Buy Now' );
            set_theme_mod( 'ecommerce_landing_page_top_button_url', '#' );
            set_theme_mod( 'ecommerce_landing_page_product_small_text', 'Recommended Headphones' );
            set_theme_mod( 'ecommerce_landing_page_product_category', 'productcategory1' );

            $ecommerce_landing_pages_category_names = array('productcategory1', 'productcategory2', 'productcategory3', 'productcategory4');
            $ecommerce_landing_pages_title_array = array(
                array("Product Name", "Product Name", "Product Name", "Product Name"),
                array("Product Name", "Product Name", "Product Name", "Product Name"),
                array("Product Name", "Product Name", "Product Name", "Product Name"),
                array("Product Name", "Product Name", "Product Name", "Product Name")
            );

            foreach ($ecommerce_landing_pages_category_names as $ecommerce_landing_pages_index => $ecommerce_landing_pages_category_name) {
                // Create or retrieve the product category term ID
                $ecommerce_landing_pages_term = term_exists($ecommerce_landing_pages_category_name, 'product_cat');
                if ($ecommerce_landing_pages_term === 0 || $ecommerce_landing_pages_term === null) {
                    // If the term does not exist, create it
                    $ecommerce_landing_pages_term = wp_insert_term($ecommerce_landing_pages_category_name, 'product_cat');
                }

                if (is_wp_error($ecommerce_landing_pages_term)) {
                    error_log('Error creating category: ' . $ecommerce_landing_pages_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                // Loop to create 4 products for each category
                for ($ecommerce_landing_pages_i = 0; $ecommerce_landing_pages_i < 4; $ecommerce_landing_pages_i++) {
                    // Create product content
                    $ecommerce_landing_pages_title = $ecommerce_landing_pages_title_array[$ecommerce_landing_pages_index][$ecommerce_landing_pages_i];
                    $ecommerce_landing_pages_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

                    // Create product post object
                    $ecommerce_landing_pages_my_post = array(
                        'post_title'    => wp_strip_all_tags($ecommerce_landing_pages_title),
                        'post_content'  => $ecommerce_landing_pages_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'product', // Post type set to 'product'
                    );

                    // Insert the product into the database
                    $ecommerce_landing_pages_post_id = wp_insert_post($ecommerce_landing_pages_my_post);


                    update_post_meta($ecommerce_landing_pages_post_id, 'ecommerce_landing_page_review', 'Our Review');
                    update_post_meta($ecommerce_landing_pages_post_id, 'ecommerce_landing_page_review_count', '+123k');
                    update_post_meta($ecommerce_landing_pages_post_id, 'ecommerce_landing_page_save', 'Save 30% today');
                    update_post_meta($ecommerce_landing_pages_post_id, 'ecommerce_landing_page_orignal_price', 'Original price $399');

                    if (is_wp_error($ecommerce_landing_pages_post_id)) {
                        error_log('Error creating product: ' . $ecommerce_landing_pages_post_id->get_error_message());
                        continue; // Skip to the next product if creation fails
                    }

                    // Assign the category to the product
                    wp_set_object_terms($ecommerce_landing_pages_post_id, (int)$ecommerce_landing_pages_term['term_id'], 'product_cat');

                    // Add product meta (price, etc.)
                    update_post_meta($ecommerce_landing_pages_post_id, '_regular_price', '50'); // Regular price
                    update_post_meta($ecommerce_landing_pages_post_id, '_sale_price', '49.99'); // Sale price
                    update_post_meta($ecommerce_landing_pages_post_id, '_price', '49.99'); // Active price

                    // Handle the featured image using media_sideload_image
                    $ecommerce_landing_pages_image_url = get_template_directory_uri() . '/assets/images/headphone' . ($ecommerce_landing_pages_i + 1) . '.png';
                    $ecommerce_landing_pages_image_id = media_sideload_image($ecommerce_landing_pages_image_url, $ecommerce_landing_pages_post_id, null, 'id');

                    if (is_wp_error($ecommerce_landing_pages_image_id)) {
                        error_log('Error downloading image: ' . $ecommerce_landing_pages_image_id->get_error_message());
                        continue; // Skip to the next product if image download fails
                    }

                    // Assign featured image to product
                    set_post_thumbnail($ecommerce_landing_pages_post_id, $ecommerce_landing_pages_image_id);

                }
            }


            // Latest News And Blog Section
            set_theme_mod('ecommerce_landing_page_latest_news_blog_heading', 'Latest News & Blogs' );
            set_theme_mod('ecommerce_landing_page_latest_news_blog_small_title', 'Lorem ipsum is simply dummy text' );
            set_theme_mod('ecommerce_landing_page_latest_post_author_icon', 'fas fa-user' );
            set_theme_mod('ecommerce_landing_page_latest_post_comments_icon', 'fas fa-comment' );
            set_theme_mod('ecommerce_landing_page_events_category', 'wiredheadphones' );
            
                // Define post category names and post titles
                $ecommerce_landing_page_category_names = array('wiredheadphones', 'postcategory2', 'postcategory3');
                $ecommerce_landing_page_title_array = array(
                    array("Lorem ipsum is simply dummy text of the printing and typesetting industry ", "Lorem ipsum is simply dummy text of the printing and typesetting industry", "Lorem ipsum is simply dummy text of the printing and typesetting industry"),
                    array("Wireless Headphones", "Wireless Headphones", "Wireless Headphones"),
                    array("Wireless Headphones", "Wireless Headphones", "Wireless Headphones")
                );
    
                foreach ($ecommerce_landing_page_category_names as $ecommerce_landing_page_index => $ecommerce_landing_page_category_name) {
                    // Create or retrieve the post category term ID
                    $ecommerce_landing_page_term = term_exists($ecommerce_landing_page_category_name, 'category');
                    if ($ecommerce_landing_page_term === 0 || $ecommerce_landing_page_term === null) {
                        // If the term does not exist, create it
                        $ecommerce_landing_page_term = wp_insert_term($ecommerce_landing_page_category_name, 'category');
                    }
                    if (is_wp_error($ecommerce_landing_page_term)) {
                        error_log('Error creating category: ' . $ecommerce_landing_page_term->get_error_message());
                        continue; // Skip to the next iteration if category creation fails
                    }
    
                    for ($ecommerce_landing_page_i = 0; $ecommerce_landing_page_i < 3; $ecommerce_landing_page_i++) {
                        // Create post content
                        $ecommerce_landing_page_title = $ecommerce_landing_page_title_array[$ecommerce_landing_page_index][$ecommerce_landing_page_i];
    
                        // Create post post object
                        $ecommerce_landing_page_my_post = array(
                            'post_title'    => wp_strip_all_tags($ecommerce_landing_page_title),
                            'post_status'   => 'publish',
                            'post_type'     => 'post', // Post type set to 'post'
                        );
    
                        // Insert the post into the database
                        $ecommerce_landing_page_post_id = wp_insert_post($ecommerce_landing_page_my_post);
    
                        update_post_meta($ecommerce_landing_page_post_id, 'ecommerce_landing_page_date', "25 Jan");
    
                        if (is_wp_error($ecommerce_landing_page_post_id)) {
                            error_log('Error creating post: ' . $ecommerce_landing_page_post_id->get_error_message());
                            continue; // Skip to the next post if creation fails
                        }
    
                        // Assign the category to the post
                        wp_set_post_categories($ecommerce_landing_page_post_id, array((int)$ecommerce_landing_page_term['term_id']));
    
                        // Handle the featured image using media_sideload_image
                        $ecommerce_landing_page_image_url = get_template_directory_uri() . '/assets/images/blog' . ($ecommerce_landing_page_i + 1) . '.png';
                        $ecommerce_landing_page_image_id = media_sideload_image($ecommerce_landing_page_image_url, $ecommerce_landing_page_post_id, null, 'id');
    
                        if (is_wp_error($ecommerce_landing_page_image_id)) {
                            error_log('Error downloading image: ' . $ecommerce_landing_page_image_id->get_error_message());
                            continue; // Skip to the next post if image download fails
                        }
                        // Assign featured image to post
                        set_post_thumbnail($ecommerce_landing_page_post_id, $ecommerce_landing_page_image_id);
                    }
                } 
            //Copyright Text
            set_theme_mod( 'ecommerce_landing_page_footer_text', 'By VWThemes' );
        }
    ?>

	<p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for Ecommerce Landing Page', 'ecommerce-landing-page'); ?></p>
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=ecommerce_landing_page_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('ecommerce_landing_page_demo_import_completed')) : ?>
            <input class="run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer', 'ecommerce-landing-page'); ?>" class="button button-primary button-large">
        <?php endif; ?>
        <div id="spinner" style="display:none;">         
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/spinner.png" alt="" />
        </div>
    </form>
    <script type="text/javascript">
        function validate(form) {
            if (confirm("Do you really want to import the theme demo content?")) {
                // Show the spinner
                document.getElementById('spinner').style.display = 'block';
                // Allow the form to be submitted
                return true;
            } 
            else {
                return false;
            }
        }
    </script>
</div>
