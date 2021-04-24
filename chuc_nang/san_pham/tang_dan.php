<?php
              
               $tv= "SELECT id,ten,gia,hinh_anh from san_pham order by gia ASC ";
              
              $tv_1=$conn->prepare($tv);
              $tv_1->execute();
              echo "<table>";
              while($tv_2=$tv_1->fetch())
              {   
               echo '<tr>';
                for($i=1;$i<=4;$i++)
                {
                  echo "<td width='230px' height='300'>";
                  echo' <section id="why-us" class="why-us">
                  <div class="container">

                  <div class="row">

                  <div  data-aos="fade-up">
                  <div class="box">';
                  
                 

                if($tv_2!=false)
                    {
                  echo'<a href="#">';
                  $link_anh="hinh_anh/san_pham/".$tv_2["hinh_anh"];
                  $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                  echo "<a href='$link_chi_tiet' >";
                  echo'<img src="'.$link_anh.'" class="img-fluid" alt="" width="300px">';
                  echo'<div class="portfolio-info">';
                  echo' '.$tv_2["ten"].'<br />';
                  $gia=$tv_2['gia'];
                  $gia=number_format($gia,0,",",".");
                  echo'<p> <center>'.$gia.' VNĐ</center></p>';
                  echo'</a>';
                    }
                    else
                    {
                        echo "&nbsp;";
                    }
                  echo "</td>";
                    if($i!=3)
                {
                    $tv_2=$tv_1->fetch();
                }
              echo'</div>
              </div>
      </div>
    </section>';
            }
           echo '</tr>';
          }
          echo '</table>';
          ?>