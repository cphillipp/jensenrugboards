<?php
global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<div class="full-width last entry-content clearfix">
<p class="myaccount_user"><?php printf( __('Hello, <strong>%s</strong>. From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">change your password</a>.', 'woocommerce'), $current_user->display_name, get_permalink(woocommerce_get_page_id('change_password'))); ?></p>
</div>

<?php do_action('woocommerce_before_my_account'); ?>

<?php if ($downloads = $woocommerce->customer->get_downloadable_products()) : ?>
<h3 class="home-title"><span><?php _e('Available downloads', 'woocommerce'); ?></span></h3>
<ul class="digital-downloads">
	<?php foreach ($downloads as $download) : ?>
		<li><?php if (is_numeric($download['downloads_remaining'])) : ?><span class="count"><?php echo $download['downloads_remaining'] . _n('&nbsp;download remaining', '&nbsp;downloads remaining', $download['downloads_remaining'], 'woocommerce'); ?></span><?php endif; ?> <a href="<?php echo esc_url( $download['download_url'] ); ?>"><?php echo $download['download_name']; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<div class="full-width last entry-content clearfix">
    <h3 class="home-title"><span><?php _e('Recent Orders', 'woocommerce'); ?></span></h3>
    <?php woocommerce_get_template('myaccount/my-orders.php', array( 'recent_orders' => $recent_orders )); ?>
</div>

<div class="full-width last entry-content clearfix">
    <h3 class="home-title"><span><?php _e('My Address', 'woocommerce'); ?></span></h3>
    <p class="myaccount_address"><?php _e('The following addresses will be used on the checkout page by default.', 'woocommerce'); ?></p>
    <?php woocommerce_get_template('myaccount/my-address.php'); ?>
</div>

<?php do_action('woocommerce_after_my_account');