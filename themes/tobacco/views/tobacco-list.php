<ion:partial view="header"/>

<?php
    $brands = \App\Brand\Brand::with('blends')->get();
?>


<div class="pth5 pbx"></div>

<div id="list" class="clearfix bg-meat">

    <div id="sidebar">

        <div class="pam">
            <span data-jkit="[lorem:length=100]"></span>
        </div>

        <hr/>

    </div>

    <div id="sidemain">
        <div class="bg-white border border-right border-solid border-muted">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-sm-11 col-sm-offset-1 col-xs-12">

                    <div class="pbh text-semi">
                        <ion:page:articles>
                            <ion:article>
                                <div class="mbh">
                                    <ion:medias:media type="picture" size="700,200" method="adaptive">
                                        <img src="<ion:src/>" alt="" class="img-responsive"/>
                                    </ion:medias:media>
                                </div>

                                <h4><ion:title/></h4>

                                <ion:content/>
                            </ion:article>
                        </ion:page:articles>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">


                            <div class="method">
                                <div class="row margin-0 list-header hidden-sm hidden-xs">
                                    <div class="col-md-5"><div class="header text-truncate">Brand Name</div></div>
                                    <div class="col-md-2"><div class="header text-truncate">Total</div></div>
                                    <div class="col-md-5"><div class="header text-truncate">Description</div></div>
                                </div>

                                <?php foreach ($brands as $brand): ?>

                                <div class="row margin-0">
                                    <div class="col-md-5">
                                        <div class="cell">
                                            <div class="propertyname">
                                                <a href="<?= '<ion:page:url id="brand-information" />?brand=' . $brand->id ?>"><?= $brand->name ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="cell">
                                            <div class="type">
                                                <code><?= $brand->blends->count() ?> blends</code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="cell">
                                            <div class="isrequired">
                                                <?= $brand->description ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>

                            </div>





                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<ion:partial view="footer"/>