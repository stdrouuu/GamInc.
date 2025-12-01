<?php include('components/head.php'); ?>

<body>
    <div class="container-fluid">

        <?php
            $page = 'auth'; 
            $content = "pages/auth.php"; 

            if(isset($_GET['page'])){
                $page = $_GET['page'];

                switch($page){
                    case "main": 
                        $content = "pages/main.php"; 
                        break;

                    case "product": 
                        $content = "pages/product.php"; 
                        break;

                    case "user": 
                        $content = "pages/user.php"; 
                        break; 

                    case "gameview": 
                        $content = "pages/gameview.php"; 
                        break;

                    case "credits": 
                        $content = "pages/credits.php"; 
                        break;
                    default:
                        $content = "pages/main.php";
                }
            }
        ?>

        <?php
        if ($page != 'user' && $page != 'auth' && $page != 'credits' && $page != 'gameview') {
            include('components/navbar.php');
        }
        ?>

        <section>
            <?php 
                include($content);
            ?>
        </section>

        <?php 
        if ($page != 'auth' && $page != 'user' && $page != 'gameview' && $page != 'credits') {
            include('components/footer.php');
        }
        ?>

    </div>
</body>
</html>