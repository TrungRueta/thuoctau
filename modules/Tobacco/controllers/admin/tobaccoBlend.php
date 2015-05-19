<?php
use App\Blend\Blend;
use App\Brand\Brand;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/30/15
 * Time: 6:36 PM
 * @property mixed input
 */

class tobaccoBlend extends Module_Admin {

    /**
     * The deported construct function
     * Should be called instead of parent::__construct by inherited classes
     *
     * @return mixed
     */
    protected function construct()
    {
        // TODO: Implement construct() method.

        // Models
        $this->load->model(
            array(
                'extend_field_model',
                'url_model',
                'resource_model',
                'rule_model'
            ), '', TRUE);

        $this->load->library('structure');

        $this->load->helper('string_helper');
        $this->load->helper('text_helper');
    }

    public function index() {
        $this->template['nb'] = 20;
        $this->output('admin/blend/index');
    }

    // GET
    /**
     * @param int $page
     */
    public function get_list($page=1) {

        $nb = $this->input->post('nb') ? $this->input->post('nb') : 20;

        // create navipage
        $blendCount = Blend::count();
        $blendPages = round($blendCount / $nb, 0);

        $offset = ($page - 1) * $nb;

        $query = Blend::with('brand')->skip($offset)->take($nb);

        // filter
        $filter_name = $this->input->post('name');
        if ($filter_name)
            $query->where('name','like', '%' . $filter_name . '%');

        $filter_brand = $this->input->post('brand');
        if ($filter_brand)
            $query->where('brand','like', '%' . $filter_brand . '%');

        $blends = $query->get();

        $this->template['blendPages'] = $blendPages;
        $this->template['page'] = $page;
        $this->template['blends'] = $blends;

        $this->output('admin/blend/list');
    }

    public function create() {
        $this->template['formUrl'] = site_url(config_item('admin_url')). '/module/tobacco/tobaccoBlend/store';
        $this->template['brands'] = Brand::all();

        // Extends fields
        $extend_fields = $this->extend_field_model->get_element_extend_fields('blends');
        $this->template['has_translated_extend_fields'] = $this->_has_translated_extend_fields($extend_fields);
        $this->template['extend_fields'] = $extend_fields;

        $this->output('admin/blend/form');
    }

    public function edit($id) {
        $blend = Blend::with('brand')->find($id);
        if (!$blend) $this->notok();

        $this->template['formUrl'] = site_url(config_item('admin_url')). '/module/tobacco/tobaccoBlend/update';
        $this->template['brands'] = Brand::all();
        $this->template['blend'] = $blend;
        $this->output('admin/blend/form');
    }

    // POST

    public function store() {

        $input = $this->input->post('blend');
        $brandInput = $this->input->post('brand');

        // create slug
        $slug = $this->createSlugName($input['name']);
        // check if slug same with other one
        if ( Blend::whereSlug($slug) ) $slug = $slug . '_1';

        $input['slug'] = $slug;

        // save
        $blend = new Blend($input);

        // save brand link
        if (isset($brandInput['id']) && strlen($brandInput['id']) > 0) {
            $brand = Brand::find($brandInput['id']);
            if (! $brand) $this->notok();

            $blend->brand()->associate($brand);
        }

        if (! $blend->save()) $this->notok();

        else {
            $blend = Blend::skip( Blend::count() - 1 )->take(1)->first();

            // Save extend fields data
            $this->extend_field_model->save_data('blends', $blend->id, $_POST);

            // Update the authors list
            $this->update[] = array(
                'element' => 'blendForm',
                'url' => admin_url() . 'module/tobacco/tobaccoBlend/edit/' . $blend->id
            );

            $this->ok();
        }
    }

    public function update() {

        $input = $this->input->post('blend');
        $inputBrand = $this->input->post('brand');

        // create slug
        $slug = $this->createSlugName($input['name']);
        // check if slug same with other one
        if ( Blend::whereSlug($slug) ) $slug = $slug . '_1';

        $input['slug'] = $slug;

        $blend = Blend::find($input['id']);
        $blend->fill($input);

        // save brand link
        if (isset($inputBrand['id'])) {
            $brand = Brand::find($inputBrand['id']);
            if (!$brand) $this->notok();
            $blend->brand()->associate($brand);
        }

        $save = $blend->save();

        if (! $save) $this->notok();
        else {
            // Save extend fields data
            $this->extend_field_model->save_data('blends', $blend->id, $_POST);

            // Update the authors list
            $this->update[] = array(
                'element' => 'blendForm',
                'url' => admin_url() . 'module/tobacco/tobaccoBlend/edit/' . $blend->id
            );

            $this->ok();
        }
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