<?php

class AdminModel extends BasicModel
{
    public $name = 'admin';

    public function build()
    {
        $this->md_config();
        $this->md_index('blogs');
        $this->md_index('articles');
    }

    /**
     * 站点配置
     */
    protected function md_config()
    {
        $config = $this->md_parse(APP_DATASET . 'config.md');
        unset($config->subject, $config->content);
        App::storage('config', $config);
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
        foreach ((array)glob($mdpath) as $file) {
            $id = basename($file, '.md');
            $result[$id] = $this->md_parse($file);
            App::storage($type . '/' . $id, $result[$id]);
            unset($result[$id]->content); // 删除内容
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
        // 读取文件
        $text = file_get_contents($file);
        // 解析标题
        $text = preg_replace_callback('/^#\s(.+)[\r\n]+/U', function ($rs) use ($data) {
            $data->subject = trim($rs[1]);
            return '';
        }, $text);
        // 解析属性
        $text = preg_replace_callback('/```ini+(.+)```/Us', function ($rs) use ($data) {
            foreach ((object)parse_ini_string($rs[1], true) as $k => $v) {
                $data->{$k} = is_array($v) ? (object)$v : $v;
            }
            return '';
        }, $text);
        // 解析内容
        if ($text = trim($text)) {
            $data->content = App::obtain('ParsedownExtraToc')->text($text);
        }
        // 获取摘要
        if ($data->content && !$data->summary) {
            $data->summary = strip_tags($data->content);
            if (mb_strlen($data->summary) > 60) {
                $data->summary = mb_substr($data->summary, 0, 60) . '...';
            }
        }
        return $data;
    }
}
