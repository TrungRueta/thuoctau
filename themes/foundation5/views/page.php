<ion:partial view="header" />

	<ion:partial view="page_header" />

	<!--
		Articles : No type
	-->



	<div class="row">

        <ion:tobacco>
            <ul>
                <ion:brands>
                    <ion:brand>
                        <ion:blends>
                            <ion:blend>
                                <ion:trace/>
                            </ion:blend>
                        </ion:blends>
                    </ion:brand>
                </ion:brands>
            </ul>
        </ion:tobacco>

		<!--
			Articles : type 'bloc'
			authorization : not set : Apply filtering
							all : displays all articles (includes all deny_codes)
							401 : display only 401 articles
							403 : display only 403 articles
							404 : display only 404 articles
			usage :
			authorization="all" : 			All articles, with or without authorizations
			authorization="all,401,403" : 	Only free access articles + 401 + 403
			authorization="401,403" : 		Only 401 + 403
			authorization="401" : 			Only 401

		-->


	</div>


<ion:partial view="footer" />
