# 2019-nCov 中国地区实时疫情信息聚合
## 使用方法
### 方法一：直接使用作者本人搭建的服务
https://ncov.hans362.cn/
### 方法二：手动搭建
1. 准备 LNMP 或 LAMP 环境
2. 创建一个数据库，导入下方数据表
3. 修改 config.php.example 内的数据库配置，并重命名为 config.php
4. 添加定时任务，每5分钟执行 php -r path/to/your/directory/cron.php
