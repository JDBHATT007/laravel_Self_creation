@include('header')

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Login</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <form class="login-form" action="login" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" required placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <input class="btn" value="Login" type="submit"/>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@include('footer')
