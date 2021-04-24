<?php
              $tv="SELECT id,ten,hinh_anh from thuoc order by id";
              $tv_1=$conn->prepare($tv);
              $tv_1->execute();
             
              
              while($tv_2=$tv_1->fetch())
              {
                $anh="hinh_anh/thuoc/".$tv_2["hinh_anh"];
              echo '<li>';
              echo "<a href='#'>";
             echo'<img src="'.$anh.'" width="100px">';
              // echo $anh;
              // echo $tv_2['ten'];
                echo "</a>";
                echo "</li>";
            }
         
?>