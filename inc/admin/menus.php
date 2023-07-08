<?php
// die('menus page');
//Actions
add_action('admin_menu','wp_apis_register_menus');

//functions
function wp_apis_register_menus(){
    add_menu_page(
        'پلاگین سفارشی',
        'پلاگین سفارشی',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler'

    );
    add_submenu_page(
        'wp_apis_admin',
        'عمومی',
        'عمومی',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page'

    );
    add_submenu_page(
        'wp_apis_admin',
        'کاربران',
        'کاربران',
        'manage_options',
        'wp_apis_usere',
        'wp_apis_users_page'

    );
}
function wp_apis_main_menu_handler(){
   global $wpdb;
   $action = $_GET['action'];
//    var_dump($action);
    if($action == "delete")
    {
        $item = intval($_GET['item']);
        if($item > 0)
        {
            $wpdb->delete($wpdb->prefix.'users',['ID'=> $item]);
        }

    }
    if($action == "add")
    
    {
       if(isset($_POST['SaveData'])){
        wp_insert_user([
            'user_login' => $_POST['name'],
            'user_email' => $_POST['email'],
        ]);
        add_user_meta(1,'phone number' ,$_POST['number']);
        // $wpdb->insert($wpdb->prefix,'users',[
        //     'name' => $_POST['name'],
        //     'email' => $_POST['email'],
        //     'number' => $_POST['number']
        
        // ]);


       } 
        include  WP_APIS_TPL.'admin/menus/add.php';

    }else{
        $samples = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users");
   
        include  WP_APIS_TPL.'admin/menus/main.php';
    }

    if($action == "update")
    {
        if(($_POST['UpdateData'])){
            wp_insert_user([
                'user_login' => $_POST['name'],
                'user_email' => $_POST['email'],
            ]);
            add_user_meta(1,'phone number' ,$_POST['number']);
            // var_dump($_POST);
            // $wpdb->insert($wpdb->prefix,'users',[
            //     'name' => $_POST['name'],
            //     'email' => $_POST['email'], 
            
            // ]);
        }
        include WP_APIS_TPL.'admin/menus/updata.php';
    }
 
}
function wp_apis_general_page(){
    if(isset($_POST['saveSetting']))
    {
        // var_dump($_POST);
        // $is_plugin_active =  isset($_POST['is_plugin_active']) ? 1 : 0;
        // var_dump($is_plugin_active);
        if(isset($_POST['is_plugin_active'])){
             update_option('wp_api_is_active',1);
        }else{
            delete_option('wp_api_is_active');
        }
        // add_option('wp_apis_is_active',$is_plugin_active);
    include  WP_APIS_TPL.'admin/menus/general.php';
}
}




function wp_apis_price_meta_box_handler($post)
{
    $post_price = get_post_meta($post->ID,'wp_apis_price',true)
    ?>
    <input type="text" name="wp_apis_post_price" 
    value="<?php echo $post_price; ?>>
    <?php
}
function wp_apis_add_price_meta_box()
{
    add_meta_box(
        'price-meta-boxes',
        'قیمت مطلب',
        'wp_apis_price_meta_box_handler',
        'post',
        'side',
        'high'
    );

}

function wp_apis_save_price_meta_box($post_id){
    if(isset($_POST['wp_apis_post_price']))
    {
        update_post_meta($post_id,'wp_apis_price',$_POST['wp_apis_post_price']);
    }

}
add_action('add_meta_boxes','wp_apis_add_price_meta_box');
add_action('save_post','wp_apis_save_price_meta_box');

function wp_apis_users_page($post_id){
        $newPassword = wp_generate_password(10);
        $userEmail = "userEmail23@gmail.com";
        $userEmailData = explode('@',$userEmail);
        wp_create_user($userEmailData[0],$newPassword,"someUser123@gmail.com");
        global $wpdb;
        if(isset($_GET['action']) && $_GET['action'] = 'edit')
        {
            $userID = intval($_GET['id']);
            if(isset($_POST['saveUserInfo'])){

                $mobile = $_POST['mobile'];
                $wallet = $_POST['wallet'];
                if(!empty($mobile))
                {
                    update_user_meta($userID,'mobile',$mobile);
                }
                if(!empty($wallet))
                {
                    update_user_meta($userID,'wallet',$wallet);
                }


            }
           
            $mobile = get_user_meta($userID,'mobile',true);
            $wallet = get_user_meta($userID,'wallet',true);
            include WP_APIS_TPL.'admin/menus/users/edit.php';
            return;

        }
        if(isset($_GET['action']) && $_GET['action' == 'removeMobileAndWallet']){
            $userID = intval($_GET['id']);
            delete_user_meta($userID,'mobile');
            delete_user_meta($userID,'wallet');
        }
        $users = $wpdb->get_results("SELECT ID,user_email,display_name FROM{$wpdb->users}");
        // var_dump($users);
    include WP_APIS_TPL.'admin/users/users.php';
}
