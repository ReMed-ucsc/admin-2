<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signup</title>


</head>

<body class="text-center">

    <main class="form-signin">
        <form method="post">

            <!-- alert errors -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?= implode("<br>", $errors) ?>
                </div>
            <?php endif; ?>

            <h1 class="h3 mb-3 fw-normal">Create account</h1>

            <div class="form-floating">
                <input name="name" type="name" class="form-control" id="floatingName" placeholder="name">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input name="age" type="number" class="form-control" id="floatingAge" placeholder="Age">
                <label for="floatingAge">Age</label>
            </div>
            <div class="form-floating">
                <input name="address" type="text" class="form-control" id="floatingInput" placeholder="address">
                <label for="floatingAddress">address</label>
            </div>
            <div class="form-floating">
                <input name="contact" type="text" class="form-control" id="floatingInput" placeholder="contact">
                <label for="floatingContact">contact</label>
            </div>


            <div class="checkbox mb-3">
                <label>
                    <input name="terms" type="checkbox" value="1"> Accept terms
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
            <a href="<?= ROOT ?>">Home</a>
            <a href="<?= ROOT ?>/login">Login</a>
        </form>
    </main>



</body>

</html>