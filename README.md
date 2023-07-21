# OpenTDP 官方网站

## 快速开始

- 将项目源码上传到服务器

- 构建缓存 `http://example.com/?rt=/admin/build`

- 访问站点 `http://example.com`

## 数据目录

数据目录为 `dataset`，其中包含了 `meta.ini` 配置文件和 `x.md` 作品文件

## 配置文件

配置文件使用 `ini` 格式，当值中出现 `=` 时，需要用引号括起来整个值

## 作品文件

作品文件使用 `markdown` 格式，每个文件为一篇作品，文件名为作品的 `id`，文件内容为作品的 `content` 字段。

### 作品元数据

- 首行 `#` 后面的内容为作品的标题，即 `subject` 字段

- 首个 `ini` 代码块内容为作品的属性数据，格式参阅 [配置文件](#配置文件)

## 微信交流群

扫码添加开发者好友（请备注 `Open TDP`，不备注可能无法通过好友申请）

![扫码添加好友](https://docs.opentdp.org/static/weixin-qr.jpg)

## 其他

Copyright (c) 2022 - 2023 Open TDP
