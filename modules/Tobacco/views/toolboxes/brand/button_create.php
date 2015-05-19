<!--CREATE BRAND BUTTON-->
<? if(Authority::can('create', 'module/tobacco/create')) : ?>
    <div class="divider">
        <a id="tBrandCreateBtn" class="button light">
            <i class="icon-article add"></i><?= lang('module_tobacco_brand_button_create'); ?>
        </a>
    </div>
<? endif; ?>
<!--CREATE BRAND BUTTON-->

<script type="text/javascript">
    /**
     * Create new brand button
     */
    $('tBrandCreateBtn').addEvent('click', function (e) {
        e.stop();

        ION.contentUpdate({
            'element' : $(ION.mainpanel),
            'loadMethod' : 'xhr',
            'url' : admin_url + 'module/tobacco/tobaccoBrand/create',
            'title' : Lang.get('module_tobacco_brand_title')
        });
    });
</script>