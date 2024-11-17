<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Cở sở vật chất</title>
    
    <style>
    .pop:hover {
        border-top-color: palevioletred !important;
        transform: scale(1.03);
        transition: all 0s;
    }
    </style>

</head>

<body class="bg-light">
    <?php require('inc/header.php')?>

    <div class="my-5 px-4">
        <h2 class="merienda-header text-center "> Cơ sở vật chất của khách sạn </h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Khách sạn chúng tự hào sở hữu hệ thống cơ sở vật chất đáp ứng mọi nhu cầu của khách hàng.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php
                $res=selectAll('facilities');
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                echo<<<data
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="$path$row[icon]" width="40px">
                            <h5 class="m-0 ms-3">
                                $row[name]
                            </h5>
                        </div>
                        <p>$row[description]
                        </p>
                    </div>
                </div>
                data;
                }
          ?>
        </div>
    </div>


    <?php require('inc/footer.php')?>

</body>

</html>