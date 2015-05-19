<?php
use App\Blend\Blend;
use App\Brand\Brand;
use App\ExtendField\ExtendFields;
use App\Media\Media;
use Illuminate\Support\Collection;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 5/1/15
 * Time: 12:16 PM
 */
class Tobacco_Tags extends TagManager
{

    /**
     * Tags declaration
     * To be available, each tag must be declared in this static array.
     *
     * @var array
     *
     */
    public static $tag_definitions = [
        // <ion:demo:authors /> calls the method “tag_authors”
        "tobacco:brands" => "tag_brands",
        "tobacco:brands:brand" => "tag_brand",

        "tobacco:brand:blends" => "tag_blends",
        "tobacco:brand:blends:blend" => "tag_blend",

        "blend:extends" => "tag_extends",
        "blend:extends:_extend" => "tag__extend",

        // count tag
        "blends:count" => "tag_tobacco_count",
        "brands:count" => "tag_tobacco_count",
    ];


    /**
     * Base module tag
     * The index function of this class refers to the <ion:#module_name /> tag
     * In other words, this function makes the <ion:#module_name /> tag
     * available as main module parent tag for all other tags defined
     * in this class.
     *
     * @usage  <ion:demo >
     *      ...
     *    </ion:demo>
     * @param FTL_Binding $tag
     * @return string|void
     */
    public static function index(FTL_Binding $tag)
    {
        $str = $tag->expand();
        return $str;
    }

    /**
     * Loops through authors
     *
     * @param FTL_Binding $tag
     * @return string
     *
     * @usage  <ion:demo:authors >
     *        ...
     *    </ion:demo:authors>
     *
     */
    public static function tag_brands(FTL_Binding $tag)
    {
        // return string
        $str = '';

        // brands data
        $brands = Brand::with('blends')->get();

        // get json collection for easy working
        $php = $tag->getAttribute('php');
        if (!is_null($php) && $php == true) {
            return base64_encode($brands);
        }

        $brands = $brands->toArray();

        $tag->set('count', count($brands));

        foreach ($brands as $brand) {
            // Set the local tag var "author"
            $tag->set('brand', $brand);
            // Tag expand : Process of the children tags
            $str .= $tag->expand();
        }

        return $str;
    }

    /**
     * Author tag
     *
     * @param    FTL_Binding    Tag object
     * @return    String      Tag attribute or ''
     *
     * @usage    <ion:demo:authors>
     *        <ion:author field="name" />
     *       </ion:demo:authors>
     *
     */
    public static function tag_brand(FTL_Binding $tag)
    {
        // Returns the field value or NULL if the attribute is not set
        $field = $tag->getAttribute('field');

        if (!is_null($field)) {
            $brand = $tag->get('brand');
            if (!empty($brand[$field])) ;
            return self::output_value($tag, $brand[$field]);
        }
        // Here we have the choice :
        // - Ether return nothing if the field attribute isn't set or doesn't exist
        // - Ether silently return ''
        /*return self::show_tag_error(
            $tag,
            'The attribute <b>"field"</b> is not set'
        );*/

        return $tag->expand();
    }

    public static function tag_blends(FTL_Binding $tag)
    {
        $str = '';

        $brand = $tag->get('brand');
        if (is_null($brand)) {
            $blends = Blend::with('brand')->get()->toArray();
        } else {
            $blends = empty($brand['blends']) || count($brand['blends']) == 0 ? null : $brand['blends'];
            // if we have not data from brand tag
            if (is_null($blends))
                $blends = Blend::where('brand_id', '=', $brand['id'])->get()->toArray();
        }

        // render specifical data
        $tag->set('count', count($blends));

        if ($tag->getAttribute('no-render')) $str .= $tag->expand();
        // else ~> just parse
        else {
            foreach ($blends as $blend) {
                $tag->set('blend', $blend);
                $str .= $tag->expand();
            }
        }


        return $str;
    }

    /**
     * @param FTL_Binding $tag
     * @return string
     */
    public static function tag_blend(FTL_Binding $tag)
    {
        // Returns the field value or NULL if the attribute is not set
        $field = $tag->getAttribute('field');
        $blend = $tag->get('blend');

        if (!is_null($field)) {
            if (!empty($brand[$field])) ;
            return self::output_value($tag, $blend[$field]);
        }
        // Here we have the choice :
        // - Ether return nothing if the field attribute isn't set or doesn't exist
        // - Ether silently return ''
        /*return self::show_tag_error(
            $tag,
            'The attribute <b>"field"</b> is not set'
        );*/

        // get media
        //self::load_model('media_model', true);
        $medias = Media::getByBlend($blend['id'])->get();
        $blend['medias'] = $medias->toArray();

        // get extend
        $extends = ExtendFields::getByBlend($blend['id'])->get();
        $blend['extends'] = $extends->toArray();

        $tag->set('blend', $blend);
        return $tag->expand();
    }

    public static function tag_extends(FTL_Binding $tag)
    {
        $str = '';

        $blend = $tag->get('blend');

        if (is_null($blend)) {
            $extends = ExtendFields::with('field', 'field.lang', 'field.type')->get()->toArray();
        }
        //
        else {
            $extends = empty($blend['extend_fields']) || count($blend['extend_fields']) == 0 ? null : $blend['extend_fields'];

            if (is_null($extends)) {
                $extends = ExtendFields::getByBlend($blend['id'])->get()->toArray();
            }
        }

        // limit
        $limit = $tag->getAttribute('limit');
        if (!is_null($limit))
            $extends = array_slice($extends, 0, $limit);

        foreach ($extends as $extend) {
            $tag->set('extend', $extend);
            $str .= $tag->expand();
        }

        return $str;
    }

    /**
     * @param FTL_Binding $tag
     * @return Collection|string
     */
    public static function tag__extend(FTL_Binding $tag)
    {
        $extend = $tag->get('extend');

        // Returns the field value or NULL if the attribute is not set
        $field = $tag->getAttribute('field');

        if (!is_null($field)) {
            if (!empty($extend[$field])) {
                return self::output_value($tag, $extend[$field]);
            }

        }
        // Here we have the choice :
        // - Ether return nothing if the field attribute isn't set or doesn't exist
        // - Ether silently return ''
        /*return self::show_tag_error(
            $tag,
            'The attribute <b>"field"</b> is not set'
        );*/

        return new Collection($extend);
    }

    public function tag_tobacco_count(FTL_Binding $tag) {
        $countData = $tag->get('count');

        // if missing ~> try count parent
        if (!$countData) {
            return self::output_value($tag, '0');
        }
        return self::output_value($tag, $countData);
    }

}