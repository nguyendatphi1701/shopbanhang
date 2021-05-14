@extends('layout')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Điền email để lấy lại mật khẩu</h2>
                    <form action="{{url('/recover-pass')}}" method="POST">
                        @csrf
                        <input type="text" name="email_account" placeholder="Nhập email...." />
                        <button type="submit" class="btn btn-default">Gửi mail</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection