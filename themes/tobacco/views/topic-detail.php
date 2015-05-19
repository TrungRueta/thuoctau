<ion:partial view="header"/>

<div id="list-detail" class="clearfix bg-white">

    <div id="topic">
        <ion:article>

            <div>
                <div style="height: 600px; overflow:hidden;" data-jkit="[parallax:strength=-4;axis=y;detect=scroll;scope=local]" class="parallax-container">
                    <ion:medias:media type="picture" limit="1">

                        <div class="parallax" style="background:url('<ion:src/>') no-repeat center center; background-size: cover; height: 600px; width: 100%;">

                        </div>
                    </ion:medias:media>
                </div>

                <div style="width: 100%; height:600px; display: table; z-index: 1; position: absolute; top:0; left:0; background-color: rgba(0,0,0,0.5)">
                    <div style="display: table-cell; vertical-align: middle;" class="text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <h1 class="text-smooth-antialiased text-white text-uppercase mbh3"><ion:title/></h1>
                                    <h4 class="text-white text-slim text-smooth-antialiased">
                                        <span data-jkit="[lorem:length=250]"></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pth pbh5">
                <div class="container-small">
                    <div class="pll prl">
                        <ion:content/>
                    </div>
                </div>
            </div>

            <div class="container-small">
                <!--share bar-->
                <div class="pll prl">

                    <ul class="list-inline clearfix">
                        <li class="pull-left mrm">
                            <div class="fb-share-button" data-href="http://local.thuoctau.com" data-layout="button_count"></div>
                        </li>
                        <li class="pull-left" style="padding-top:2px;">
                            <a class="twitter-share-button"
                               href="https://twitter.com/share">
                                Tweet
                            </a>
                            <script>
                                window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
                            </script>
                        </li>
                    </ul>
                </div>
                <hr/>

                <!--facbook comment-->
                <div>
                    <div class="fb-comments" data-href="http://ocal.thuoctau.com" data-width="100%" data-numposts="20" data-colorscheme="light"></div>
                </div>

            </div>

        </ion:article>
    </div>

</div>

<ion:partial view="footer"/>