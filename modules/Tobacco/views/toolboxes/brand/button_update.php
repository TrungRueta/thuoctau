<!--SUBMIT SAVE BRAND-->
<? if(Authority::can('save', 'module/tobacco/brand')) : ?>
    <div class="divider nobr">
        <a id="tBrandEditButton" class="button submit">
            <?= lang('module_tobacco_button_submit'); ?>
        </a>
    </div>
<? endif; ?>
<!--SUBMIT SAVE BRAND-->
<script type="text/javascript">
    // Form save action
    ION.setFormSubmit('brandForm', 'tBrandEditButton', 'module/tobacco/tobaccoBrand/update');
</script>