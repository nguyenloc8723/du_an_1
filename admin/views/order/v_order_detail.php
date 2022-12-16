<main><br>
  <div class="info-user-order">
    <h2>Thông tin khách hàng</h2> <br>
    <p>Tên khách hàng: <?= $data_order_user->ho_ten ?></p> <br>
    <p>Số điện thoại: <?= $data_order_user->sdt ?></p> <br>
    <p>Địa chỉ nhận hàng: <?= $data_order_user->dia_chi ?></p> <br>
    <p>Ghi chú: <?= $order_data->note ?></p> <br>
    <p>Ngày đặt hàng: <?= $order_data->create_at ?></p> <br>
    <p>
      Trạng thái : <?php if ($order_data->status == 0) { ?>
        Chưa xác nhận
      <?php } else if ($order_data->status == 1) { ?>
        Đã xác nhận
      <?php } else if ($order_data->status == 2) { ?>
        Đang giao hàng
      <?php } else if($order_data->status == 3){?>
        Đã hủy
        <?php }?>
    </p>
    <form action="" method="post">
      <select name="status" id="" style="position: relative; left: -150px; padding: 5px;">
        <option value="0">Chưa xác nhận</option>
        <option value="1">Đã xác nhận</option>
        <option value="2">Đang giao hàng</option>
        <option value="3">Hủy</option>
      </select>
      <button type="submit">Cập nhật</button>
    </form>
  </div>
  <br>
  <div class="noidung">
    <table border="1">
      <tr>
        <th>STT</th>
        <th>Mã đơn hàng chi tiết</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
      </tr>

      <?php $total = 0; ?>
      <?php foreach ($data_orderDetail as $key => $value) {
        $total += $value->price * $value->quantity ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $value->id_order ?></td>
          <td><?= $value->ten_hh ?></td>
          <td><img src="../public/images/<?= $value->hinh ?>" alt="" width="100"></td>
          <td><?= $value->quantity ?></td>
          <td><?= number_format($value->price) ?></td>
          <td><?= number_format($value->price * $value->quantity) ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="6">Tổng tiền</td>
        <td><?= number_format($total) ?></td>
      </tr>
    </table>
  </div>
</main>