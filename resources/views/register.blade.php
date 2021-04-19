@include('header')

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Register</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form class="register-form" action="register" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control" name="name" type="text" required placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="email" required placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn" value="Register"/>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Login End -->

@include('footer')
