<!-- <div class="wrap">
    <h1>عمومی</h1>
</div> -->

<div class="wrap">
    <h1>تنظیمات پلاگین</h1>


    <form action= "" method="post">

       <lable for="is_plugin_active">
            <input name="is_plugin_active" type="CheckBox" id="is_plugin_active"
             <?php echo isset($current_plugin_status) && intval($current_plugin_status) > 0 ? 'checked':'' ?>
             >
            فعال بودن پلاگین
        </lable>

    <div> 
        <button class="button-button primary" type="submit" name="saveSetting">ذخیره سازی</button></div>
    </form>
    
</div>
