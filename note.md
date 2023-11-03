<!-- ---------------------------------------- -->
Các div phải trong main
<!-- ---------------------------------------- -->

- Tạo hàm xử lí hiển thị giá sản phẩm (models và controller) -> Tạo 1 file chứa function đó và include khi cần
- JS tạo hàm tăng, giảm số lượng cho trang cart và checkout (tương tác với bảng cart)
- Tạo table cart
- add to cart là button(gửi ajax - file handle add to cart php xử lí (table cart) - thành công hiển thị box alert)
- Trước khi add to cart => check đăng nhập chưa
- Trước khi thanh toán => check đăng nhập chưa + check số lượng từng sản phẩm + check thông tin người dùng
- Sau khi thanh toán khi thanh toán => xóa những productId trên cart 
- Cart: những sản phẩm sẽ auto checkbox ( JS: nếu có 1 sản phẩm checkbox thì sẽ hiển thị nút checkout )

- Thêm 1 bảng lọc theo price + category + status

- Admin: Comment -> Hiển thị + xóa + đánh giá (good, bad, notyet)


<!-- ------------------------------ SAU CÙNG ------------------------------- -->
- Có thể chuyển slide (Tạo mới 1 bảng slide)
- Có thể phát triển thêm bảng discount code cho từng người dùng (userid - id)
- Có thể hàm dịch productId thành tên cho dễ đọc
- Admin: Blogs -> Thêm + sửa + xóa -> Hiển thị lên web (LÀM SAU CÙNG BỔ SUNG - KO QUAN TRỌNG)
- Statistical -> viết query lấy dữ liệu và cập nhật ==> SAU KHI HOÀN THÀNH CHECKOUT
<!-- ------------------------------ SAU CÙNG ------------------------------- -->

CHI TIẾT USER 
ADD TO CART AJAX