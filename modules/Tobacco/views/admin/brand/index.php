<!--DISALLOW-->
<?php if (!Authority::can('create', 'module/tobacco/brand')) : ?>
    <h2 class="main protected">
        <?= lang('ionize_title_resource_protected') ?>
    </h2>
    <p><?= lang("ionize_subtitle_resource_protected"); ?></p>
<?php endif; ?>
<!--DISALLOW-->


<?php if (Authority::can('create', 'module/tobacco/brand')) : ?>
    <div id="maincolumn">

        <h2 class="main articles" id="main-title"><?= lang('module_tobacco_brand_title'); ?></h2>

        <!-- Filter -->
        <div class="form-bloc">
            <form name="brandFilter" id="brandFilter" method="post">

                <label class="over">
                    <?= lang('ionize_label_name') ?>
                    <input alt="<?= lang('ionize_label_name') ?>" type="text" class="inputtext w120" name="name" value=""/>
                </label>

                <label class="over">
                    <?= lang('ionize_label_nb_per_page') ?>
                    <input type="text" class="inputtext w30" name="nb" value="<?= isset($nb) ? $nb : '' ?>"/>
                </label>

                <a id="btnSubmitFilter" class="button green"><?= lang('ionize_button_filter') ?></a>

            </form>
        </div>


        <!-- Brand List -->
        <div id="brandList"></div>

    </div>

    <script type="text/javascript">

        var $filterBtn = $('btnSubmitFilter');

        // Filter
        $filterBtn.addEvent('click', function (e) {
            //ION.HTML('module/tobacco/tobaccoBrand/get_list', $('brandFilter'), {'update': $('brandList')});
            // Update the authors list
            ION.HTML(
                'module/tobacco/tobaccoBrand/get_list',		// URL to the controller
                $('brandFilter'), 								// Data send by POST. Nothing
                {'update':'brandList'}	// JS request options
            );
        });

        $filterBtn.fireEvent('click');

    </script>
<?php endif; ?>



