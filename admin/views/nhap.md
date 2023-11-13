
            <tr>
                <th>' . $i . '</th>
                <th>' . $sp['category_name'] . '</th> 
        
                <th>' . $sp['name'] . '</th>
                <th><img width="80px" height="100px" src="'.$sp['img'].'" alt=""></th>
               
               
                <th>'. number_format($sp['price'], 0, ',', '.') .' VNĐ</th>
                <th>' . $sp['sale'] . '</th>
                <th>' . $sp['view'] . '</th>
                <th>' . $sp['hot'] . '</th>
               
                <th><a href="admin.php?act=updatesp&id=' . $sp['id'] . '">sửa</a> | <a href="admin.php?act=delsp&id=' . $sp['id'] . '">Xóa</a></th>
            </tr>