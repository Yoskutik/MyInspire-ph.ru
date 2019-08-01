<?php require_once '../../HTML.php' ?>

<!DOCTYPE>
<html lang="en">
<head>
    <title>MyInspire. St. Petersburg photographer. Contacts.</title>
    <meta name="description" content="
        Atmospheric photos in St. Petersburg from a professional photographer.
        Express photo shoot from 30€. Love story, photo walk, Studio photo
        shoot and professional retouching of your pictures.">
    <meta name="keywords" content="MyInspire contacts, MyInspire phone, MyInspire email">
    <?php include '../../assets/elements/head.php' ?>
    <link rel="stylesheet" href="/contacts/contacts.css">
    <script src="/contacts/contacts.js"></script>
</head>
<body>
<div class="loader main-loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php include '../../assets/elements/header-en.php'  ?>
<div class="body container">
    <?php include 'contacts.php' ?>
</div>
<?php include '../../assets/elements/footer-en.php' ?>
</body>
</html>