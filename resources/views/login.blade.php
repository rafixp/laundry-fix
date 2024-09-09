<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Laundry</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body class="">
    <div class="card w-25 mx-auto mt-5 border-0 shadow-sm">
        <div class="card-body">
            <h5>Login</h5>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label>Email</label>
                    <input type="text" class="form-control form-sm" name="email" require>
                </div>
                <div class="form-group mt-1">
                    <label>Password</label>
                    <input type="password" class="form-control form-sm" name="password" require>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary float-end">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
