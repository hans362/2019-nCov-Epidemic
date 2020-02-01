# 2019-nCov 中国地区实时疫情信息聚合
## 使用方法
### 方法一：直接使用作者本人搭建的服务
https://ncov.hans362.cn/
### 方法二：手动搭建
1. 准备 LNMP 或 LAMP 环境
2. 在网站根目录下执行：
```
git clone https://github.com/hans362/2019-nCov-Epidemic.git
mv 2019-nCov-Epidemic/* .
```
3. 创建一个名为 ncov 的数据库，执行下方 SQL 语句导入数据表：
```
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ncov`
--

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE `data` (
  `source` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` int(11) DEFAULT NULL,
  `suspected` int(11) DEFAULT NULL,
  `cured` int(11) DEFAULT NULL,
  `dead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `data`
--

INSERT INTO `data` (`source`, `name`, `confirmed`, `suspected`, `cured`, `dead`) VALUES
('bd', '百度', 7829, 12167, 136, 170),
('dxy', '丁香园', 7826, 12139, 133, 170),
('kk', '夸克', 7826, NULL, 134, 170),
('ms', '梅斯', 7805, 12372, 129, 170),
('tx', '腾讯', 7826, 12167, 133, 170),
('wy', '网易', 7826, NULL, 133, 170),
('xl', '新浪', 7736, 12167, 124, 170);

--
-- 转储表的索引
--

--
-- 表的索引 `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`source`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
4. 修改 config.php.example 内的数据库配置，并重命名为 config.php
5. 添加定时任务，每5分钟执行：
```
php -q /path/to/your/directory/cron.php
```