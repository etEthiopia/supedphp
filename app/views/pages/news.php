<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="<?php echo URLROOT;?>/assets/images/company_profile-meta.png">
    <meta property="og:image" content="<?php echo URLROOT;?>/assets/images/company_profile-meta.png">
    <meta name="twitter:title" content="SupEd | Company Profile">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/assets/images/logo-hr-503x344.png" type="image/x-icon">
    <meta name="description" content="">


    <title>SupEd | News</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/theme/css/slider.css">
    <?php require APPROOT . '/views/inc/header.php'; ?>
    
    <section class="content1 cid-skpidrJrPF" id="content1-j">

        
        <div class="container">
            <div class="mbr-section-head">
                <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>News</strong></h4>

            </div>
            <div class="row mt-4">
            <?php foreach ($data as $news) : ?>
                
                <div class="item features-image сol-12 col-md-6 col-lg-6">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <a href="ce_of_suped_was_interviewed_on_ahadu_radio.html" target="_blank"><img
                                    src="<?php echo URLROOT;?>/uploads/news/<?php echo $news->picture; ?>"
                                    alt="<?php echo $news->title; ?>" title=""></a>
                        </div>
                        <div class="item-content">
                            <h5 class="item-title mbr-fonts-style display-7"><strong><?php echo $news->title; ?></strong></h5>
                            <h6 class="item-subtitle mbr-fonts-style mt-1 display-4"><em> <?php echo substr($news->created_at, 0, 10);?></em></h6>
                            <p class="mbr-text mbr-fonts-style mt-3 display-7">
                            <?php if (strlen($news->description) > 147) :?>
                                <?php echo substr($news->description, 0, 146);?>
                                    <a href="<?php echo URLROOT;?>/pages/readnews/<?php echo $news->id ?>" class="text-primary">Read more..</a></p>
                            <?php else:?>
                            <?php echo $news->description;?>
                                    <a href="<?php echo URLROOT;?>/pages/readnews/<?php echo $news->id ?>" class="text-primary">Read more..</a></p>
                            <?php endif?>
                        </div>

                    </div>
                            </div>
                
            <?php endforeach; ?>
                
                


            </div>
        </div>
    </section>

    <?php require APPROOT . '/views/inc/footer.php'; ?>