<div class="wrap">
<h1>لیست اطلاعات</h1>
<a href="<?php echo add_query_arg(['action' => 'add'])?>">ثبت داده جدید</a>
<table class="widefat">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>شماره</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($samples as $sample):?>
            <tr>
            <td><?php echo $sample->ID;?></td>
            <td><?php echo $sample->user_login;?></td>
            <td><?php echo $sample->user_email;?></td>
            <td><?php echo $sample->user_pass; ?></td>
            <td>
                <a href="<?php echo add_query_arg(['action' => 'delete','item' => "$sample->ID"])?>">حذف کردن/ </a>
                <a href="<?php  echo add_query_arg(['action' => 'update' , 'item' =>"$sample->ID"])?>"> آپدیت کردن</a>
            </td>

            </tr>
            

         <?php endforeach; ?>
    </tbody>
</table>
</div>