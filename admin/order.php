<?php include('header.php'); ?>


<?php 
    if(!isset($_SESSION['admin_logged_in'])){
        header("Location: login.php");
        exit();
    }

?>


<?php


  
        
    if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
        //if user already entered page then page number is the one that they selected
        $page_no = $_GET['page_no'];
        }else{
          //if user just entered the page then default page is 1
          $page_no = 1;
        }
        //return number of products 
        $stmt1= $conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
        $stmt1->execute();
        $stmt1->bind_result($total_records);
        $stmt1->store_result();
        $stmt1->fetch();
  
        //products per page
        $total_records_per_page = 10;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no +1;
        $adjacents = "2";
        $total_no_of_pages = ceil($total_records/$total_records_per_page);
  
        //get all products
        $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset, $total_records_per_page");
        $stmt2->execute();
        $orders = $stmt2->get_result();
  
  
  
  

?>








        <div id="content">
            <div id="navbar">
                <h2>Order list</h2>
              
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order status</th>
                        <th>User ID</th>
                        <th>Order date</th>
                        <th>User phone</th>
                        <th>User address</th>
                        <th>Edit</th>
                        
                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order){?>
                    <tr>
                        <td><?php echo $order['order_id']; ?> </td>
                        <td><?php echo $order['order_status']; ?></td>
                        <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['user_address']; ?></td>
                        <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id'];?>">Edit</a></td>
                       
                    </tr>
                <?php } ?>
                </tbody>
            </table>
      
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item <?php if($page_no<=1){echo 'disabled'; }?>">
                <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
              </li>
    
                <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
    
                <?php if($page_no >=3) {?>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no; ?></a></li>
                  <?php  } ?>
    
                <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
                <a class="page-link" href="<?php if($page_no>= $total_no_of_pages){echo '#';} else{echo "?page_no=".($page_no+1);}?>">Next</a></li>
            </ul>
        </nav>
    </div>

</body>

</html>