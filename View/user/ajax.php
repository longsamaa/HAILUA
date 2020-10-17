<?php
    $sql = mysqli_connect("localhost","root","","hailua.com");
    mysqli_set_charset($sql,"utf8");
    if(isset($_POST["query"])){
        $lenh = $_POST['query'];
        $output = '';
        $query = "SELECT * FROM hanghoa WHERE tensanpham LIKE '%".$_POST['query']."%'";
        $result = mysqli_query($sql,$query);
        $output = '<ul class = "list-unstyled" >';
        if(mysqli_num_rows($result) > 0){
            while($numrow = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $output .= '<a href="trangchitietsanpham.php?id='.$numrow['id'].'" class="col"> 
                            <table class = "table table-hover"> 
                            <tbody>
                            <tr>
                            <td>
                                <p>'.$numrow['tensanpham'].'</p>
                            </td> 
                            <td>
                                <img src="'.$numrow['anhminhhoa'].'" width="70px" height="70px" class="img-thumbnail"/>
                            </td>
                            <td>
                                <p>Giá sản phẩm '.$numrow['giasanpham'].'</p>
                            </td>
                            </tr>
                            </tbody>
                            </table> 
                            </a>';
            }
        }
        else {
            $output .= '<li>Không tìm thấy sản phẩm</li>';
        }
    }
    $output .= '</ul>';
    echo $output;
?>