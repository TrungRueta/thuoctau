<!--DISALLOW-->
<?php if (!Authority::can('create', 'module/tobacco/blend')) : ?>
    <h2 class="main protected">
        <?= lang('ionize_title_resource_protected') ?>
    </h2>
    <p><?= lang("ionize_subtitle_resource_protected"); ?></p>
<?php endif; ?>
<!--DISALLOW-->

<?php if (Authority::can('create', 'module/tobacco/blend')) : ?>
    <div id="maincolumn">

        <h2 class="main articles" id="main-title"><?= lang('module_tobacco_blend_title'); ?></h2>

        <!-- Filter -->
        <div class="form-bloc">
            <form name="blendFilter" id="blendFilter" method="post">

                <label class="over">
                    <?= lang('ionize_label_name') ?>
                    <input alt="<?= lang('ionize_label_title') ?>" type="text" class="inputtext w120" name="name" value=""/>
                </label>

                <label class="over">
                    <?= lang('module_tobacco_brand') ?>
                    <input alt="<?= lang('module_tobacco_brand') ?>" type="text" class="inputtext w120" name="brand" value=""/>
                </label>

                <label class="over">
                    <?= lang('ionize_label_nb_per_page') ?>
                    <input type="text" class="inputtext w30" name="nb" value="<?= isset($nb) ? $nb : '' ?>"/>
                </label>

                <a id="btnSubmitFilter" class="button green"><?= lang('ionize_button_filter') ?></a>

            </form>
        </div>


        <!-- Brand List -->
        <div id="blendList"></div>

    </div>

    <script type="text/javascript">

        var $filterBtn = $('btnSubmitFilter');

        // Filter
        $filterBtn.addEvent('click', function (e) {
            //ION.HTML('module/tobacco/tobaccoBlend/get_list', $('blendFilter'), {'update': $('blendList')});
            // Update the authors list
            ION.HTML(
                'module/tobacco/tobaccoBlend/get_list',		// URL to the controller
                $('blendFilter'), 							// Data send by POST. Nothing
                {'update':'blendList'}	// JS request options
            );
        });

        $filterBtn.fireEvent('click');

    </script>
<?php endif; ?>



