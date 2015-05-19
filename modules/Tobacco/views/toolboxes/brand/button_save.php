<!--SUBMIT SAVE BRAND-->
<? if(Authority::can('save', 'module/tobacco/brand')) : ?>
    <div class="divider nobr">
        <a id="tBrandSaveButton" class="button submit">
            <?= lang('module_tobacco_button_submit'); ?>
        </a>
    </div>
<? endif; ?>
<!--SUBMIT SAVE BRAND-->
<script type="text/javascript">
    // Form save action
    ION.setFormSubmit('brandForm', 'tBrandSaveButton', 'module/tobacco/tobaccoBrand/store');
</script>