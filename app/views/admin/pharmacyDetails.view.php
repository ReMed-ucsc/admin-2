<?php require_once BASE_PATH . '/app/views/inc/header.view.php' ?>
<?php require_once BASE_PATH . '/app/views/inc/navBar.view.php' ?>

<body>
    <div class="search-container">
        <input type="text" id="searchInput" class="search-box" placeholder="Search here...">
        <img src="<?= ROOT ?>/assets/images/search.png" alt="icon">
    </div>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error_message) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($success_message) ?>
        </div>
    <?php endif; ?>

    <div class="details-container">
        <?php if (is_array($pharmacy) || is_object($pharmacy)): ?>
            <?php if (empty($pharmacy)): ?>
                <p>No pharmacy records found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Pharmacy ID</th>
                            <th>Pharmacy Name</th>
                            <th>Pharmacist Name</th>
                            <th>Contact Number</th>
                            <th>License</th>
                            <th>Approved Date</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pharmacy as $pharmacy_item): ?>
                            <tr>
                                <td><?= htmlspecialchars($pharmacy_item->PharmacyID) ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->name) ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->pharmacistName ?? 'Nimal') ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->contactNo) ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->RegNo) ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->approvedDate ?? '2024-10-14') ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->email ?? 'pharm@gmail.com') ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->address) ?></td>
                                <td><?= htmlspecialchars($pharmacy_item->status ?? 'pending') ?></td>
                                <td>
                                    <a href="<?= ROOT ?>/admin/editPharmacy/<?= htmlspecialchars($pharmacy_item->PharmacyID) ?>">
                                        <img class="action edit" src="../../public/assets/images/pencil.png" alt="Edit" />
                                    </a>
                                    <a href="<?= ROOT ?>/admin/removePharmacy/index/<?= $pharmacy_item->PharmacyID ?>" onclick="return confirm('Are you sure?')">
                                        <img class="action remove" src="../../public/assets/images/bin.png" alt="Delete" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php else: ?>
            <p>Error loading pharmacy data. Please try again later.</p>
        <?php endif; ?>
    </div>

    <script>
        var ROOT = '<?= ROOT ?>';
    </script>

    <script src="<?= ROOT ?>/assets/js/admin/pharmacyDetails.js"></script>

    <?php require_once BASE_PATH . '/app/views/inc/footer.view.php' ?>