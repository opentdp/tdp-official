<?php

class AdminModel extends BasicModel
{
    protected $name = 'admin';

    /**
     * 重建缓存
     * @return void
     */
    public function build()
    {
        $rs = $this->build_meta();
        foreach ($rs as $cate => $meta) {
            $this->build_index($cate);
        }
    }

    /**
     * 生成元数据
     * @return array
     */
    protected function build_meta()
    {
        $index = [];
        $fpath = APP_DATASET . '{,*/}meta.ini';
        foreach ((array)glob($fpath, GLOB_BRACE) as $file) {
            $rs = parse_ini_file($file, true);
            $rs['id'] = dirname(str_replace(APP_DATASET, '', $file));
            App::cache($rs['id'] . '/meta', $rs);
            // 添加到索引
            if ($rs['id'] != '.') {
                $index[$rs['id']] = $rs;
            }
        }
        App::cache('index', $index);
        return $index;
    }

    /**
     * 生成作品索引
     * @param string $cate
     * @return array
     */
    protected function build_index($cate)
    {
        $index = [];
        $fpath = APP_DATASET . $cate . '/*.md';
        foreach ((array)glob($fpath, GLOB_BRACE) as $file) {
            $rs = $this->md_parse($file);
            $rs['id'] = basename($file, '.md');
            App::cache($cate . '/' . $rs['id'], $rs);
            // 添加到索引
            unset($rs['content']);
            $index[$rs['id']] = $rs;
        }
        App::cache($cate . '/index', $index);
        return $index;
    }

    /**
     * 解析 Markdown
     * @param string $file
     * @return array
     */
    protected function md_parse($file)
    {
        $data = [];
        if (!is_file($file)) {
            $data['content'] = 'not found';
            return $data;
        }
        // 读取文件
        $text = file_get_contents($file);
        // 解析标题
        $text = preg_replace_callback('/^#\s(.+)[\r\n]+/U', function ($rs) use ($data) {
            $data['subject'] = trim($rs[1]);
            return '';
        }, $text);
        // 解析属性
        $text = preg_replace_callback('/```ini+(.+)```/Us', function ($rs) use ($data) {
            foreach (parse_ini_string($rs[1], true) as $k => $v) {
                $data[$k] = $v;
            }
            return '';
        }, $text);
        // 解析内容
        if ($text = trim($text)) {
            $data['content'] = App::obtain('ParsedownExtraToc')->text($text);
        }
        // 获取摘要
        if ($data['content'] && !$data['summary']) {
            $data['summary'] = strip_tags($data['content']);
            if (mb_strlen($data['summary']) > 60) {
                $data['summary'] = mb_substr($data['summary'], 0, 60) . '...';
            }
        }
        return $data;
    }
}
