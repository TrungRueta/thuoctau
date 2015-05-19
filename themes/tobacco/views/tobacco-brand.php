<ion:partial view="header"/>

<?php

$params = $_REQUEST;
$brand = null;
if (isset($params['brand'])) {
    $brandId = $params['brand'];
    $brand = \App\Brand\Brand::with('blends', 'blends.ExtendFields', 'blends.ExtendFields.field', 'blends.ExtendFields.language')->find($brandId);
    //dd($brand);
}

?>

<div class="pth5 pbx"></div>

<div id="tobacco" class="clearfix bg-meat">

    <a class="btn-back-tobacco-list btn btn-sm btn-default" href="<?= '<ion:page:url id="world-tobacco"/>' ?>">
        <i class="fa fa-arrow-left"></i> Trở lại
    </a>

    <div class="tobacco-side">

        <div class="ptn pll prl pbl">
            <!--brand information-->
            <h2 class="text-smooth-antialiased text-em-double-half mbn"><?= $brand->name ?></h2>
            <!--description blends count-->
            <p class="text-muted">
                <?= $brand->blends->count() ?> blends
            </p>

            <!--description-->
            <div class="text-semi">
                <?= $brand->description ?>
            </div>


        </div>

    </div>

    <div class="tobacco-main">
        <div>

            <div class="tobacco-main-inner plh prh" style="max-width: 700px;">
                <?php foreach ($brand->blends as $blend): ?>
                    <div class="topic-unit pth">
                        <a href="" class="text-black text-no-decoration">
                            <img src="/themes/tobacco/assets/images/demotopiclist.jpeg" alt="" class="img-responsive"/>
                        </a>

                        <a href="" class="text-black text-no-decoration">
                            <h3 class="text-black text-smooth-antialiased mbn">
                                <?= $blend->name ?>
                            </h3>
                        </a>
                        <h5 class="text-slim mtn">
                            <?= $blend->description ?>
                        </h5>

                        <div>
                            <ul class="list-inline">
                                <?php foreach ($blend->ExtendFields as $extend): ?>
                                <li>
                                    <span class="badge text-smooth-antialiased" style="background-color: #F1F3FA; color: #5F95C1">
                                        <i class="text-slim"><?= $extend->language->label ?></i> <strong><?= $extend->content ?></strong>
                                    </span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!--<a href="" class="text-success text-normal-smooth text-bold text-no-decoration">See blend</a>-->
                        <!--<span class=" text-muted text-semi">| At time here</span>-->
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

</div>

<ion:partial view="footer"/>