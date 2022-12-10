<footer>
        <div class="nguon">
            <h3>LIÊN HỆ</h3>
            <p class="dcfpt"><a href=""> <i class="fa-solid fa-map-location-dot"></i>&#8194;Địa chỉ: Cao Đẳng FPT
                    Polytechnic</a></p>
            <p class="dcfpt"><a href=""> <i class="fa-solid fa-phone"></i>&#8194;Điện Thoại: 0382157704 </a></p>
            <p class="dcct"><a href=""><i class="fa-solid fa-envelope-circle-check"></i>&#8194;Mail:
                    locntph23497@fpt.edu.vn</a></p>
        </div>
        <div class="nguon">
            <h3>NGUỒN</h3>
            <ul class="nguon1">
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Dịch vụ</a></li>
                <li><a href="#">Tầm nhìn</a></li>
                <li><a href="#">Sứ mệnh</a></li>
                <li><a href="#">Điều kiện</a></li>
                <li><a href="#">Sự riêng tư</a></li>
            </ul>
            <ul class="nguon2">
                <li><a href="#">Đối tác</a></li>
                <li><a href="#">Việc kinh doanh</a></li>
                <li><a href="#">Nghề nghiệp</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Câu hỏi thường gặp</a></li>
                <li><a href="#">Sáng tạo</a></li>
            </ul>

        </div>
        <div class="nguon4">
            <h3>LIÊN KẾT</h3>
            <ul class="nguon1">
                <li><a href="#">Tầm nhìn của chúng tôi</a></li>
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Liên hệ chúng tôi</a></li>
            </ul>
            <ul class="nguon3">
                <li><a href="https://www.facebook.com/profile.php?id=100019308222794"><i
                            class="fa-brands fa-twitter-square"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100019308222794"><i
                            class="fa-brands fa-facebook-square"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100019308222794"><i
                            class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100019308222794"><i
                            class="fa-brands fa-instagram-square"></i></a></li>
            </ul>
        </div>

    </footer>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckfinder/ckfinder.js"></script>
    <script>
        
                  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
        console.log(img);
        var arrImg = [
            "public/images/mau-banner-quang-cao-khuyen-mai.jpg",
            "public/images/Banner2.jpg",
            "public/images/banner3.jpeg",
            "public/images/banner4.jpg",
            "public/images/banner1.jpg"
        ]
        var img = document.querySelector('.banner');
        var interval = null;
        var index = 0;

        function showImg(){
            if(index >= arrImg.length){
                index = 0;
            }
            img.src = arrImg[index];
            index++;
        }
        function startImg(){
            var second = 2000;
            if(interval == null){
                interval = setInterval(showImg, second);
            }
        }
        startImg();

        const info = document.getElementById('info');
        const option = document.querySelector('.option');
        console.log(option);

        info.addEventListener('click', () => {
            option.classList.toggle('show');
        });
    </script>
    <script>
        var editor = CKEDITOR.replace('mo_ta', {
            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            height: 500,
        })
        CKFinder.setupCKEditor(editor);
    </script>