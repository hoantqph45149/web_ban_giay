<?php
if (isset($listbill)) {
  foreach ($listbill as $bill) {
    extract($bill);
?>
    <div class="container1">
      <h1>Đơn Hàng MDH<?php echo $bill['id']; ?></h1>
      <div class="customer-info">
        <h2>Thông Tin Khách Hàng:</h2>
        <p><strong>Tên Khách Hàng:</strong><?= $fullname ?></p>
        <p><strong>Email:</strong><?= $email ?></p>
        <p><strong>Địa Chỉ:</strong><?= $address ?></p>
        <p><strong>Số Điện Thoại:</strong><?= $phone_number ?></p>
      </div>
      <div class="order-details">
        <h2>Chi Tiết Đơn Hàng:</h2>
        <table>
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên Sản Phẩm</th>
              <th>Hình ảnh</th>
              <th>Số Lượng</th>
              <th>Size</th>
              <th>Đơn Giá</th>
              <th>Thành Tiền</th>
              <img src="" alt="">
            </tr>
          </thead>
          <tbody>
            <?php
            $ttdh = get_ttdh($bill['status']);
            $pttt = pttt($bill['pttt']);
            $countsp = loadall_cart_count($bill['id']);
            $list_cart =  loadall_cart($bill['id']);
            $i = 1;
            foreach ($list_cart as $cart) {
              echo '
                                <tr>
                                    <td><strong>' . $i++ . '</strong></td>
                                    <td>' . $cart['name'] . '</td>
                                    <td><img style="width:100px; heght:100px; " src="upload/' . $cart['img'] . '" alt=""></td>
                                    <td>' . $cart['num'] . '</td>
                                    <td>' . $cart['size'] . '</td>
                                    <td>' . number_format($cart['price']) . "" . '</td>
                                    <td>' . number_format($cart['total_money']) . "" . '</td>
                                </tr>';
            }
            ?>
          </tbody>
        </table>
        <p><strong>Tổng Cộng:</strong><?php echo number_format($bill['total_money']); ?> VNĐ</p>
      </div>
      <div class="payment-info">
        <h4>Hình Thức Thanh Toán:</h4>
        <p><?php echo $pttt; ?></p>
      </div>
      <div class="note">
        <h4>Ghi Chú:</h4>
        <p><?php echo $bill['note']; ?></p>
      </div>
      <div class="order-date">
        <p><strong>Ngày Đặt Hàng:</strong><?php echo $bill['order_date']; ?></p>
      </div>
      <div class="order-status">
        <p><strong>Trạng Thái Đơn Hàng:</strong><?php echo $ttdh; ?></p>
      </div>
      <div class="order-code">
        <p><strong>Mã Đơn Hàng:</strong>MDH<?php echo $bill['id']; ?></p>
      </div>

      <div class="huydon pull-right">
        <?php
        if ($bill['status'] == 0 && $bill['huydon'] == 0) {
          echo ' <a href="index.php?act=huydon&id=' . $bill['id'] . '&huydon=2">Hủy đơn hàng</a>';
        } elseif ($bill['status'] == 1 && $bill['huydon'] == 0) {
          echo '
                <a href="index.php?act=huydon&id=' . $bill['id'] . '&huydon=1">Yêu cầu hủy đơn hàng</a>
                ';
        } elseif ($bill['status'] == 1 && $bill['huydon'] == 1) {
          echo '
                   <p>Đang chờ xử lý ...</p>
                  ';
        } elseif ($bill['status'] == 1 && $bill['huydon'] == 2) {
          echo '<p>Đơn hàng đã được hủy</p>';
        } elseif ($bill['status'] == 0 && $bill['huydon'] == 2) {
          echo '<p>Đơn hàng đã được hủy</p>';
        } elseif ($bill['status'] == 2) {
          echo '<p>Đang trong trạng thái giao hàng khách hàng vui lòng để ý điện thoại!</p>';
        } else {
          echo '<p>Đơn hàng đã được giao thành công</p>';
        }
        ?>

      </div>
    </div>
<?php
  }
}
?>

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    /* background-color: #f7f7f7; */
  }

  .container1 {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  h1,
  h2 {
    margin-top: 0;
    color: #333;
  }

  .customer-info p,
  .order-details p,
  .payment-info p,
  .note p,
  .order-date p,
  .order-status p,
  .order-code p,
  .additional-info p {
    margin: 5px 0;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table th,
  table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
  }

  table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
  }

  .payment-info p {
    font-weight: bold;
  }

  .order-status p,
  .order-code p {
    font-weight: bold;
    color: #007bff;
  }

  .additional-info {
    border-top: 1px solid #ddd;
    padding-top: 20px;
  }

  .additional-info h2 {
    margin-top: 30px;
  }

  .additional-info p {
    margin-bottom: 10px;
  }
</style>