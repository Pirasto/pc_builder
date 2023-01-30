<!doctype html>
<html lang="en">

<head>
    <title>Privacy Policy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #fff;">
    <!-- start every .php file with this -->
    <?php
    session_start();

    ?>

    <!-- Header -->
    <?php
    include("php/generators/header.php");
    headerPrint();

    ?>

    <!-- Navigation -->
    <?php
    include("php/generators/navigation.php");
    navPrint();

    ?>

    <!-- PAGE CODE GOES UNDER HERE -->
    <div class="container-fluid">
        <div class="container my-5">
            <h4>1. Introduction</h4>
            <p>This privacy policy sets out how Website Name (“We”, “Us”, “Our”) uses and protects any information that
                you give Us when you use this website, WebsiteURL.
                We are committed to ensuring that your privacy is protected. Should We ask you to provide certain
                information by which you can be identified when using this website,
                then you can be assured that it will only be used in accordance with this privacy statement.</p>

            <h4>2. What We collect</h4>
            <p>We may collect the following information:</p>
            <p><i class="bi bi-dot"></i>name and job title</p>
            <p><i class="bi bi-dot"></i>contact information including email address</p>
            <p><i class="bi bi-dot"></i>demographic information such as postcode, preferences and interests</p>
            <p><i class="bi bi-dot"></i>other information relevant to customer surveys and/or offers</p>

            <h4>3. What We do with the information We gather</h4>
            <p>We require this information to understand your needs and provide you with a better service, and in
                particular for the following reasons:</p>
            <p><i class="bi bi-dot"></i>Internal record keeping.</p>
            <p><i class="bi bi-dot"></i>We may use the information to improve our products and services.</p>
            <p><i class="bi bi-dot"></i>We may periodically send promotional emails about new products, special offers
                or other information which we think you may find interesting using the email address which you have
                provided.</p>

            <h4>4. Security</h4>
            <p>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or
                disclosure, We have put in place suitable physical,
                electronic and managerial procedures to safeguard and secure the information We collect online.</p>

            <h4>5. How We use cookies</h4>
            <p><i class="bi bi-dot"></i>A cookie is a small file which asks permission to be placed on your computer's
                hard drive. Once you agree, the file is added and the cookie helps analyze web traffic or lets you know
                when you visit a particular site.
                Cookies allow web applications to respond to you as an individual. The web application can tailor its
                operations to your needs, likes and dislikes by gathering and remembering information about your
                preferences.</p>

            <p><i class="bi bi-dot"></i>We use traffic log cookies to identify which pages are being used. This helps Us
                analyze data about webpage traffic and improve our website in order to tailor it to customer needs. We
                only use this
                information for statistical analysis purposes and then the data is removed from the system.</p>

            <p><i class="bi bi-dot"></i>Overall, cookies help Us provide you with a better website, by enabling Us to
                monitor which pages you find useful and which you do not. A cookie in no way gives Us access to your
                computer or any information about you,
                other than the data you choose to share with Us.</p>

            <p><i class="bi bi-dot"></i>You can choose to accept or decline cookies. Most web browsers automatically
                accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This
                may prevent you from taking full
                advantage of the website.
            </p>

            <h4>6. Links to other websites</h4>
            <p>Our website may contain links to other websites of interest. However, once you have used these links to
                leave our site, you should note that we do not have any control over that other website.
                Therefore, we cannot be responsible for the protection and privacy of any information which you provide
                whilst visiting such sites and such sites are not governed by this privacy statement.
                You should exercise caution and look at the privacy statement applicable to the website in question.</p>

            <h4>7. Controlling your personal information</h4>
            <p>You may choose to restrict the collection or use of your personal information in the following ways:</p>

            <p><i class="bi bi-dot"></i>whenever you are asked to fill in a form on the website, look for the box that
                you can click to indicate that you do not want the information to be used by anybody for direct
                marketing purposes</p>
            <p><i class="bi bi-dot"></i>if you have previously agreed to Us using your personal information for direct
                marketing purposes, you may change your mind at any time by writing to or emailing Us at Email Address
            </p>

            <h4>8. Your rights</h4>
            <p>Under the General Data Protection Regulation (GDPR), you have certain rights with regard to your personal
                information. These include the right to:</p>
            <p><i class="bi bi-dot"></i>your personal information</p>
            <p><i class="bi bi-dot"></i>any inaccuracies in your personal information corrected</p>
            <p><i class="bi bi-dot"></i>have your personal information erased</p>
            <p><i class="bi bi-dot"></i>to the processing of your personal information</p>
            <p><i class="bi bi-dot"></i>a copy of your personal information in a commonly used electronic format</p>
            <p>If you would like to exercise any of these rights, please contact us at Email Address.</p>

            <h4>9. Changes to this policy</h4>
            <p>We reserve the right to make changes to this privacy policy at any time. Any changes we may make to our privacy policy in the future will be posted on this page and, where appropriate, notified to you by email.</p>

            <h4>10. Contact</h4>
            <p>If you have any questions or concerns about this privacy policy, please contact us at Email Address.</p>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include("php/generators/footer.php");
    footerPrint();
    ?>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>