<!--BRAND BUTTON-->
<div class="divider">
    <a id="tBlendBtn" class="button light">
        <?= lang('module_tobacco_blend_list'); ?>
    </a>
</div>
<!--BRAND BUTTON-->


<script type="text/javascript">
    /**
     * Create new brand button
     */
    $('tBlendBtn').addEvent('click', function (e) {
        e.stop();

        ION.contentUpdate({
            'element' : $(ION.mainpanel),
            'loadMethod' : 'xhr',
            'url' : admin_url + 'module/tobacco/tobaccoBlend/index',
            'title' : Lang.get('module_tobacco_blend_title')
        });
    });
</script>