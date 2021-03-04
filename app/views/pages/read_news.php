<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="assets/images/index-meta.png">
    <meta property="og:image" content="assets/images/index-meta.png">
    <meta name="twitter:title" content="SupEd | Home">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/logo-hr-503x344.png" type="image/x-icon">
    <meta name="description" content="">


    <title><?php echo $data->title; ?></title>
<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="team2 cid-sn6wmeeHS0" xmlns="http://www.w3.org/1999/html" id="team2-2z">
    
    
    <div class="container">
        <div class="card">
            <div class="card-wrapper">
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <div class="image-wrapper">
                            <img src="<?php echo URLROOT;?>/uploads/news/<?php echo $data->picture; ?>" alt="<?php echo $data->title?>">
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="card-box">
                            <h5 class="card-title mbr-fonts-style m-0 display-5"><strong><?php echo $data->title?></strong></h5>
                            <h6 class="mbr-fonts-style mb-3 display-4"><strong><?php echo substr($data->created_at, 0, 10);?></strong></h6> 
                            <p class="mbr-text mbr-fonts-style display-7">
                            <?php echo $data->description?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>