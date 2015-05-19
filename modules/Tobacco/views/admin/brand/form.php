<form id="brandForm" name="brandForm" action="<?= $formUrl ?>">

    <?php if (isset($brand)): ?>
    <input type="hidden" name="brand[id]" value="<?= $brand->id ?>"/>
    <?php endif; ?>

    <!-- JS storing element -->
    <input type="hidden" id="memory" />

    <div id="maincolumn">
        <fieldset class="article-header">
            <!--NAME-->
            <h2 class="main article" id="main-title"><?= isset($brand) ? $brand->name : '' ?></h2>
            <!--DESCRIPTION-->
            <div class="main subtitle">
                <p>
                    <span class="lite">ID : </span>
                    <?= isset($brand) ? $brand->id : '' ?>
                </p>
            </div>
        </fieldset>

        <fieldset id="blocks" class="mt10">
            <!--Tabs-->
            <div id="brandTab" class="mainTabs">
                <ul class="tab-menu">
                    <li class="brandTab_unit"><a>Brand Content</a></li>
                    <!-- Media Tab : id is important for media items number on tab -->
                    <?php if (isset($brand)): ?>
                        <li id="mediaTab" class="right<?php if( empty($brand->id)) :?> inactive<?php endif ;?>"><a><?php echo lang('ionize_label_medias'); ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="clear"></div>
            </div>

            <div id="brandTabContent">

                <!--brand content-->
                <div class="tabcontent">
                    <!-- name -->
                    <dl class="first">
                        <dt><label for="brand[name]">Name</label></dt>
                        <dd>
                            <input id="brand[name]" name="brand[name]" class="inputtext name autogrow" type="text" value="<?= isset($brand) ? $brand->name : '' ?>" />
                        </dd>
                    </dl>
                    <!--description-->
                    <dl class="secondary">
                        <dt><label for="brand[description]">Description</label></dt>
                        <dd>
                            <textarea id="brand[description]" name="brand[description]" class="textarea description autogrow" type="text"><?= isset($brand) ? $brand->description : '' ?></textarea>
                        </dd>
                    </dl>
                </div>
                <!--brand content-->

                <!--media content-->
                <?php if (isset($brand)): ?>
                <div class="tabcontent">

                    <p class="h30">
                        <a id="addMedia" class="fmButton button light right">
                            <i class="icon-pictures"></i><?php echo lang('ionize_label_attach_media'); ?>
                        </a>
                        <a class="left light button" onclick="mediaManager.loadMediaList();return false;">
                            <i class="icon-refresh"></i><?php echo lang('ionize_label_reload_media_list'); ?>
                        </a>
                        <a class="left light button unlink" onclick="mediaManager.detachAllMedia();return false;">
                            <i class="icon-unlink"></i><?php echo lang('ionize_label_detach_all'); ?>
                        </a>
                    </p>

                    <div id="mediaContainer" class="sortable-container"></div>
                </div>
                <?php endif; ?>
                <!--media content-->

            </div>
        </fieldset>
    </div>

</form>

<!-- File Manager Form : Mandatory for the filemanager -->
<form name="fileManagerForm" id="fileManagerForm" action="">
    <input type="hidden" name="hiddenFile" />
</form>

<script type="text/javascript">

    ION.initFormAutoGrow();

    // Toolbox
    <?php if (isset($brand)): ?>
    ION.initToolbox('brand_edit_toolbox', undefined, undefined);
    <?php else: ?>
    ION.initToolbox('brand_create_toolbox', undefined, undefined);
    <?php endif; ?>

    // Tabs
    var articleTab = new TabSwapper({
        tabsContainer: 'brandTab',
        sectionsContainer: 'brandTabContent',
        selectedClass: 'selected',
        deselectedClass: '',
        tabs: 'li',
        clickers: 'li a',
        sections: 'div.tabcontent',
        cookieName: 'brandTab'
    });

    <?php if(isset($brand)): ?>
    // Media Manager & tabs events
    mediaManager.initParent('brands', '<?= $brand->id ?>');

    mediaManager.loadMediaList();

    $('addMedia').addEvent('click', function(e) {
        e.stop();
        mediaManager.initParent('brands', '<?= $brand->id ?>');
        mediaManager.toggleFileManager();
    });
    <?php endif; ?>

</script>