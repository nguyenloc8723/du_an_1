<main>
  <div class="cards" style="margin-bottom: 25px;">
    <div class="card-single">
      <div>
        <h1><?= count($show_users) ?></h1>
        <span><i class="fa-solid fa-users"></i>Users</span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <h1><?= count($show_lh) ?></h1>
        <span><i class="fa-solid fa-diagram-project"></i>Categories</span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <h1><?= count($show_sps) ?></h1>
        <span><i class="fa-brands fa-product-hunt"></i>Product</span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <h1><?= count($show_bl) ?></h1>
        <span><i class="fa-solid fa-users"></i>Comments</span>
      </div>
    </div>

  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <div id="myChart" style="width:80%; height:500px; transform: translateX(90px);"></div>
  <?php
  $sum = count($show_users) + count($show_lh) + count($show_sps) + count($show_bl);
  ?>
  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['User', 'Tổng <?= $sum ?> '],
        ['Users', <?= count($show_users) ?>],
        ['Categories', <?= count($show_lh) ?>],
        ['Product', <?= count($show_sps) ?>],
        ['Comments', <?= count($show_bl) ?>],
      ]);

      var options = {
        title: 'Thống kê',
        colors: ['#e0440e', ]
      };

      var chart = new google.visualization.BarChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
  </script>

  <div class="noidung">
  <a href="?act=add-product"> <button type="submit">Thêm sp </button></a>
    <table border="1px">
      <tr>

        <th>Mã hh</th>
        <th>Tên hàng hóa</th>
        <th>Giá bán</th>
        <th>Giá gốc</th>
        <th>Ảnh hàng hóa</th>
        <th>Id loại</th>
        <th>Đặc biệt</th>
        <th>Đã bán</th>
        <th>Ngày nhập</th>
        <th>Mô tả </th>
        <th>Chỉnh sửa</th>

      </tr>
      <?php foreach ($show_sps as $key => $value) { ?>
        <tr>

          <td><?php echo $value->id_hh ?></td>
          <td><?php echo $value->ten_hh ?></td>
          <td><?php echo $value->don_gia ?> </td>
          <td><?php echo $value->giam_gia ?></td>
          <td><img src="../public/images/<?php echo $value->hinh ?>" alt="" width="100px"></td>

          <td><?php echo $value->id_loai ?></td>
          <td><?php echo $value->dac_biet ?></td>
          <td><?php echo $value->da_ban ?></td>

          <td><?php echo $value->ngay_nhap ?></td>
          <td><?php echo $value->mo_ta ?></td>
          <td>
            <a class="sx" href="?act=edit-product&id_hh=<?php echo $value->id_hh ?>">Sửa</a>
            <a class="sx" onclick="return confirm('Bạn có muốn xóa ko')" href="?act=delete-product&id_hh=<?php echo $value->id_hh ?>">xóa</a>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>

</main>