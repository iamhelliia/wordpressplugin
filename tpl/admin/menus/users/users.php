<div class="wrap">
    <h1>کاربران ویژه</h1>
    <table class="widefat">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام کامل</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>کیف پول</th>
                <td>عملیات</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
            <?php 
            $userWallet = get_user_meta($user->ID,'wallet',true);
            $userWallet = empty ($userWallet) ? 0 : $userWallet;
            ?>
                <tr>
                    <td><?php echo $user->ID;?></td>
                    <td><?php echo $user->user_nicename;?></td>
                    <td><?php echo $user->user_email;?></td>
                    <td><?php echo get_user_meta($user->ID,'mobile',true);?></td>
                    <td><?php echo number_format($userWallet).'تومان' ?></td>
                    <td>
                         <a href="<?php echo add_query_arg(['action' => 'edit','id' => $user-> ID]); ?>">
                         <span class="dashicons dashicons-edit"></span></a>

                         <a title="حذف کردن شماره موبایل و کیف پول"href="<?php echo add_query_arg(['action' => 'removeMobileAndWallet','id' => $user-> ID]); ?>">
                         <span class="dashicons dashicons-trash"></span></a>

                    </td>
                </tr>
                <?php endforeach ?>
        </tbody>
    </table>

</div>