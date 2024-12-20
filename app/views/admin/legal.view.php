<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $privacy_policy = $_POST['privacy_policy'] ?? '';
    $terms_conditions = $_POST['terms_conditions'] ?? '';

    // Here you'd save these to the database or a file.
    // Assuming you have a database or file structure to store these, use an update query here.
    echo "Legal documents have been updated.";
}

require_once BASE_PATH.'/app/views/inc/header.view.php';
require_once BASE_PATH.'/app/views/inc/navBar.view.php';
?>



<body>
<h2 class="page-title">Legal & Compliance</h2>

<div class="details-container">
    <form action="" method="POST">
        <div class="Form">
            <label for="privacy_policy">Privacy Policy</label>
            <textarea id="privacy_policy" name="privacy_policy" rows="4" placeholder="Edit and update website's privacy policy" required></textarea>
        </div>

        <div>
            <button class="btn-green" type="submit" class="btn save">Save changes</button>
        </div>

        <div class="Form">
            <label for="terms_conditions">Terms and Conditions</label>
            <textarea id="terms_conditions" name="terms_conditions" rows="4" placeholder="Manage the terms and conditions" required></textarea>
        </div>

        <div>
            <button class="btn-green" type="submit" class="btn save">Save changes</button>
        </div>
    </form>
</div>

<?php require_once BASE_PATH.'/app/views/inc/footer.view.php'; ?>
