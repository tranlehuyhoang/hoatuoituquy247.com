<div class="block-account">
    <h5 class="title-account margin-top-10">Trang tài khoản</h5>
    <p>Xin chào, <span style="color:;">
        @if(Auth::check())
        {{ Auth::user()->name }}
        @else
        
        @endif
    </span> 
        </p>
    <ul>
        <li>
            <a  class="title-info " href="/account"
                title="Thông tin tài khoản">Thông tin tài khoản</a>
        </li>
        <li>
            <a class="title-info" href="/account/orders" title="Đơn hàng của bạn">Đơn hàng
                của bạn</a>
        </li>
        <li>
            <a class="title-info" href="/account/changepassword" title="Đổi mật khẩu">Đổi
                mật khẩu</a>
        </li>
        <li hidden>
            <a class="title-info" href="/account/addresses" title="Sổ địa chỉ">Sổ địa chỉ
                (0)</a>
        </li>
    </ul>
</div>