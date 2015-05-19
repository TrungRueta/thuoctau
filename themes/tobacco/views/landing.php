<ion:partial view="header"/>

<div id="landing" class="parallax-container" data-jkit="[parallax:strength=-2;axis=y;detect=scroll]">
    <img data-jkit="[background:distort=no]" id="bg1" src="/themes/tobacco/assets/images/background_pipe.jpg" width="1440" height="900">

    <!--<img data-jkit="[background:distort=no]" id="bg2" src= width="1440" height="900">-->

    <div class="absolute-table-center text-center parallax" style="position: absolute; width: 100%; height: 100%; top:0">
        <div class="table-cell">

            <div class="">
                <img src="/themes/tobacco/assets/images/pipetobacco-logo.png" alt="<ion:site_title/>" class="" id="logo-landing"/>

                <h1 class="text-slim text-white mbh2 pan text-uppercase headtitle text-smooth-antialiased">
                    Find Quantity tobacoo guides <br/>
                    for all your Habit
                </h1>

                <div class="pth5 pbh5"></div>

            </div>

        </div>
    </div>

</div>

<div id="scrolldown">
    <a href="#second-link" data-jkit="[scroll:speed=500;easing=linear]" class="btn text-semi text-bold text-white text-uppercase">Scroll Down</a>
</div>

<!--SECOND link-->
<div id="second-link" class="bg-white">

    <div class="section text-center pth">
        <div class="container pbh5 pth2">
            <h1 class="text-smooth-antialiased text-bold">OUR STORY</h1>
            <h4 class="ptn mtn text-smooth-antialiased text-muted mbn pbn">We’re branding & digital studio from New York</h4>

            <div class="fake-hr pth2 pbh2"></div>

            <div class="ptl pbl">
                <a href="javascript:" class="btn lessRounded btn-lg btn-clear btn-success">About Us</a>
                <a href="javascript:" class="btn lessRounded btn-lg btn-clear btn-success">See Guilds</a>
                <a href="javascript:" class="btn lessRounded btn-lg btn-clear btn-success">Buy Tobacco</a>
            </div>

            <div class="row text-muted">
                <div class="col-sm-8 col-sm-offset-2 text-slim">
                    <span data-jkit="[lorem:length=250]"></span>
                </div>
            </div>
        </div>
    </div>

    <div id="hot-topic" class="section bg-white pth clearfix">
        <?php for($i=0; $i<6; $i++): ?>
        <div class="hot-topic-unit">
            <a href="javascript:">
                <img src="/themes/tobacco/assets/images/projects-1.jpg" alt=""/>
                <div class="hot-topic-hidden plh prh">
                    <div>
                        <h4 class="text-normal-smooth text-black" data-jkit="[lorem:length=30]"></h4>
                    </div>
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>

    <div class="suggest-connect-social">
        <div>
            <div>
                <div>
                    <div class="row text-smooth-antialiased">
                        <div class="col-sm-7 text-right">
                            <h1 class="text-white mbn pbn">Like Our Work ?</h1>
                            <span class="text-smoke">WE ARE ALWAYS OPEN TO INTERESTING PROJECTS</span>
                        </div>
                        <div class="col-sm-5 text-left pth2">
                            <a href="javascript:" class="btn btn-warning btn-lg btn-lessRounded plh5 prh5 ptm pbm">Join us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="about-pipe" class="container text-smooth-antialiased pth3 pbh3">

        <div class="text-center">
            <h1 class="text-normal-smooth">What is Pipe & Tobacco ?</h1>
            <h4 class="pan man text-slim">
                <span data-jkit="[lorem:length=400]"></span>
            </h4>
        </div>
        
        <div class="fake-hr mth5 mbh5"></div>


        <div class="row">
            <div class="col-sm-5 col-sm-offset-2 text-right ptm">
                <h3 class="">What is Pipe</h3>
                <p>
                    <span data-jkit="[lorem:length=400]"></span>
                </p>
            </div>
            <div class="col-sm-5">
                <img src="/themes/tobacco/assets/images/abstract.jpg" alt="" class="img-responsive"/>
            </div>
        </div>

        <div class="pth4 pbh4"></div>

        <div class="row">
            <div class="col-sm-5 text-right">
                <img src="/themes/tobacco/assets/images/abstract.jpg" alt="" class="img-responsive"/>
            </div>
            <div class="col-sm-5">
                <h3 class="">What is Pipe</h3>
                <p>
                    <span data-jkit="[lorem:length=200]"></span>
                </p>
            </div>
        </div>

    </div>


</div>


<ion:partial view="footer"/>
