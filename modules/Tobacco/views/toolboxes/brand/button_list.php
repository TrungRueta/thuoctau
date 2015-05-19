<!--BRAND BUTTON-->
<div class="divider">
    <a id="tBrandBtn" class="button light">
        <?= lang('module_tobacco_brand_list'); ?>
    </a>
</div>
<!--BRAND BUTTON-->


<script type="text/javascript">
    /**
     * Create new brand button
     */
    $('tBrandBtn').addEvent('click', function (e) {
        e.stop();

        ION.contentUpdate({
            'element' : $(ION.mainpanel),
            'loadMethod' : 'xhr',
            'url' : admin_url + 'module/tobacco/tobaccoBrand/index',
            'title' : Lang.get('module_tobacco_brand_title')
        });
    });
</script>