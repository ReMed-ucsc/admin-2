<?php
require_once BASE_PATH . '/app/views/inc/header.view.php';
require_once BASE_PATH . '/app/views/inc/navBar.view.php';
?>

<body>
    <h2 class="page-title">Remove Pharmacy on system</h2>

    <div class="details-container">
        
        <form class="form-container" action="<?= ROOT ?>/admin/removePharmacy/delete/<?= isset($pharmacy->PharmacyID) ? $pharmacy->PharmacyID : '' ?>" method="POST">
            <div class="Form">
                <div>
                    <label for="pharmacyName">Pharmacy Name:</label>
                    <input class="Input" type="text" id="pharmacyName" name="pharmacyName" value="<?= htmlspecialchars($pharmacy->pharmacyName) ?>" readonly>
                </div>

                <div>
                    <label for="pharmacistName">Pharmacist's Name:</label>
                    <input class="Input" type="text" id="pharmacistName" name="pharmacistName" value="<?= htmlspecialchars($pharmacy->pharmacistName) ?>" readonly>
                </div>

                <div>
                    <label for="licenseNumber">License Number:</label>
                    <input class="Input" type="text" id="licenseNumber" name="licenseNumber" value="<?= htmlspecialchars($pharmacy->license) ?>" readonly>
                </div>
            </div>

            <div class="Form">
                <label for="reason">Reason for deleting pharmacy in system:</label>
                <select id="reason" name="reason" required>
                    <option value="">Choose the reason</option>
                    <option value="Bad feedback from 10 users">Bad feedback from 10 users</option>
                    <option value="Pharmacist’s request">Pharmacist’s request</option>
                    <option value="Already pharmacy deleted their account">Already pharmacy deleted their account</option>
                </select>
            </div>

            <div>
                <a href="<?= ROOT ?>/admin/editPharmacy/<?= htmlspecialchars($pharmacy->PharmacyID) ?>">Edit</a>
                <a href="<?= ROOT ?>/admin/removePharmacy/delete/<?= htmlspecialchars($pharmacy->PharmacyID) ?>" onclick="return confirm('Are you sure you want to delete this pharmacy?')" class="delete-link">Delete</a>
            </div>
        </form>
    </div>

    <?php require_once BASE_PATH . '/app/views/inc/footer.view.php'; ?>
</body>