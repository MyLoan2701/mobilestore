<!-- Đăng nhập -->
<div class="login modal" id="loginModal">
            <div class="modal-content animationtop">
                <div class="modal-header">
                    <span onclick="document.getElementById('loginModal').style.display='none'">X</span>
                    <h1>Đăng nhập</h1>
                </div>
                <div class="modal-container clearfix">
                    <form action="./login/show" class="form form-login" method="POST">
                        <div>
                            <input type="email" class="ipt text-email" placeholder="Email" required value="" name="email">
                            <span class="err-mess">*Trường Email là bắt buộc!</span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Mật khẩu" required value="" name="password">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                        </div>
                        <input class="ipt text-submit" type="submit" value="Đăng nhập" name="login">
                    </form>
                    <div class="link-singup">
                        Chưa có tài khoản?
                        <a onclick="changeSignUp()">Đăng ký ngay!</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Đăng ký -->
        <div class="signup modal" id="signupModal">
            <div class="modal-content animationtop">
                <div class="modal-header">
                    <span onclick="document.getElementById('signupModal').style.display='none'">X</span>
                    <h1>Đăng ký</h1>
                </div>
                <div class="modal-container clearfix">
                    <form action="./signup/insertClient" class="form form-signup" method="POST">
                        <div>
                            <input type="email" class="ipt text-email" placeholder="Email" required value="" name="email">
                            <span class="err-mess">*Trường Email là bắt buộc!</span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Mật khẩu" required value="" name="password">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Nhập lại mật khẩu" required value="" name="repassword">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                        </div>
                        <input class="ipt text-submit" type="submit" value="Đăng Ký" name="signup">
                    </form>
                    <div class="link-login">
                        Tài khoản đã sẵn sàng?
                        <a onclick="changeLogIn()">Đăng nhập ngay!</a>
                    </div>

                    
                </div>
            </div>
        </div>