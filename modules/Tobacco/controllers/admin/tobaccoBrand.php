<?php
use App\Brand\Brand;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 8:20 AM
 * @property mixed input
 */
class TobaccoBrand extends Module_Admin
{

    /**
     * The deported construct function
     * Should be called instead of parent::__construct by inherited classes
     * @return mixed
     */
    protected function construct()
    {
    }


    /**
     *
     */
    public function index()
    {
        $this->template['nb'] = 20;
        $this->output('admin/brand/index');
    }

    /**
     * @param int $page
     */
    public function get_list($page = 1)
    {
        $nb = $this->input->post('nb') ? $this->input->post('nb') : 20;

        // create navipage
        $brandCount = Brand::count();
        $brandPages = round($brandCount / $nb, 0);

        $offset = ($page - 1) * $nb;
        
        $query = Brand::with('blends')->sKip($offset)->take($nb);

        // filter
        $filter_name = $this->input->post('name');
        if ($filter_name)
            $query->where('name','like','%' . $filter_name . '%');

        $brands = $query->get();

        $this->template['brandPages'] = $brandPages;
        $this->template['page'] = $page;
        $this->template['brands'] = $brands;


        $this->output('admin/brand/list');
    }

    /**
     */
    public function create()
    {
        $this->template['formUrl'] = site_url(config_item('admin_url')). '/module/tobacco/tobaccoBrand/store';
        $this->output('admin/brand/form');
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $this->template['brand'] = Brand::find($id);
        $this->template['formUrl'] = site_url(config_item('admin_url')). '/module/tobacco/update';
        $this->output('admin/brand/form');
    }

    /**
     * @param $id
     */
    public function options($id)
    {
        $this->output('admin/brand/options');
    }

    // POST

    /**
     *
     */
    public function update()
    {
        $input = $this->input->post('brand');
        $id = $input['id'];

        $brand = Brand::find($id);
        $input['slug'] = $this->createSlugName($input['name']);

        if (!$brand) {
            $this->notok();
        } // execute
        else {
            // check slug
            $checkSlug = Brand::where('slug', '=', $input['slug']);
            if ($checkSlug) $input['slug'] = $input['slug'] . '_1';

            $brand->fill($input);
            $save = $brand->save();
            if (!$save) $this->notok();
            else {
                // Update the authors list
                $this->update[] = array(
                    'element' => 'brandForm',
                    'url' => admin_url() . 'module/tobacco/tobaccoBrand/edit/' . $id
                );

                // Send the user a message
                $this->ok();
            }
        }
    }

    /**
     *
     */
    public function store()
    {
        $input = $this->input->post('brand');
        $brand = new Brand($input);
        $brand->slug = $this->createSlugName($input['name']);

        // check slug
        $checkSlug = Brand::where('slug', '=', $brand->slug);
        if ($checkSlug) $brand->slug = $brand->slug . '_1';

        // save
        $save = $brand->save();

        if (!$save) $this->notok();
        else {
            // count
            $brandCount = Brand::count();
            $brandLast = Brand::skip($brandCount - 1)->take(1)->first();
            // Update the authors list
            $this->update[] = array(
                'element' => 'brandForm',
                'url' => admin_url() . 'module/tobacco/tobaccoBrand/edit/' . $brandLast->id
            );
            $this->ok();
        }
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) $this->notok();

        $delete = $brand->delete();
        if (!$delete) $this->notok();
        else $this->ok();
    }


    private function ok()
    {
        $this->success(lang('ionize_message_operation_ok'));
    }

    private function notok()
    {
        $this->error(lang('ionize_message_operation_nok'));
    }

    private function createSlugName($name) {
        return str_slug($name);
    }

}