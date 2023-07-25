<?php

class ProductModel extends BasicModel
{
    protected $name = 'product';

    public $category = null;
    public $product = null;

    public function view($args)
    {
        $this->get_category($args['cid']);
        $this->get_product($args['pid']);
        // 设置模板变量
        $this->title = $this->product['title'];
        $this->keywords = $this->product['tags'];
        $this->description = $this->product['summary'];
        $this->breadcrumbs = [
            ['title' => $this->category['title'], 'url' => 'index.php?rt=/' . $this->category['id']],
        ];
    }

    protected function get_category($cid)
    {
        $this->category = App::cache($cid . '/meta');
        // 记录不存在
        if (!$this->category) {
            App::obtain('ErrorModel')->warning('%s not found', $cid);
        }
    }

    protected function get_product($pid)
    {
        $this->product = App::cache($this->category['id'] . '/' . $pid);
        // 记录不存在
        if (!$this->product) {
            App::obtain('ErrorModel')->warning('%s not found', $pid);
        }
    }
}
