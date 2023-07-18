<?php

class AdminModel extends BasicModel
{
    public $name = 'admin';

    public function build()
    {
        $this->md_index('blogs');
        $this->md_index('articles');
    }

    /**
     * 生成md索引
     * @param string $type
     * @return void
     */
    protected function md_index($type)
    {
        $result = [];
        $mdpath = APP_DATASET . $type . '/*.md';
        foreach (glob($mdpath) as $file) {
            $id = basename($file, '.md');
            $item = $this->md_parse($file);
            // 缓存结果
            App::storage($type . '/' . $id, $item);
            // 添加索引
            $item->content = strip_tags($item->content);
            if (mb_strlen($item->content) > 60) {
                $item->content = mb_substr($item->content, 0, 60) . '...';
            }
            $result[$id] = $item;
        }
        App::storage($type . '/index', $result);
    }

    /**
     * 解析md文件
     * @param string $file
     * @return object
     */
    protected function md_parse($file)
    {
        $data = new stdClass();
        if (!is_file($file)) {
            $data->content = 'not found';
            return $data;
        }
        $text = file_get_contents($file);
        // 解析标题
        if (preg_match('/^#(.+)[\r\n]+/', $text, $subject)) {
            $text = preg_replace('/^#(.+)[\r\n]+/', '', $text);
            $data->subject = $subject[1];
        }
        // 解析属性
        if (preg_match_all('/\[\/\/\]: #(\w+) \((.+)\)/', $text, $prop)) {
            foreach ($prop[1] as $i => $key) {
                $data->$key = $prop[2][$i];
            }
        }
        // 解析内容
        $data->content = App::obtain('ParsedownExtraToc')->text($text);
        return $data;
    }
}
