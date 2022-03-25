<?php 

    require_once '../api/conn.php';
    session_start();

    if ($_SESSION == NULL) {
        header("location:../index.php");
    }else if ($_SESSION['urole'] == 'user') {
        header("location:../index.php");
    }

    if ($_SESSION != NULL) {
        $sql = "SELECT * FROM users";
        $stmt = $conn->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin |</title>
</head>
<body>
  
    <?php
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-2" href="#"><span class="text-primary">BE</span>am</a>
            <button class="shadow-none navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa-solid fa-bars fs-3"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav  ms-auto">
                    <a class="nav-link m-2 p-1"><i class="fa-solid fa-user p-2"></i><?php echo $row['username'] ?></a>
                    <a class="nav-link m-2 p-1"><i class="fa-solid fa-user p-2"></i><?php echo $row['urole'] ?></a>
                    <a class="nav-link m-2 p-1" id="logout"><i class="fa-solid fa-right-to-bracket p-2"></i>ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </nav>

    <?php 
        endwhile
    ?>
    <!-- script:src -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        $('#logout').on('click', function(){
            $.ajax({
                type: "POST",
                url:"api/auth/logout.php",    
            })
            sweet_success_href("ออกจากระบบ","ออกจากระบบสำเร็จ","index.php")   
        })
    </script>
</body>
</html>