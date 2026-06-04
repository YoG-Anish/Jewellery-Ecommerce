<?php
/**
 * Product quantity inputs (Customized with +/- buttons)
 *
 * @var bool   $readonly    If the input should be set to readonly mode.
 * @var string $type        The input type attribute.
 * @var string $input_id    ID for the input field.
 * @var string $input_name  Name for the input field.
 * @var string $input_value Current value of the input.
 * @var string $label       Label for the input.
 * @var array  $classes     Classes for the input.
 * @var string $min_value   Minimum value.
 * @var string $max_value   Maximum value.
 * @var string $step        Step value.
 * @var string $placeholder Placeholder.
 * @var string $inputmode   Input mode.
 * @var string $autocomplete Autocomplete attribute.
 */

defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );
?>

<div class="quantity">
    <?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
    
    <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>">
        <?php echo esc_attr( $label ); ?>
    </label>

    <!-- Minus Button -->
    <button type="button" class="minus">-</button>

    <input
        type="<?php echo esc_attr( $type ); ?>"
        <?php echo $readonly ? 'readonly="readonly"' : ''; ?>
        id="<?php echo esc_attr( $input_id ); ?>"
        class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> qty"
        name="<?php echo esc_attr( $input_name ); ?>"
        value="<?php echo esc_attr( $input_value ); ?>"
        aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
        <?php if ( in_array( $type, array( 'text', 'search', 'tel', 'url', 'email', 'password' ), true ) ) : ?>
            size="4"
        <?php endif; ?>
        min="<?php echo esc_attr( $min_value ); ?>"
        <?php if ( 0 < $max_value ) : ?>
            max="<?php echo esc_attr( $max_value ); ?>"
        <?php endif; ?>
        <?php if ( ! $readonly ) : ?>
            step="<?php echo esc_attr( $step ); ?>"
            placeholder="<?php echo esc_attr( $placeholder ); ?>"
            inputmode="<?php echo esc_attr( $inputmode ); ?>"
            autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
        <?php endif; ?>
    />

    <!-- Plus Button -->
    <button type="button" class="plus">+</button>

    <?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
</div>