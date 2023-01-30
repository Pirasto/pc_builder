<!doctype html>
<html lang="en">

<head>
    <title>Terms and Conditions</title>
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
            <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website,
                Webiste Name accessible at WebsiteURL.</p>

            <h4>2. Acceptation</h4>
            <p> By using our Website, you accepted these terms and conditions in full. If you disagree with these terms and
                conditions or any part of these terms and conditions, you must not use our Website.</p>

            <h4>3. Intellectual Property Rights</h4>
            <p>Unless otherwise stated, we or our licensors own the intellectual property rights in the website and material
                on
                the website. Subject to the license below, all these intellectual property rights are reserved.</p>

            <h4>4. License to use website</h4>
            <p>You may view, download for caching purposes only, and print pages from the website for your own personal use,
                subject to the restrictions set out below and elsewhere in these terms and conditions.</p>

            <h4>5. Acceptable use</h4>
            <p>You must not use our website in any way that causes, or may cause, damage to the website or impairment of the
                availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or
                harmful,
                or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>

            <h4>6. User Generated Content</h4>
            <p>In these website standard terms and conditions, “your user content” shall mean material (including without
                limitation text, images, audio material, video material and audio-visual material) that you submit to this
                website, for whatever purpose.</p>

            <h4>8. Illegal</h4>
            <p>Your user content must not be illegal or unlawful, must not infringe any third party's legal rights, and must
                not be capable of amounting to a criminal offence or give rise to a civil liability, or otherwise be
                contrary to
                the law of any country or territory where it or they are or may be published or received.</p>

            <h4>9. Indemnity</h4>
            <p>You agree to indemnify us, and our directors, officers, employees and agents, from and against any claims,
                actions or suits or proceedings, as well as any losses, liabilities, damages, costs and expenses (including
                reasonable legal fees) arising out of or in any way connected with your use of our website, your user
                content or
                your breach of these website standard terms and conditions.</p>

            <h4>10. Severability</h4>
            <p>If any provision of these website standard terms and conditions is determined by any court or other competent
                authority to be unlawful and/or unenforceable, the other provisions will continue in effect.</p>

            <h4>11. Entire agreement</h4>
            <p>These website standard terms and conditions, together with our privacy policy, constitute the entire
                agreement
                between you and us in relation to your use of this website, and supersede all previous agreements in respect
                of
                your use of this website.</p>

            <h4>12. Our details</h4>
            <p>The full name of the company is University project and it is registered in Poland under registration number
                653435632,
                Our registered office is at Wrocław, ul.Tęczowa 69. You can contact us:</p>

            <p><i class="bi bi-dot"></i>by email, at examplemail@gmail.com</p>
            <p><i class="bi bi-dot"></i>by telephone, on +48732534606</p>
            <h4>13. Dispute Resolution</h4>
            <p>Any disputes arising out of or related to the use of the website will be resolved through binding arbitration
                in
                accordance with the commercial arbitration rules of the American Arbitration Association.</p>
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