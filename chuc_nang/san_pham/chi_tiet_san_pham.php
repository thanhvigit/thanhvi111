<?php
    $_SESSION['trang_chi_tiet_gio_hang']="co";
    $id=$_GET['id'];
    $tv="SELECT * from san_pham where id='$id'";
    $tv_1=$conn->prepare($tv);
    $tv_1->execute();
    $tv_2=$tv_1->fetch();
    $link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
    echo '<center>';
    echo "<table>";
        echo "<tr>";
            echo "<td width='600px'>";
            echo '<h5>'.$tv_2['ten'].'</h5>';
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='center' >";
                echo '<div style="background: linear-gradient(40deg,#4caf5014,#ffeb3b17);
                    border-image-source: linear-gradient(to right, #4caf5080, #9c27b0a8, #03a9f4a6);
                    ">';
                echo "<img src='$link_anh' width='450px' >";
                echo "</div>";
            echo "</td>";
            
            echo "<td width='300px' >";
            echo '<div style="background: linear-gradient(40deg,#4caf5014,#ffeb3b17);
                    border-radius: 3px;
                    border: 3px solid #d5d5d500;
                    color: #333333;
                    border-image-source: linear-gradient(to right, #4caf5080, #9c27b0a8, #03a9f4a6);
                    border-image-slice: 1;
                    padding: 0.5em;
                    ">';
                    echo '<h5> Nội dung: </h5>';
                    echo $tv_2['noi_dung'];
                echo "<br>";
                echo "<br>";
                $gia=$tv_2['gia'];
                $gia=number_format($gia,0,",",".");
                echo 'Giá sản phẩm: '. $gia ." VNĐ";
                echo "<br>";
                echo "<br>";
                echo "<form>";
                    echo "<input type='hidden' name='thamso' value='gio_hang' > ";
                    echo "<input type='hidden' name='id' value='".$_GET['id']."' > ";
                    echo "<input type='text' name='so_luong' value='1' style='width:50px' > ";
                    echo "<input type='submit' value='Thêm vào giỏ' style='margin-left:15px' > ";
                echo "</form>";
                echo "</div>";
            echo "</td>";
            
        echo "</tr>";
    echo "</table>";
    echo '</center>'
?>