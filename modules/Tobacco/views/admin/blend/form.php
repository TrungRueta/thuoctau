<form id="blendForm" name="blendForm" action="<?= $formUrl ?>">

    <?php if (isset($blend)): ?>
    <input type="hidden" name="blend[id]" value="<?= $blend->id ?>"/>
    <?php endif; ?>

    <!-- JS storing element -->
    <input type="hidden" id="memory" />

    <div id="maincolumn">
        <fieldset class="article-header">
            <!--NAME-->
            <h2 class="main article" id="main-title"><?= isset($blend) ? $blend->name : '' ?></h2>
            <!--DESCRIPTION-->
            <div class="main subtitle">
                <p>
                    <span class="lite">ID : </span>
                    <?= isset($blend) ? $blend->id : '' ?>
                </p>
            </div>
        </fieldset>

        <fieldset id="blocks" class="mt10">
            <!--Tabs-->
            <div id="blendTab" class="mainTabs">
                <ul class="tab-menu">
                    <li class="blendTab_unit"><a>blend Content</a></li>
                    <!-- Media Tab : id is important for media items number on tab -->
                    <?php if (isset($blend)): ?>
                        <li id="mediaTab" class="right<?php if( empty($blend->id)) :?> inactive<?php endif ;?>"><a><?php echo lang('ionize_label_medias'); ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="clear"></div>
            </div>

            <div id="blendTabContent">

                <!--blend content-->
                <div class="tabcontent">
                    <!-- name -->
                    <dl class="first">
                        <dt><label for="blend[name]">Name</label></dt>
                        <dd>
                            <input id="blend[name]" name="blend[name]" class="inputtext name autogrow" type="text" value="<?= isset($blend) ? $blend->name : '' ?>" />
                        </dd>
                    </dl>
                    <!--description-->
                    <dl class="secondary">
                        <dt><label for="blend[description]">Description</label></dt>
                        <dd>
                            <textarea id="blend[description]" name="blend[description]" class="textarea description autogrow" type="text"><?= isset($blend) ? $blend->description : '' ?></textarea>
                        </dd>
                    </dl>
                    <dl class="secondary">
                        <dt><label for="brand[id]">Brand</label></dt>
                        <dd>
                            <select name="brand[id]" id="brand[id]" class="select">
                                <option value="">Select brand</option>
                                <?php if (isset($brands)): ?>
                                    <?php foreach($brands as $brand): ?>
                                        <option value="<?= $brand->id ?>" <?= isset($blend) && $brand->id == $blend->brand->id ? 'selected="selected"' : '' ?> ><?= $brand->name ?></option>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </select>
                        </dd>
                    </dl>
                </div>
                <!--blend content-->

                <!--media content-->
                <?php if (isset($blend)): ?>
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
    <?php if (isset($blend)): ?>
    ION.initToolbox('blend_edit_toolbox', undefined, undefined);
    <?php else: ?>
    ION.initToolbox('blend_create_toolbox', undefined, undefined);
    <?php endif; ?>

    // Tabs
    var articleTab = new TabSwapper({
        tabsContainer: 'blendTab',
        sectionsContainer: 'blendTabContent',
        selectedClass: 'selected',
        deselectedClass: '',
        tabs: 'li',
        clickers: 'li a',
        sections: 'div.tabcontent',
        cookieName: 'blendTab'
    });

    <?php if(isset($blend)): ?>
    // Media Manager & tabs events
    mediaManager.initParent('blends', '<?= $blend->id ?>');

    mediaManager.loadMediaList();

    $('addMedia').addEvent('click', function(e) {
        e.stop();
        mediaManager.initParent('blends', '<?= $blend->id ?>');
        mediaManager.toggleFileManager();
    });
    <?php endif; ?>

    // Extend Fields
    extendManager.init({
        parent: 'blends',
        id_parent: '<?= $blend->id ?>',
        destination: 'blendTab',
        destinationTitle: Lang.get('ionize_title_extend_fields')
    });
    extendManager.getParentInstances();

</script>