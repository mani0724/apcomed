<?php

add_action( "product_cat_add_form_fields", 'hyori_product_cat_add_fields_form' );
add_action( "product_cat_edit_form_fields", 'hyori_product_cat_edit_fields_form', 10, 2 );

add_action( 'create_term', 'hyori_product_cat_save' );
add_action( 'edit_term', 'hyori_product_cat_save' );

function hyori_product_cat_add_fields_form($taxonomy) {
    ?>
    <div class="form-field">
        <label><?php esc_html_e( 'Elementor Template', 'hyori' ); ?></label>
        <?php hyori_product_cat_element_template_field(); ?>
    </div>

    <div class="form-field">
        <label><?php esc_html_e( 'Font Icon class', 'hyori' ); ?></label>
        <?php hyori_product_cat_input_field(); ?>
    </div>
    <?php
}

function hyori_product_cat_edit_fields_form( $term, $taxonomy ) {
    $font_icon = get_term_meta( $term->term_id, 'font_icon', true );
    $e_template_id = get_term_meta( $term->term_id, 'e_template_id', true );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label><?php esc_html_e( 'Elementor Template', 'hyori' ); ?></label></th>
        <td>
            <?php hyori_product_cat_element_template_field($e_template_id); ?>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"><label><?php esc_html_e( 'Font Icon class', 'hyori' ); ?></label></th>
        <td>
            <?php hyori_product_cat_input_field($font_icon); ?>
        </td>
    </tr>
    <?php
}

function hyori_product_cat_input_field( $val = '' ) {
    ?>
    <input name="font_icon" type="text" value="<?php echo esc_attr($val); ?>">
    <p class="description"><?php esc_html_e('Enter your font icon class.', 'hyori'); ?></p>
    <?php
}

function hyori_product_cat_element_template_field($val = '') {
    $elementor_options = ['' => esc_html__('Choose a Elementor Template', 'hyori')];
    if ( did_action( 'elementor/loaded' ) && is_admin() ) {
        $ele_obj = \Elementor\Plugin::$instance;
        $templates = $ele_obj->templates_manager->get_source( 'local' )->get_items();
        
        if ( !empty( $templates ) ) {
            foreach ( $templates as $template ) {
                $elementor_options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
    }
    ?>
    <select name="e_template_id">
        <?php foreach ($elementor_options as $template_id => $name) { ?>
            <option value="<?php echo esc_attr($template_id); ?>" <?php selected($template_id, $val); ?>><?php echo esc_html($name); ?></option>
        <?php } ?>
    </select>
    <p class="description"><?php esc_html_e('Choose a template elementor to show in category page.', 'hyori'); ?></p>
    <?php
}
function hyori_product_cat_save( $term_id ) {
    if ( isset( $_POST['font_icon'] ) ) {
        update_term_meta( $term_id, 'font_icon', $_POST['font_icon'] );
    }
    if ( isset( $_POST['e_template_id'] ) ) {
        update_term_meta( $term_id, 'e_template_id', $_POST['e_template_id'] );
    }
}
