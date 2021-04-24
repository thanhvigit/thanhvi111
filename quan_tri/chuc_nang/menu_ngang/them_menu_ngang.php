<?php
    if(!isset($bien_bao_mat)){exit();}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
     tinymce.init({
                    selector: "#noi_dung",
                    
                    
                    
                  });
    </script>
</head>
<body>
<form action="" method="post">
    <table width="990px" >
        <tr>
            <td colspan="2" ><b style="color:blue;font-size:20px" >Thêm menu ngang</b><br><br> </td>
           
        </tr>
        <tr>
            <td width="150px" >Tên : </td>
            <td width="840px">
                <input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
            </td>
        </tr>
        <tr>
            <td>Loại menu : </td>
            <td>
                <?php
                    $a_1="";
                    $a_2="";
                    if(isset($_SESSION['loai_menu_wr8']))
                    {
                        if($_SESSION['loai_menu_wr8']=="san_pham")
                        {
                            $a_2="selected";
                        }
                    }
                ?>
                <select name="loai_menu" style="margin-top:3px;margin-bottom:3px;" >
                    <option value="" <?php echo $a_1; ?> >Bình thường</option>
                    <option value="san_pham" <?php echo $a_2; ?> >Sản phẩm</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nội dung : </td>
            <td>
                  <textarea id="noi_dung" name="noi_dung" ></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <br>
                <input type="submit" name="bieu_mau_them_menu_ngang" value="Thêm menu" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>
</body>
</html>
