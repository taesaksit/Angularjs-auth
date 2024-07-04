<!DOCTYPE html>
<html lang="en" ng-app="loginregisterApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="loginregister.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container  mt-3">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
            </li>
            <li class="nav-item" role="presentation" ng-controller="registerCtrl">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Register</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">


            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab" tabindex="0" ng-controller="loginCtrl">
                <div class="container mt-3">
                    <div class="card p-3 shadow">
                        <div class="alert alert-danger" ng-if="errorMessage">{{errorMessage}}</div>
                        <div class="alert alert-success" ng-if="successMessage">{{successMessage}}</div>
                        
                        <form ng-submit="loginSubmit()">
                            <h3>Login Page </h3>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" required ng-model="user.username">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" ng-model="user.password" autocomplete="current-password" required>
                            </div>
                            <button type="submit" class="btn btn-success">Login</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Register -->
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab" tabindex="0" ng-controller="registerCtrl">
                <div class="container mt-3">
                    <div class="card p-3 shadow">
                        <div class="alert alert-danger" ng-if="errorMessage">{{errorMessage}}</div>
                        <div class="alert alert-success" ng-if="successMessage">{{successMessage}}</div>
                        <form ng-submit="registerSubmit()">
                            <h3>Register </h3>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" required ng-model="user.username" autocomplete="off">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" ng-model="user.password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>


            </div>

        </div>

    </div>







</body>

</html>