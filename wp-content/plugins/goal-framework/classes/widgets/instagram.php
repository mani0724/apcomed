<?php

class GoalFramework_Widget_Instagram extends Goal_Widget {
    public function __construct() {
        parent::__construct(
            'goal_instagram',
            esc_html__('Goal Instagram Widget', 'goal-framework'),
            array( 'description' => esc_html__( 'Show instagram', 'goal-framework' ), )
        );
        $this->widgetName = 'instagram';
    }

    public function getTemplate() {
        $this->template = 'instagram.php';
    }

    public function widget( $args, $instance ) {
        $this->display($args, $instance);
    }
    
    public function form( $instance ) {
        $defaults = array(
            'title' => 'Instagram',
            'username' => '',
            'number' => '',
            'size' => '',
            'target' => '',
            'columns' => 4,
            'style' => 'style1',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        $styles = apply_filters( 'goal_framework_instagram_styles', array('style1' => esc_html__( 'Style 1', 'goal-framework' )) );
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'goal-framework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'username' )); ?>"><?php esc_html_e( 'Username:', 'goal-framework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'username' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'username' )); ?>" type="text" value="<?php echo esc_attr( $instance['username'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number:', 'goal-framework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
        </p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'goal-framework' ); ?>:</label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
                <option value="thumbnail" <?php selected( 'thumbnail', $instance['size'] ) ?>><?php esc_html_e( 'Thumbnail', 'goal-framework' ); ?></option>
                <option value="small" <?php selected( 'small', $instance['size'] ) ?>><?php esc_html_e( 'Small', 'goal-framework' ); ?></option>
                <option value="large" <?php selected( 'large', $instance['size'] ) ?>><?php esc_html_e( 'Large', 'goal-framework' ); ?></option>
                <option value="original" <?php selected( 'original', $instance['size'] ) ?>><?php esc_html_e( 'Original', 'goal-framework' ); ?></option>
            </select>
        </p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'goal-framework' ); ?>:</label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
                <option value="_self" <?php selected( '_self', $instance['target'] ) ?>><?php esc_html_e( 'Current window (_self)', 'goal-framework' ); ?></option>
                <option value="_blank" <?php selected( '_blank', $instance['target'] ) ?>><?php esc_html_e( 'New window (_blank)', 'goal-framework' ); ?></option>
            </select>
        </p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style', 'goal-framework' ); ?>:</label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" class="widefat">
                <?php foreach ($styles as $key => $value) { ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( $key, $instance['style'] ) ?>><?php echo trim($value); ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'columns' )); ?>"><?php esc_html_e( 'Columns:', 'goal-framework' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'columns' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'columns' )); ?>" type="text" value="<?php echo esc_attr( $instance['columns'] ); ?>" />
        </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['username'] = ( ! empty( $new_instance['username'] ) ) ? strip_tags( $new_instance['username'] ) : '';
        $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
        $instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
        $instance['target'] = ( ! empty( $new_instance['target'] ) ) ? strip_tags( $new_instance['target'] ) : '';
        $instance['columns'] = ( ! empty( $new_instance['columns'] ) ) ? strip_tags( $new_instance['columns'] ) : '';
        $instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
        return $instance;

    }
}

register_widget( 'GoalFramework_Widget_Instagram' );