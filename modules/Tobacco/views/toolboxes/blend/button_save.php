<!--SUBMIT SAVE BRAND-->
<? if(Authority::can('save', 'module/tobacco/blend')) : ?>
    <div class="divider nobr">
        <a id="tBlendSaveButton" class="button submit">
            <?= lang('module_tobacco_button_submit'); ?>
        </a>
    </div>
<? endif; ?>
<!--SUBMIT SAVE BRAND-->
<script type="text/javascript">
    // Form save action
    ION.setFormSubmit('blendForm', 'tBlendSaveButton', 'module/tobacco/tobaccoBlend/store');
</script>