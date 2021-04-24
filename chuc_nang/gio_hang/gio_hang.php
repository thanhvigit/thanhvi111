<?php
    if(isset($_GET['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co")
    {
        $_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
        if(isset($_SESSION['id_them_vao_gio']))
        {
            $so=count($_SESSION['id_them_vao_gio']);
            $trung_lap="khong";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                if($_SESSION['id_them_vao_gio'][$i]==$_GET['id'])
                {
                    $trung_lap="co";
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }
            if($trung_lap=="khong")
            {
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
            }
            if($trung_lap=="co")
            {
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
            }
        }
        else
        {
            $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
        }
    }

    $gio_hang="khong";
    if(isset($_SESSION['id_them_vao_gio']))
    {
        $so_luong=0;
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }
        if($so_luong!=0)
        {
            $gio_hang="co";
        }
    }
  
    echo "Giỏ hàng";
    echo "<br>";
    echo "<br>";
    echo "<center>";
    if($gio_hang=="khong")
    {
        echo "Không có sản phẩm trong giỏ hàng";
    }
    else
    {
        echo "<form action='' method='post' >";
        echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
        echo "<style type='text/css'>
        table, th, td{
            border:1px solid #868585;
        }
        table{
            border-collapse:collapse;
            width:100%;
        }
        th, td{
            text-align:left;
            padding:10px;
        }
        table tr:nth-child(odd){
            background-color:#eee;
        }
        table tr:nth-child(even){
            background-color:white;
        }
        table tr:nth-child(1){
            background-color:skyblue;
        }
    </style>";
        echo "<table border='1'>";
            echo "<tr>";
                echo "<th width='200px' >Tên</th>";
                echo "<th width='150px' >Số lượng</th>";
                echo "<th width='150px' >Đơn giá</th>";
                echo "<th width='170px' >Thành tiền</th>";
                echo "<th width='170px' >Sản phẩm</th>";
            echo "</tr>";
            $tong_cong=0;
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
          
                $tv="SELECT id,ten,gia,hinh_anh from san_pham where id='".$_SESSION['id_them_vao_gio'][$i]."'";
                $tv_1=$conn->prepare($tv);
                $tv_1->execute();
                $tv_2=$tv_1->fetch();
              
                $tien=$tv_2['gia']*$_SESSION['sl_them_vao_gio'][$i];
                $tong_cong=$tong_cong+$tien;
                $name_id="id_".$i;
                $name_sl="sl_".$i;
                if($_SESSION['sl_them_vao_gio'][$i]!=0)
                {
                    $link_anh="hinh_anh/san_pham/".$tv_2["hinh_anh"];
                echo "<tr>";
                    echo "<td>".$tv_2['ten']."</td>";
                    echo "<td>";
                    echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
                    echo "<input type='text' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
                    echo "</td>";
                    $gia=$tv_2['gia'];
                    $gia=number_format($gia,0,",",".");
                    echo "<td>".$gia."</td>";
                    $tien=number_format($tien,0,",",".");
                    echo "<td>".$tien."</td>";
                    echo '<td>'.'<img src="'.$link_anh.'"width="100px">'.'</td>';
                echo "</tr>";
                }
            }  
            // echo "<tr>";
            //     echo "<td>&nbsp;</td>";
            //     echo "<td><input type='submit' value='Cập nhật' > </td>";
            //     echo "<td>&nbsp;</td>";
            //     echo "<td>&nbsp;</td>";
            // echo "</tr>";  
        echo "</table>";
        echo "<td><input type='submit' value='Cập nhật' > </td>";
        echo "</form>";
        echo "<br>";
        $tong_cong=number_format($tong_cong,0,",",".");
        echo "Tổng giá trị đơn hàng là : ".$tong_cong." VNĐ";
        echo "</center>";
        include("chuc_nang/gio_hang/bieu_mau_mua_hang.php");
        
    }
  
?>