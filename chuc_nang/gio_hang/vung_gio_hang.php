<div style='margin-left:5px;'>
<br>
<div style='text-align: center;'>
<b>Giỏ hàng </b><br><br>
</div>
<?php
    $so_luong=0;
    if(isset($_SESSION['id_them_vao_gio']))
    {
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }
    }
?>
<br><br>
Số sản phẩm : <?php echo $so_luong; ?>
<a href="?thamso=gio_hang">Giỏ hàng</a>
</div>