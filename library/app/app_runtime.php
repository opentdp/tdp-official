<?php

class AppRuntime
{
    /**
     * 重建缓存
     * @return void
     */
    public function build()
    {
        $this->build_meta('*');
        foreach ($this->build_meta('*/') as $cid => $meta) {
            $meta['tags'] = [];
            foreach ($this->build_index($cid) as $item) {
                if (!empty($item['tags'])) {
                    foreach (explode(',', $item['tags']) as $k) {
                        $meta['tags'][$k][] = $item['id'];
                    }
                }
            }
            App::cache($cid . '/meta', $meta);
        }
    }

    /**
     * 生成元数据
     * @return array
     */
    public function build_meta($name)
    {
        $index = [];
        $files = glob(APP_DATASET . $name . 'meta.ini');
        foreach ($files as $file) {
            $rs = parse_ini_file($file, true);
            $rs['id'] = dirname(str_replace(APP_DATASET, '', $file));
            // 添加到索引
            $name && $index[$rs['id']] = $rs;
            App::cache($rs['id'] . '/meta', $rs);
        }
        App::cache('index', $index);
        return $index;
    }

    /**
     * 生成作品索引
     * @param string $name
     * @return array
     */
    public function build_index($name)
    {
        $index = [];
        $files = glob(APP_DATASET . $name . '/*.md');
        foreach ($files as $file) {
            $rs = $this->md_parse($file);
            $rs['id'] = basename($file, '.md');
            // 添加到索引
            $index[$rs['id']] = array_diff_key($rs, ['content' => 1]);
            App::cache($name . '/' . $rs['id'], $rs);
        }
        App::cache($name . '/index', $index);
        return $index;
    }

    /**
     * 解析 Markdown
     * @param string $file
     * @return array
     */
    public function md_parse($file)
    {
        if (!is_file($file)) {
            return ['content' => 'not found'];
        }
        // 读取文件
        $data = [];
        $text = trim(file_get_contents($file));
        // 解析标题
        $text = preg_replace_callback('/^#\s(.+)[\r\n]+/U', function ($rs) use (&$data) {
            $data['title'] = trim($rs[1]);
            return '';
        }, $text);
        // 解析属性
        $text = preg_replace_callback('/```ini(.+)```/Us', function ($rs) use (&$data) {
            $data = array_merge($data, parse_ini_string($rs[1], true));
            return '';
        }, $text);
        // 解析内容
        if ($text = trim($text)) {
            $data['content'] = App::obtain('ParsedownExtraToc')->text($text);
        }
        // 获取摘要
        if (isset($data['content']) && empty($data['summary'])) {
            $data['summary'] = strip_tags($data['content']);
            if (mb_strlen($data['summary']) > 60) {
                $data['summary'] = mb_substr($data['summary'], 0, 60) . '...';
            }
        }
        return $data;
    }
}
