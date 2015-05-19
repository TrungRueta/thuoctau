<!--CREATE BRAND BUTTON-->
<? if(Authority::can('create', 'module/tobacco/create')) : ?>
    <div class="divider">
        <a id="tBlendCreateBtn" class="button light">
            <i class="icon-article add"></i><?= lang('module_tobacco_blend_button_create'); ?>
        </a>
    </div>
<? endif; ?>
<!--CREATE BRAND BUTTON-->

<script type="text/javascript">
    /**
     * Create new blend button
     */
    $('tBlendCreateBtn').addEvent('click', function (e) {
        e.stop();

        ION.contentUpdate({
            'element' : $(ION.mainpanel),
            'loadMethod' : 'xhr',
            'url' : admin_url + 'module/tobacco/tobaccoBlend/create',
            'title' : Lang.get('module_tobacco_blend_title')
        });
    });
</script>