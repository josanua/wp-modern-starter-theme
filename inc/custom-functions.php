<?php
/**
 * Add thumbnail image hide option for a single post/page view
 */
 
add_action( 'add_meta_boxes', 'hide_featured_img_metabox');
function hide_featured_img_metabox() {
    add_meta_box(
        'show_featured_image_hide_option',           // Metabox ID
        'Hide Featured Image on single post view',   // Metabox Title
        'render_hide_featured_img_metabox',          // Callback function to render the content
        'post',                                      // Post type
        'normal',                                    // Context (normal, side, advanced)
        'high'                                       // Priority (default, high, low)
    );
}

// Callback function to render the content of the metabox
function render_hide_featured_img_metabox($post) {
    // Retrieve existing value for the metabox
    $hide_thumbnail = esc_attr(get_post_meta($post->ID, 'hide_featured_img_meta', true));

    // Output the HTML for the metabox content
    ?>
    <label for="hide_featured_img_meta">Hide featured image:</label>
    <input 
      type="checkbox" 
      id="hide_featured_img_meta" 
      name="hide_featured_img_meta" 
      value="<?php echo $hide_thumbnail; ?>" 
      <?php if ( $hide_thumbnail ) echo 'checked' ?>
    >
    <?php
}

// Save custom field data when the post is saved
add_action('save_post', 'save_hide_featured_img_metabox_data');
function save_hide_featured_img_metabox_data($post_id) {
  
    $checkbox_value = isset($_POST['hide_featured_img_meta']) ? 1 : 0;
    $hide_thumbnail = get_post_meta($post->ID, 'hide_featured_img_meta', true);
    
    if ($checkbox_value !== $hide_thumbnail) {
      update_post_meta($post_id, 'hide_featured_img_meta', $checkbox_value);  
    }
}

// add a custom filter to modify the language list
add_filter('enlighter_languages', function($langs){
	// DEBUG: just display the dataset - uncomment the following line to debug issues
	// echo '<pre>', print_r($langs, true), '</pre>';

	unset($langs['abap']);
	unset($langs['asm']);
	unset($langs['avrasm']);
	unset($langs['c']);
	unset($langs['csharp']);
	unset($langs['cpp']);
	unset($langs['cython']);
	unset($langs['cordpro']);
	unset($langs['dart']);
	unset($langs['groovy']);
	unset($langs['golang']);
	unset($langs['kotlin']);
	unset($langs['latex']);
	unset($langs['lighttpd']);
	unset($langs['lua']);
	unset($langs['nsis']);
	unset($langs['oracledb']);
	unset($langs['postgresql']);
	unset($langs['prolog']);
	unset($langs['python']);
	unset($langs['purebasic']);
	unset($langs['qml']);
	unset($langs['r']);
	unset($langs['routeros']);
	unset($langs['ruby']);
	unset($langs['rust']);
	unset($langs['scala']);
	unset($langs['squirrel']);
	unset($langs['swift']);
	unset($langs['java']);
	unset($langs['vhdl']);
	unset($langs['visualbasic']);
	unset($langs['verilog']);
	unset($langs['matlab']);
	unset($langs['powershell']);
	return $langs;
});