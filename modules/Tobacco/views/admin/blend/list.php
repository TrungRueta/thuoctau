<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/30/15
 * Time: 3:50 AM
 */

$blends = isset($blends) ? $blends : [];
$blendPages = isset($blendPages) ? $blendPages : 1;
$page = isset($page) ? $page : 1;
?>
<!-- Pages -->
<ul class="pagination mt5" id="blends_pagination">
    <?php for($i=1; $i<=$blendPages; $i++): ?>
        <li><a <?php if($i == $page) :?>class="current"<?php endif; ?> data-page-number="<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php endfor ?>
</ul>

<table class="list" id="blendTable">
    <thead>
    <tr>
        <th style="width:50px;"></th>
        <th axis="string">Brand</th>
        <th axis="string"><?= lang('module_tobacco_blend_title'); ?></th>
        <th axis="string"><?= lang('ionize_label_description'); ?></th>
        <th class="right" style="width:70px;"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($blends as $blend): ?>
        <tr>
            <td class="left">
                <a href="javascript:" class="icon center edit blendTitle" data-id="<?= $blend->id; ?>"></a>
            </td>
            <td>
                <a class="brandTitle" href="javascript:" data-id="<?= $blend->brand->id ?>">
                    <?= $blend->brand->name ?>
                </a>
            </td>
            <td>
                <a class="blendTitle" href="javascript:" data-id="<?= $blend->id ?>"><?= $blend->name ?></a>
            </td>
            <td>
                <?= $blend->description ?>
            </td>
            <td class="pr10">
                <a class="icon right delete" data-id="<?= $blend->id; ?>"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">

    // configuration
    var confirmDeleteMessage = Lang.get('ionize_confirm_element_delete');
    var url = admin_url + 'module/tobacco/tobaccoBlend/destroy/';

    // Sortable
    new SortableTable('blendTable',{sortOn: 0, sortBy: 'ASC'});

    // delete
    $$('#blendTable .delete').each(function(item)
    {
        ION.initRequestEvent(
            item,
            url + item.getProperty('data-id'),
            {},
            {
                'confirm':true,
                'message': confirmDeleteMessage,
                'onSuccess': function()
                {
                    $('btnSubmitFilter').fireEvent('click');
                }
            }
        );
    });

    // Pagination
    $$('#blends_pagination li a').each(function(item)
    {
        item.addEvent('click', function(e)
        {
            e.stop();

            new Request.HTML({
                url: ION.adminUrl + 'module/tobacco/tobaccoBlend/get_list/' + this.getProperty('data-page-number'),
                method: 'post',
                loadMethod: 'xhr',
                data: $('blendFilter'),
                update: $('blendList')
            }).send();
        });
    });

    // edit ink
    $$('#blendTable .blendTitle').each(function(item)
    {

        var blend_id = (item.getProperty('data-id'));
        var title = item.get('text');

        item.addEvent('click', function(e)
        {
            e.stop();
            ION.splitPanel({
                'urlMain': ION.adminUrl + 'module/tobacco/tobaccoBlend/edit/' + blend_id,
                'urlOptions': ION.adminUrl + 'module/tobacco/tobaccoBlend/options/' + blend_id,
                'title': Lang.get('module_tobacco_blend_edit') + ' : ' + title
            });
        });

    });

</script>