<div class="wrap">
    <h1>ویرایش اطلاعات کاربر</h1>
    <form action=" " method="post">
        <table class="form-table"> 
            <tr valign="top">
                <th scope="row">شماره همراه</th>
                <td>
                <input type="text" name="mobile" value="<?php echo $mobile?>" /><td>

            </tr>
            <tr valign="top">
                <th scope="row">کیف پول</th>
                <td>
                <input type="text" name="wallet" value="<?php echo $wallet?>"/><td>

            </tr>
            <tr valign="top">
                <th scope="row"></th>
                <td>
                <button class="button" type="submit" name="saveUserInfo">ذخیره سازی اطلاعات</button>

            </tr>

        </table>
    </form>
</div>