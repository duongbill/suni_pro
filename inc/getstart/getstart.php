<?php
//about theme info
add_action( 'admin_menu', 'ecommerce_landing_page_gettingstarted' );
function ecommerce_landing_page_gettingstarted() {
	add_theme_page( esc_html__('About Ecommerce Landing Page ', 'ecommerce-landing-page'), esc_html__('Theme Demo Import', 'ecommerce-landing-page'), 'edit_theme_options', 'ecommerce_landing_page_guide', 'ecommerce_landing_page_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function ecommerce_landing_page_admin_theme_style() {
	wp_enqueue_style('ecommerce-landing-page-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('ecommerce-landing-page-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'ecommerce_landing_page_admin_theme_style');

//guidline for about theme
function ecommerce_landing_page_mostrar_guide() { 
	//custom function about theme customizer
	$ecommerce_landing_page_return = add_query_arg( array()) ;
	$ecommerce_landing_page_theme = wp_get_theme( 'ecommerce-landing-page' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to Ecommerce Landing Page ', 'ecommerce-landing-page' ); ?> <span class="version"><?php esc_html_e( 'Version', 'ecommerce-landing-page' ); ?>: <?php echo esc_html($ecommerce_landing_page_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','ecommerce-landing-page'); ?></p>
    </div>
	<div class="col-right coupen-section">
    	<div class="logo-section">
		  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
	  	</div>
	    <div class="logo-right">
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','ecommerce-landing-page'); ?></h4>
			  	<h4><?php esc_html_e('Ecommerce Landing Page','ecommerce-landing-page'); ?></h4>
			  	<h4 class="disc-text"><?php esc_html_e('at 20% Discount','ecommerce-landing-page'); ?></h4>
			  	<h4><?php esc_html_e('Use Coupon','ecommerce-landing-page'); ?> ( <span><?php esc_html_e('vwpro20','ecommerce-landing-page'); ?></span> ) </h4>
				<div class="info-link">
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'ecommerce-landing-page' ); ?></a>
				</div>
			</div>
	  	</div>
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>
    <div class="tab-sec">
    	<div class="tab">
		    <button class="tablinks" onclick="ecommerce_landing_page_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Importer', 'ecommerce-landing-page' ); ?></button>
			<button class="tablinks" onclick="ecommerce_landing_page_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'ecommerce-landing-page' ); ?></button>			
			<button class="tablinks" onclick="ecommerce_landing_page_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'ecommerce-landing-page' ); ?></button>
  			<button class="tablinks" onclick="ecommerce_landing_page_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free vs Premimum', 'ecommerce-landing-page' ); ?></button>
  			<button class="tablinks" onclick="ecommerce_landing_page_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'ecommerce-landing-page' ); ?></button>
		</div>

		
		<?php
			$ecommerce_landing_page_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$ecommerce_landing_page_plugin_custom_css ='display: block';
			}
		?>  

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<h3><?php esc_html_e( 'Click the below run importer button to import demo content', 'ecommerce-landing-page' ); ?></h3>
				<?php
				/* Get Started. */
				require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
			 	?>
			</div>
		</div>     

		<div id="lite_theme" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Ecommerce_Landing_Page_Plugin_Activation_Settings::get_instance();
				$ecommerce_landing_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="ecommerce-landing-page-recommended-plugins">
				    <div class="ecommerce-landing-page-action-list">
				        <?php if ($ecommerce_landing_page_actions): foreach ($ecommerce_landing_page_actions as $key => $ecommerce_landing_page_actionValue): ?>
				                <div class="ecommerce-landing-page-action" id="<?php echo esc_attr($ecommerce_landing_page_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($ecommerce_landing_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($ecommerce_landing_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($ecommerce_landing_page_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','ecommerce-landing-page'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($ecommerce_landing_page_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'ecommerce-landing-page' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Ecommerce Landing Page is a user-friendly solution designed to create a compelling online storefront with ease. This theme is specifically crafted to provide a visually appealing and intuitive landing page that captures the essence of your products or services. The theme offers a clean and modern design, ensuring that your products take center stage. The Ecommerce Landing Page WordPress Theme caters to a wide range of businesses, from small startups to established enterprises, looking to establish a strong online presence. E-commerce landing page theme can be customized to fit almost any niche or industry, depending on the products or services being offered. This theme fresh and vibrant design with easy navigation and screen responsiveness. Being a easy customizable, it has a perfect product showcase section, multilingual support, SEO optimization and social media integration. Also VW Themes provide proper customer support and documentation for customer help. The VW Landing Page is a cross-browser compatible, fast loading theme with lifetime updates and supprot. It has a one click demo importer that imports layout in just one click. This theme is compatible with Woocommerce plugin and Ibtana. This theme can be customized for any niche such as Fashion and Apparel, Beauty and Cosmetics, Electronics and Gadgets, Food and Beverage, Handmade and Crafts, Toys and Games, Sports and Outdoor Gear and Books and Literature. Also it can be used by Art and Craft Suppliers, Customized Gifts and Personalized Products,eCommerce, storefront, retail, online shop, marketing, Jewelry and Accessories, Baby Products, Fitness and Sports Apparel and Digital Products. Whether you’re selling physical products, digital downloads, or services, this theme provides the flexibility to tailor the landing page to your specific business needs. It includes customizable sections to showcase featured products, promotions, and key offerings, creating an engaging and immersive experience for visitors. The layout is organized and easy to navigate, guiding potential customers seamlessly through your product offerings. One of the notable benefits of this theme is its user-friendly interface. You don’t need extensive coding skills to set up and customize your landing page. The theme often comes with drag-and-drop functionality and intuitive customization options, allowing you to personalize the look and feel of your page effortlessly. It’s strategically designed to grab attention, convey your brand message effectively, and entice visitors to explore your product catalog further. The goal is to create a seamless and enjoyable browsing experience that encourages conversion.','ecommerce-landing-page'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'ecommerce-landing-page' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'ecommerce-landing-page' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'ecommerce-landing-page' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'ecommerce-landing-page'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'ecommerce-landing-page'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'ecommerce-landing-page'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'ecommerce-landing-page'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'ecommerce-landing-page'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'ecommerce-landing-page'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'ecommerce-landing-page'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'ecommerce-landing-page'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'ecommerce-landing-page'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'ecommerce-landing-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','ecommerce-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','ecommerce-landing-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_banner') ); ?>" target="_blank"><?php esc_html_e('Banner Settings','ecommerce-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_latest_news_blog_section') ); ?>" target="_blank"><?php esc_html_e('Latest News and Blog Section','ecommerce-landing-page'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','ecommerce-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','ecommerce-landing-page'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','ecommerce-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','ecommerce-landing-page'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','ecommerce-landing-page'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','ecommerce-landing-page'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','ecommerce-landing-page'); ?></span><?php esc_html_e(' Go to ','ecommerce-landing-page'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','ecommerce-landing-page'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','ecommerce-landing-page'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','ecommerce-landing-page'); ?></span><?php esc_html_e(' Go to ','ecommerce-landing-page'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','ecommerce-landing-page'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','ecommerce-landing-page'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','ecommerce-landing-page'); ?> <a class="doc-links" href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','ecommerce-landing-page'); ?></a></p>
			  	</div>
			</div>
		</div>
		

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'ecommerce-landing-page' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Ecommerce Landing Page is a user-friendly solution designed to create a compelling online storefront with ease. This theme is specifically crafted to provide a visually appealing and intuitive landing page that captures the essence of your products or services. The theme offers a clean and modern design, ensuring that your products take center stage. The Ecommerce Landing Page WordPress Theme caters to a wide range of businesses, from small startups to established enterprises, looking to establish a strong online presence. Whether you&#39;re selling physical products, digital downloads, or services, this theme provides the flexibility to tailor the landing page to your specific business needs. It includes customizable sections to showcase featured products, promotions, and key offerings, creating an engaging and immersive experience for visitors. The layout is organized and easy to navigate, guiding potential customers seamlessly through your product offerings. One of the notable benefits of this theme is its user-friendly interface. You don&#39;t need extensive coding skills to set up and customize your landing page. The theme often comes with drag-and-drop functionality and intuitive customization options, allowing you to personalize the look and feel of your page effortlessly. It&#39;s strategically designed to grab attention, convey your brand message effectively, and entice visitors to explore your product catalog further. The goal is to create a seamless and enjoyable browsing experience that encourages conversion.','ecommerce-landing-page'); ?></p>
		    </div>
		    <div class="col-right-pro">
			    <div class="pro-links">
			    	<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'ecommerce-landing-page'); ?></a>
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'ecommerce-landing-page'); ?></a>
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'ecommerce-landing-page'); ?></a>
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'ecommerce-landing-page'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="free_pro" class="tabcontent">
		<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'ecommerce-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'ecommerce-landing-page'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'ecommerce-landing-page'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Product Slider', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Products', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'ecommerce-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'ecommerce-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('5', 'ecommerce-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'ecommerce-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Section', 'ecommerce-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1(Full width/Left/Right Sidebar)', 'ecommerce-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'ecommerce-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'ecommerce-landing-page'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'ecommerce-landing-page' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','ecommerce-landing-page'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'ecommerce-landing-page' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'ecommerce-landing-page'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'ecommerce-landing-page'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'ecommerce-landing-page'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'ecommerce-landing-page'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'ecommerce-landing-page'); ?></p>
		    	</div>
		    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'ecommerce-landing-page'); ?></p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'ecommerce-landing-page'); ?></a>
					<a href="<?php echo esc_url( ECOMMERCE_LANDING_PAGE_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'ecommerce-landing-page'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>

	</div>
</div>

<?php } ?>