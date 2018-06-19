<?php
/**********************************************************************
* Adds Foo_Widget widget.
**********************************************************************/
class SocialMediaWidget extends WP_Widget
{
  public $text_domain   = "social-media-domain";
  public $name          = "Social Mecia";
  public $description   = "Widget that displays social media links";
  public $base_id       = "socialmediawidget";
  public $supported_social_media = null;

  /**********************************************************************
  * Register widget with WordPress.
  **********************************************************************/
  function __construct()
  {
    $this->supported_social_media = get_option('supported_social_media');
    parent::__construct(
      $this->base_id, // Base ID
      esc_html__( $this->name, $this->text_domain ), // Name
      array( 'description' => esc_html__( $this->description, $this->text_domain ), ) // Args
    );
  }

  /**********************************************************************
  * Front-end display of widget.
  *
  * @see WP_Widget::widget()
  *
  * @param array $args     Widget arguments.
  * @param array $instance Saved values from database.
  **********************************************************************/
  public function widget( $args, $instance )
  {
    echo $args['before_widget'];

    //Show the widgets title
    if ( ! empty( $instance['title'] ) )
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

    //Add social media links
    echo '<div class="sm_icon">';
    foreach($this->supported_social_media as $link):
      if(!empty($instance[$link])):
          echo '<a href="'.esc_attr(get_option('sm_'.$link.'_link')).'"><i class="sm_icon fa fa-'.$link.' '.$link.'"></i></a>';
      endif;
    endforeach;
    echo '</div>';

    echo $args['after_widget'];
  }

  /**********************************************************************
  * Back-end widget form.
  *
  * @see WP_Widget::form()
  *
  * @param array $instance Previously saved values from database.
  **********************************************************************/
  public function form( $instance )
  {

    //Get the title
    $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', $this->text_domain );?>

    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
      <?php esc_attr_e( 'Title:', $this->text_domain ); ?>
    </label>

    <?php //input the new title ?>
    <input
      class ="widefat"
      id    ="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
      name  ="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
      type  ="text"
      value ="<?php echo esc_attr( $title ); ?>"
    >
    <br>
    <br>

    <?php //get the links ?>
    <h2>Select the social media linke to be displayed</h2>
    <?php foreach($this->supported_social_media as $link):?>
      <label style="width:350px; display:inline-block;">
        <?php esc_attr_e( $link, $this->text_domain ); ?>
      </label>

      <?php $checked = (!empty( $instance[$link ] ))? 'checked' : ''; ?>
      <input
        id    ="<?php echo esc_attr( $this->get_field_id( $link ) ); ?>"
        name  ="<?php echo esc_attr( $this->get_field_name( $link ) ); ?>"
        type  ="checkbox"
      <?php echo $checked; ?>
      >
      <br>
    <?php endforeach; ?>
    <br>
    <?php
  }

  /**********************************************************************
  * Sanitize widget form values as they are saved.
  *
  * @see WP_Widget::update()
  *
  * @param array $new_instance Values just sent to be saved.
  * @param array $old_instance Previously saved values from database.
  *
  * @return array Updated safe values to be saved.
  **********************************************************************/
  public function update( $new_instance, $old_instance )
  {
    $instance = $old_instance;
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';


    foreach($this->supported_social_media as $link):
      $instance[$link] = (empty($new_instance[$link]))? false: true;
    endforeach;
    return $instance;
  }

} // class Foo_Widget

// register widget
function sm_register_widget() {
    register_widget( 'SocialMediaWidget' );
}
add_action( 'widgets_init', 'sm_register_widget' );
