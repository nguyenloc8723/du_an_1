<main>
  <div class="noidung">
    <table border="1">
      <tr>

        <th>Mã đơn hàng</th>
        <th>Tên khách hàng </th>
        <th>Sdt</th>
        <th>Địa chỉ</th>
        <th>Tổng tiền </th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Note</th>
        <th>Thao tác</th>
      </tr>

      <?php foreach ($orders as $key => $value) { ?>
        <tr>
          <td><?= $value->id ?></td>
          <td><?= $value->name ?></td>
          <td><?= $value->sdt ?></td>
          <td><?= $value->address ?></td>
          <td><?= number_format($value->total) ?>đ</td>
          <td><?= $value->create_at ?></td>
          <td>
            <?php if ($value->status == 0) { ?>
              Chưa xác nhận
            <?php } else if ($value->status == 1) { ?>
              Đã xác nhận
            <?php } else if ($value->status == 2) { ?>
              Đang giao hàng
            <?php } else if ($value->status == 3) { ?>
              Đã hủy
            <?php } ?>
          </td>
          <td><?= $value->note ?></td>
          <td>
            <a href="?act=show-orders-detail&id=<?= $value->id ?>">Chi tiết</a>
          </td>
        </tr>
      <?php } ?>
    </table>
    <!-- <?php
          foreach ($m_khach_hangs as $key => $value) {
            print_r($value);
          }
          ?> -->
  </div>
</main>