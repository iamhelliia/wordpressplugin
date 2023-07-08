<?php
function wp_apis_price_meta_box_handler()
{

}
function wp_apis_add_price_meta_box()
{
    add_meta_box(
        'wp-apis-price-meta-boxes',
        'قیمت مطلب',
        'wp_apis_price_meta_box_handler',
        'post',
        'side',
        'high'
    );
}

add_action('add_meta_boxes','wp_apis_add_price_meta_box',10,2);