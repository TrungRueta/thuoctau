<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/30/15
 * Time: 3:50 AM
 */
?>
<!-- Pages -->
<ul class="pagination mt5" id="brands_pagination">
    <?php for($i=1; $i<=$brandPages; $i++): ?>
        <li><a <?php if($i == $page) :?>class="current"<?php endif; ?> data-page-number="<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php endfor ?>
</ul>

<table class="list" id="brandTable">
    <thead>
    <tr>
        <th style="width:50px;"></th>
        <th axis="string"><?= lang('module_tobacco_brand_title'); ?></th>
        <th axis="string"><?= lang('ionize_label_description'); ?></th>
        <th axis="string" class="center" style="width:100px;"><?= lang('module_tobacco_blend_count'); ?></th>
        <th class="right" style="width:70px;"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($brands as $brand): ?>
        <tr>
            <td class="left">
                <a href="javascript:" class="icon center edit brandTitle" data-id="<?= $brand->id; ?>"></a>
            </td>
            <td>
                <a class="brandTitle" href="<?= 'javascript:' ?>" data-id="<?= $brand->id ?>"><?= $brand->name ?></a>
            </td>
            <td>
                <?= $brand->description ?>
            </td>
            <td class="center">
                <?= $brand->blends->count() ?>
            </td>
            <td class="pr10">
                <a class="icon right delete" data-id="<?= $brand->id; ?>"></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">

    // configuration
    var confirmDeleteMessage = Lang.get('ionize_confirm_element_delete');
    var url = admin_url + 'module/tobacco/tobaccoBrand/destroy/';

    // Sortable
    new SortableTable('brandTable',{sortOn: 0, sortBy: 'ASC'});

    // delete
    $$('#brandTable .delete').each(function(item)
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
    $$('#brands_pagination li a').each(function(item)
    {
        item.addEvent('click', function(e)
        {
            e.stop();

            new Request.HTML({
                url: ION.adminUrl + 'module/tobacco/tobaccoBrand/get_list/' + this.getProperty('data-page-number'),
                method: 'post',
                loadMethod: 'xhr',
                data: $('brandFilter'),
                update: $('brandList')
            }).send();
        });
    });

    // edit ink
    $$('#brandTable .brandTitle').each(function(item)
    {

        var brand_id = (item.getProperty('data-id'));
        var title = item.get('text');

        item.addEvent('click', function(e)
        {
            e.stop();
            ION.splitPanel({
                'urlMain': ION.adminUrl + 'module/tobacco/tobaccoBrand/edit/' + brand_id,
                'urlOptions': ION.adminUrl + 'module/tobacco/tobaccoBrand/options/' + brand_id,
                'title': Lang.get('module_tobacco_brand_edit') + ' : ' + title
            });
        });

    });

</script>