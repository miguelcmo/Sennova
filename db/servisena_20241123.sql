/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80037
 Source Host           : localhost:3306
 Source Schema         : servisena

 Target Server Type    : MySQL
 Target Server Version : 80037
 File Encoding         : 65001

 Date: 23/11/2024 18:15:38
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `app` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `activity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `device` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `browser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `additional_data` json NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-activity_log-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk_activity_log-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (16, 13, 'appServiser', 'login', 'Usuario inició sesión', '2024-11-01 20:15:44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', '{\"Ciudad\":\"Caldas\",\"Geo\":\"6.0911,-75.6357\"}', '\"[]\"');
INSERT INTO `activity_log` VALUES (17, 13, 'appServiser', 'login', 'Usuario inició sesión', '2024-11-05 10:20:12', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', '{\"Ciudad\":\"Caldas\",\"Geo\":\"6.0911,-75.6357\"}', '\"[]\"');
INSERT INTO `activity_log` VALUES (18, 11, 'appServiserAdmin', 'login', 'Usuario inició sesión', '2024-11-05 10:36:10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', '{\"Ciudad\":\"Caldas\",\"Geo\":\"6.0911,-75.6357\"}', '\"[]\"');
INSERT INTO `activity_log` VALUES (19, 1, 'appServiserAdmin', 'login', 'Usuario inició sesión', '2024-11-05 20:43:29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', '{\"Ciudad\":\"Caldas\",\"Geo\":\"6.0911,-75.6357\"}', '\"[]\"');
INSERT INTO `activity_log` VALUES (20, 10, 'appServiser', 'login', 'Usuario inició sesión', '2024-11-18 15:49:03', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0', '{\"Ciudad\":\"Medell\\u00edn\",\"Geo\":\"6.2518,-75.5636\"}', '\"[]\"');

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile_id` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_address-profile`(`profile_id` ASC) USING BTREE,
  CONSTRAINT `fk_address-profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_ibkf_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', 10, 1729788979);
INSERT INTO `auth_assignment` VALUES ('advisor', 11, 1729788979);
INSERT INTO `auth_assignment` VALUES ('apprentice', 12, 1729788979);
INSERT INTO `auth_assignment` VALUES ('subscriber', 13, 1729788979);
INSERT INTO `auth_assignment` VALUES ('subscriber', 51, 1730820691);
INSERT INTO `auth_assignment` VALUES ('superadmin', 1, 1729788979);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name` ASC) USING BTREE,
  INDEX `idx-auth_item-type`(`type` ASC) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', 1, 'Can manage system settings and users', NULL, NULL, 1729788980, 1729788980);
INSERT INTO `auth_item` VALUES ('advisor', 1, 'Responsible for delivering training and courses', NULL, NULL, 1729788990, 1729788990);
INSERT INTO `auth_item` VALUES ('apprentice', 1, 'Support the advisor in training proccess and follow the subscriber advance', NULL, NULL, 1729789000, 1729789000);
INSERT INTO `auth_item` VALUES ('subscriber', 1, 'Basic access to the platform, learner with access to training materials', NULL, NULL, 1729789010, 1729789010);
INSERT INTO `auth_item` VALUES ('superadmin', 1, 'Has access to all system features', NULL, NULL, 1729788970, 1729788970);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child` ASC) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `continent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `surface_area` int NULL DEFAULT NULL,
  `independence_year` int NULL DEFAULT NULL,
  `population` int NULL DEFAULT NULL,
  `life_expectancy` float NULL DEFAULT NULL,
  `local_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `government_form` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `capital` int NULL DEFAULT NULL,
  `code_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 239 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'ABW', 'Aruba', 'North America', 'Caribbean', 193, NULL, 103000, 78.4, 'Aruba', 'Nonmetropolitan Territory of The Netherlands', 129, 'AW', NULL);
INSERT INTO `country` VALUES (2, 'AFG', 'Afghanistan', 'Asia', 'Southern and Central Asia', 652090, 1919, 22720000, 45.9, 'Afganistan/Afqanestan', 'Islamic Emirate', 1, 'AF', NULL);
INSERT INTO `country` VALUES (3, 'AGO', 'Angola', 'Africa', 'Central Africa', 1246700, 1975, 12878000, 38.3, 'Angola', 'Republic', 56, 'AO', NULL);
INSERT INTO `country` VALUES (4, 'AIA', 'Anguilla', 'North America', 'Caribbean', 96, NULL, 8000, 76.1, 'Anguilla', 'Dependent Territory of the UK', 62, 'AI', NULL);
INSERT INTO `country` VALUES (5, 'ALB', 'Albania', 'Europe', 'Southern Europe', 28748, 1912, 3401200, 71.6, 'Shqipëria', 'Republic', 34, 'AL', NULL);
INSERT INTO `country` VALUES (6, 'AND', 'Andorra', 'Europe', 'Southern Europe', 468, 1278, 78000, 83.5, 'Andorra', 'Parliamentary Coprincipality', 55, 'AD', NULL);
INSERT INTO `country` VALUES (7, 'ANT', 'Netherlands Antilles', 'North America', 'Caribbean', 800, NULL, 217000, 74.7, 'Nederlandse Antillen', 'Nonmetropolitan Territory of The Netherlands', 33, 'AN', NULL);
INSERT INTO `country` VALUES (8, 'ARE', 'United Arab Emirates', 'Asia', 'Middle East', 83600, 1971, 2441000, 74.1, 'Al-Imarat al-´Arabiya al-Muttahida', 'Emirate Federation', 65, 'AE', NULL);
INSERT INTO `country` VALUES (9, 'ARG', 'Argentina', 'South America', 'South America', 2780400, 1816, 37032000, 75.1, 'Argentina', 'Federal Republic', 69, 'AR', NULL);
INSERT INTO `country` VALUES (10, 'ARM', 'Armenia', 'Asia', 'Middle East', 29800, 1991, 3520000, 66.4, 'Hajastan', 'Republic', 126, 'AM', NULL);
INSERT INTO `country` VALUES (11, 'ASM', 'American Samoa', 'Oceania', 'Polynesia', 199, NULL, 68000, 75.1, 'Amerika Samoa', 'US Territory', 54, 'AS', NULL);
INSERT INTO `country` VALUES (12, 'ATA', 'Antarctica', 'Antarctica', 'Antarctica', 13120000, NULL, 0, NULL, '–', 'Co-administrated', NULL, 'AQ', NULL);
INSERT INTO `country` VALUES (13, 'ATF', 'French Southern territories', 'Antarctica', 'Antarctica', 7780, NULL, 0, NULL, 'Terres australes françaises', 'Nonmetropolitan Territory of France', NULL, 'TF', NULL);
INSERT INTO `country` VALUES (14, 'ATG', 'Antigua and Barbuda', 'North America', 'Caribbean', 442, 1981, 68000, 70.5, 'Antigua and Barbuda', 'Constitutional Monarchy', 63, 'AG', NULL);
INSERT INTO `country` VALUES (15, 'AUS', 'Australia', 'Oceania', 'Australia and New Zealand', 7741220, 1901, 18886000, 79.8, 'Australia', 'Constitutional Monarchy, Federation', 135, 'AU', NULL);
INSERT INTO `country` VALUES (16, 'AUT', 'Austria', 'Europe', 'Western Europe', 83859, 1918, 8091800, 77.7, 'Österreich', 'Federal Republic', 1523, 'AT', NULL);
INSERT INTO `country` VALUES (17, 'AZE', 'Azerbaijan', 'Asia', 'Middle East', 86600, 1991, 7734000, 62.9, 'Azärbaycan', 'Federal Republic', 144, 'AZ', NULL);
INSERT INTO `country` VALUES (18, 'BDI', 'Burundi', 'Africa', 'Eastern Africa', 27834, 1962, 6695000, 46.2, 'Burundi/Uburundi', 'Republic', 552, 'BI', NULL);
INSERT INTO `country` VALUES (19, 'BEL', 'Belgium', 'Europe', 'Western Europe', 30518, 1830, 10239000, 77.8, 'België/Belgique', 'Constitutional Monarchy, Federation', 179, 'BE', NULL);
INSERT INTO `country` VALUES (20, 'BEN', 'Benin', 'Africa', 'Western Africa', 112622, 1960, 6097000, 50.2, 'Bénin', 'Republic', 187, 'BJ', NULL);
INSERT INTO `country` VALUES (21, 'BFA', 'Burkina Faso', 'Africa', 'Western Africa', 274000, 1960, 11937000, 46.7, 'Burkina Faso', 'Republic', 549, 'BF', NULL);
INSERT INTO `country` VALUES (22, 'BGD', 'Bangladesh', 'Asia', 'Southern and Central Asia', 143998, 1971, 129155000, 60.2, 'Bangladesh', 'Republic', 150, 'BD', NULL);
INSERT INTO `country` VALUES (23, 'BGR', 'Bulgaria', 'Europe', 'Eastern Europe', 110994, 1908, 8190900, 70.9, 'Balgarija', 'Republic', 539, 'BG', NULL);
INSERT INTO `country` VALUES (24, 'BHR', 'Bahrain', 'Asia', 'Middle East', 694, 1971, 617000, 73, 'Al-Bahrayn', 'Monarchy (Emirate)', 149, 'BH', NULL);
INSERT INTO `country` VALUES (25, 'BHS', 'Bahamas', 'North America', 'Caribbean', 13878, 1973, 307000, 71.1, 'The Bahamas', 'Constitutional Monarchy', 148, 'BS', NULL);
INSERT INTO `country` VALUES (26, 'BIH', 'Bosnia and Herzegovina', 'Europe', 'Southern Europe', 51197, 1992, 3972000, 71.5, 'Bosna i Hercegovina', 'Federal Republic', 201, 'BA', NULL);
INSERT INTO `country` VALUES (27, 'BLR', 'Belarus', 'Europe', 'Eastern Europe', 207600, 1991, 10236000, 68, 'Belarus', 'Republic', 3520, 'BY', NULL);
INSERT INTO `country` VALUES (28, 'BLZ', 'Belize', 'North America', 'Central America', 22696, 1981, 241000, 70.9, 'Belize', 'Constitutional Monarchy', 185, 'BZ', NULL);
INSERT INTO `country` VALUES (29, 'BMU', 'Bermuda', 'North America', 'North America', 53, NULL, 65000, 76.9, 'Bermuda', 'Dependent Territory of the UK', 191, 'BM', NULL);
INSERT INTO `country` VALUES (30, 'BOL', 'Bolivia', 'South America', 'South America', 1098581, 1825, 8329000, 63.7, 'Bolivia', 'Republic', 194, 'BO', NULL);
INSERT INTO `country` VALUES (31, 'BRA', 'Brazil', 'South America', 'South America', 8547403, 1822, 170115000, 62.9, 'Brasil', 'Federal Republic', 211, 'BR', NULL);
INSERT INTO `country` VALUES (32, 'BRB', 'Barbados', 'North America', 'Caribbean', 430, 1966, 270000, 73, 'Barbados', 'Constitutional Monarchy', 174, 'BB', NULL);
INSERT INTO `country` VALUES (33, 'BRN', 'Brunei', 'Asia', 'Southeast Asia', 5765, 1984, 328000, 73.6, 'Brunei Darussalam', 'Monarchy (Sultanate)', 538, 'BN', NULL);
INSERT INTO `country` VALUES (34, 'BTN', 'Bhutan', 'Asia', 'Southern and Central Asia', 47000, 1910, 2124000, 52.4, 'Druk-Yul', 'Monarchy', 192, 'BT', NULL);
INSERT INTO `country` VALUES (35, 'BVT', 'Bouvet Island', 'Antarctica', 'Antarctica', 59, NULL, 0, NULL, 'Bouvetøya', 'Dependent Territory of Norway', NULL, 'BV', NULL);
INSERT INTO `country` VALUES (36, 'BWA', 'Botswana', 'Africa', 'Southern Africa', 581730, 1966, 1622000, 39.3, 'Botswana', 'Republic', 204, 'BW', NULL);
INSERT INTO `country` VALUES (37, 'CAF', 'Central African Republic', 'Africa', 'Central Africa', 622984, 1960, 3615000, 44, 'Centrafrique/Bê-Afrîka', 'Republic', 1889, 'CF', NULL);
INSERT INTO `country` VALUES (38, 'CAN', 'Canada', 'North America', 'North America', 9970610, 1867, 31147000, 79.4, 'Canada', 'Constitutional Monarchy, Federation', 1822, 'CA', NULL);
INSERT INTO `country` VALUES (39, 'CCK', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', 14, NULL, 600, NULL, 'Cocos (Keeling) Islands', 'Territory of Australia', 2317, 'CC', NULL);
INSERT INTO `country` VALUES (40, 'CHE', 'Switzerland', 'Europe', 'Western Europe', 41284, 1499, 7160400, 79.6, 'Schweiz/Suisse/Svizzera/Svizra', 'Federation', 3248, 'CH', NULL);
INSERT INTO `country` VALUES (41, 'CHL', 'Chile', 'South America', 'South America', 756626, 1810, 15211000, 75.7, 'Chile', 'Republic', 554, 'CL', NULL);
INSERT INTO `country` VALUES (42, 'CHN', 'China', 'Asia', 'Eastern Asia', 9572900, -1523, 1277558000, 71.4, 'Zhongquo', 'People\'sRepublic', 1891, 'CN', NULL);
INSERT INTO `country` VALUES (43, 'CIV', 'Côte d’Ivoire', 'Africa', 'Western Africa', 322463, 1960, 14786000, 45.2, 'Côte d’Ivoire', 'Republic', 2814, 'CI', NULL);
INSERT INTO `country` VALUES (44, 'CMR', 'Cameroon', 'Africa', 'Central Africa', 475442, 1960, 15085000, 54.8, 'Cameroun/Cameroon', 'Republic', 1804, 'CM', NULL);
INSERT INTO `country` VALUES (45, 'COD', 'Congo, The Democratic Republic of the', 'Africa', 'Central Africa', 2344858, 1960, 51654000, 48.8, 'République Démocratique du Congo', 'Republic', 2298, 'CD', NULL);
INSERT INTO `country` VALUES (46, 'COG', 'Congo', 'Africa', 'Central Africa', 342000, 1960, 2943000, 47.4, 'Congo', 'Republic', 2296, 'CG', NULL);
INSERT INTO `country` VALUES (47, 'COK', 'Cook Islands', 'Oceania', 'Polynesia', 236, NULL, 20000, 71.1, 'The Cook Islands', 'Nonmetropolitan Territory of New Zealand', 583, 'CK', NULL);
INSERT INTO `country` VALUES (48, 'COL', 'Colombia', 'South America', 'South America', 1138914, 1810, 42321000, 70.3, 'Colombia', 'Republic', 2257, 'CO', 'COP');
INSERT INTO `country` VALUES (49, 'COM', 'Comoros', 'Africa', 'Eastern Africa', 1862, 1975, 578000, 60, 'Komori/Comores', 'Republic', 2295, 'KM', NULL);
INSERT INTO `country` VALUES (50, 'CPV', 'Cape Verde', 'Africa', 'Western Africa', 4033, 1975, 428000, 68.9, 'Cabo Verde', 'Republic', 1859, 'CV', NULL);
INSERT INTO `country` VALUES (51, 'CRI', 'Costa Rica', 'North America', 'Central America', 51100, 1821, 4023000, 75.8, 'Costa Rica', 'Republic', 584, 'CR', NULL);
INSERT INTO `country` VALUES (52, 'CUB', 'Cuba', 'North America', 'Caribbean', 110861, 1902, 11201000, 76.2, 'Cuba', 'Socialistic Republic', 2413, 'CU', NULL);
INSERT INTO `country` VALUES (53, 'CXR', 'Christmas Island', 'Oceania', 'Australia and New Zealand', 135, NULL, 2500, NULL, 'Christmas Island', 'Territory of Australia', 1791, 'CX', NULL);
INSERT INTO `country` VALUES (54, 'CYM', 'Cayman Islands', 'North America', 'Caribbean', 264, NULL, 38000, 78.9, 'Cayman Islands', 'Dependent Territory of the UK', 553, 'KY', NULL);
INSERT INTO `country` VALUES (55, 'CYP', 'Cyprus', 'Asia', 'Middle East', 9251, 1960, 754700, 76.7, 'Kýpros/Kibris', 'Republic', 2430, 'CY', NULL);
INSERT INTO `country` VALUES (56, 'CZE', 'Czech Republic', 'Europe', 'Eastern Europe', 78866, 1993, 10278100, 74.5, '¸esko', 'Republic', 3339, 'CZ', NULL);
INSERT INTO `country` VALUES (57, 'DEU', 'Germany', 'Europe', 'Western Europe', 357022, 1955, 82164700, 77.4, 'Deutschland', 'Federal Republic', 3068, 'DE', NULL);
INSERT INTO `country` VALUES (58, 'DJI', 'Djibouti', 'Africa', 'Eastern Africa', 23200, 1977, 638000, 50.8, 'Djibouti/Jibuti', 'Republic', 585, 'DJ', NULL);
INSERT INTO `country` VALUES (59, 'DMA', 'Dominica', 'North America', 'Caribbean', 751, 1978, 71000, 73.4, 'Dominica', 'Republic', 586, 'DM', NULL);
INSERT INTO `country` VALUES (60, 'DNK', 'Denmark', 'Europe', 'Nordic Countries', 43094, 800, 5330000, 76.5, 'Danmark', 'Constitutional Monarchy', 3315, 'DK', NULL);
INSERT INTO `country` VALUES (61, 'DOM', 'Dominican Republic', 'North America', 'Caribbean', 48511, 1844, 8495000, 73.2, 'República Dominicana', 'Republic', 587, 'DO', NULL);
INSERT INTO `country` VALUES (62, 'DZA', 'Algeria', 'Africa', 'Northern Africa', 2381741, 1962, 31471000, 69.7, 'Al-Jaza’ir/Algérie', 'Republic', 35, 'DZ', NULL);
INSERT INTO `country` VALUES (63, 'ECU', 'Ecuador', 'South America', 'South America', 283561, 1822, 12646000, 71.1, 'Ecuador', 'Republic', 594, 'EC', NULL);
INSERT INTO `country` VALUES (64, 'EGY', 'Egypt', 'Africa', 'Northern Africa', 1001449, 1922, 68470000, 63.3, 'Misr', 'Republic', 608, 'EG', NULL);
INSERT INTO `country` VALUES (65, 'ERI', 'Eritrea', 'Africa', 'Eastern Africa', 117600, 1993, 3850000, 55.8, 'Ertra', 'Republic', 652, 'ER', NULL);
INSERT INTO `country` VALUES (66, 'ESH', 'Western Sahara', 'Africa', 'Northern Africa', 266000, NULL, 293000, 49.8, 'As-Sahrawiya', 'Occupied by Marocco', 2453, 'EH', NULL);
INSERT INTO `country` VALUES (67, 'ESP', 'Spain', 'Europe', 'Southern Europe', 505992, 1492, 39441700, 78.8, 'España', 'Constitutional Monarchy', 653, 'ES', NULL);
INSERT INTO `country` VALUES (68, 'EST', 'Estonia', 'Europe', 'Baltic Countries', 45227, 1991, 1439200, 69.5, 'Eesti', 'Republic', 3791, 'EE', NULL);
INSERT INTO `country` VALUES (69, 'ETH', 'Ethiopia', 'Africa', 'Eastern Africa', 1104300, -1000, 62565000, 45.2, 'YeItyop´iya', 'Republic', 756, 'ET', NULL);
INSERT INTO `country` VALUES (70, 'FIN', 'Finland', 'Europe', 'Nordic Countries', 338145, 1917, 5171300, 77.4, 'Suomi', 'Republic', 3236, 'FI', NULL);
INSERT INTO `country` VALUES (71, 'FJI', 'Fiji Islands', 'Oceania', 'Melanesia', 18274, 1970, 817000, 67.9, 'Fiji Islands', 'Republic', 764, 'FJ', NULL);
INSERT INTO `country` VALUES (72, 'FLK', 'Falkland Islands', 'South America', 'South America', 12173, NULL, 2000, NULL, 'Falkland Islands', 'Dependent Territory of the UK', 763, 'FK', NULL);
INSERT INTO `country` VALUES (73, 'FRA', 'France', 'Europe', 'Western Europe', 551500, 843, 59225700, 78.8, 'France', 'Republic', 2974, 'FR', NULL);
INSERT INTO `country` VALUES (74, 'FRO', 'Faroe Islands', 'Europe', 'Nordic Countries', 1399, NULL, 43000, 78.4, 'Føroyar', 'Part of Denmark', 901, 'FO', NULL);
INSERT INTO `country` VALUES (75, 'FSM', 'Micronesia, Federated States of', 'Oceania', 'Micronesia', 702, 1990, 119000, 68.6, 'Micronesia', 'Federal Republic', 2689, 'FM', NULL);
INSERT INTO `country` VALUES (76, 'GAB', 'Gabon', 'Africa', 'Central Africa', 267668, 1960, 1226000, 50.1, 'Le Gabon', 'Republic', 902, 'GA', NULL);
INSERT INTO `country` VALUES (77, 'GBR', 'United Kingdom', 'Europe', 'British Islands', 242900, 1066, 59623400, 77.7, 'United Kingdom', 'Constitutional Monarchy', 456, 'GB', NULL);
INSERT INTO `country` VALUES (78, 'GEO', 'Georgia', 'Asia', 'Middle East', 69700, 1991, 4968000, 64.5, 'Sakartvelo', 'Republic', 905, 'GE', NULL);
INSERT INTO `country` VALUES (79, 'GHA', 'Ghana', 'Africa', 'Western Africa', 238533, 1957, 20212000, 57.4, 'Ghana', 'Republic', 910, 'GH', NULL);
INSERT INTO `country` VALUES (80, 'GIB', 'Gibraltar', 'Europe', 'Southern Europe', 6, NULL, 25000, 79, 'Gibraltar', 'Dependent Territory of the UK', 915, 'GI', NULL);
INSERT INTO `country` VALUES (81, 'GIN', 'Guinea', 'Africa', 'Western Africa', 245857, 1958, 7430000, 45.6, 'Guinée', 'Republic', 926, 'GN', NULL);
INSERT INTO `country` VALUES (82, 'GLP', 'Guadeloupe', 'North America', 'Caribbean', 1705, NULL, 456000, 77, 'Guadeloupe', 'Overseas Department of France', 919, 'GP', NULL);
INSERT INTO `country` VALUES (83, 'GMB', 'Gambia', 'Africa', 'Western Africa', 11295, 1965, 1305000, 53.2, 'The Gambia', 'Republic', 904, 'GM', NULL);
INSERT INTO `country` VALUES (84, 'GNB', 'Guinea-Bissau', 'Africa', 'Western Africa', 36125, 1974, 1213000, 49, 'Guiné-Bissau', 'Republic', 927, 'GW', NULL);
INSERT INTO `country` VALUES (85, 'GNQ', 'Equatorial Guinea', 'Africa', 'Central Africa', 28051, 1968, 453000, 53.6, 'Guinea Ecuatorial', 'Republic', 2972, 'GQ', NULL);
INSERT INTO `country` VALUES (86, 'GRC', 'Greece', 'Europe', 'Southern Europe', 131626, 1830, 10545700, 78.4, 'Elláda', 'Republic', 2401, 'GR', NULL);
INSERT INTO `country` VALUES (87, 'GRD', 'Grenada', 'North America', 'Caribbean', 344, 1974, 94000, 64.5, 'Grenada', 'Constitutional Monarchy', 916, 'GD', NULL);
INSERT INTO `country` VALUES (88, 'GRL', 'Greenland', 'North America', 'North America', 2166090, NULL, 56000, 68.1, 'Kalaallit Nunaat/Grønland', 'Part of Denmark', 917, 'GL', NULL);
INSERT INTO `country` VALUES (89, 'GTM', 'Guatemala', 'North America', 'Central America', 108889, 1821, 11385000, 66.2, 'Guatemala', 'Republic', 922, 'GT', NULL);
INSERT INTO `country` VALUES (90, 'GUF', 'French Guiana', 'South America', 'South America', 90000, NULL, 181000, 76.1, 'Guyane française', 'Overseas Department of France', 3014, 'GF', NULL);
INSERT INTO `country` VALUES (91, 'GUM', 'Guam', 'Oceania', 'Micronesia', 549, NULL, 168000, 77.8, 'Guam', 'US Territory', 921, 'GU', NULL);
INSERT INTO `country` VALUES (92, 'GUY', 'Guyana', 'South America', 'South America', 214969, 1966, 861000, 64, 'Guyana', 'Republic', 928, 'GY', NULL);
INSERT INTO `country` VALUES (93, 'HKG', 'Hong Kong', 'Asia', 'Eastern Asia', 1075, NULL, 6782000, 79.5, 'Xianggang/Hong Kong', 'Special Administrative Region of China', 937, 'HK', NULL);
INSERT INTO `country` VALUES (94, 'HMD', 'Heard Island and McDonald Islands', 'Antarctica', 'Antarctica', 359, NULL, 0, NULL, 'Heard and McDonald Islands', 'Territory of Australia', NULL, 'HM', NULL);
INSERT INTO `country` VALUES (95, 'HND', 'Honduras', 'North America', 'Central America', 112088, 1838, 6485000, 69.9, 'Honduras', 'Republic', 933, 'HN', NULL);
INSERT INTO `country` VALUES (96, 'HRV', 'Croatia', 'Europe', 'Southern Europe', 56538, 1991, 4473000, 73.7, 'Hrvatska', 'Republic', 2409, 'HR', NULL);
INSERT INTO `country` VALUES (97, 'HTI', 'Haiti', 'North America', 'Caribbean', 27750, 1804, 8222000, 49.2, 'Haïti/Dayti', 'Republic', 929, 'HT', NULL);
INSERT INTO `country` VALUES (98, 'HUN', 'Hungary', 'Europe', 'Eastern Europe', 93030, 1918, 10043200, 71.4, 'Magyarország', 'Republic', 3483, 'HU', NULL);
INSERT INTO `country` VALUES (99, 'IDN', 'Indonesia', 'Asia', 'Southeast Asia', 1904569, 1945, 212107000, 68, 'Indonesia', 'Republic', 939, 'ID', NULL);
INSERT INTO `country` VALUES (100, 'IND', 'India', 'Asia', 'Southern and Central Asia', 3287263, 1947, 1013662000, 62.5, 'Bharat/India', 'Federal Republic', 1109, 'IN', NULL);
INSERT INTO `country` VALUES (101, 'IOT', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', 78, NULL, 0, NULL, 'British Indian Ocean Territory', 'Dependent Territory of the UK', NULL, 'IO', NULL);
INSERT INTO `country` VALUES (102, 'IRL', 'Ireland', 'Europe', 'British Islands', 70273, 1921, 3775100, 76.8, 'Ireland/Éire', 'Republic', 1447, 'IE', NULL);
INSERT INTO `country` VALUES (103, 'IRN', 'Iran', 'Asia', 'Southern and Central Asia', 1648195, 1906, 67702000, 69.7, 'Iran', 'Islamic Republic', 1380, 'IR', NULL);
INSERT INTO `country` VALUES (104, 'IRQ', 'Iraq', 'Asia', 'Middle East', 438317, 1932, 23115000, 66.5, 'Al-´Iraq', 'Republic', 1365, 'IQ', NULL);
INSERT INTO `country` VALUES (105, 'ISL', 'Iceland', 'Europe', 'Nordic Countries', 103000, 1944, 279000, 79.4, 'Ísland', 'Republic', 1449, 'IS', NULL);
INSERT INTO `country` VALUES (106, 'ISR', 'Israel', 'Asia', 'Middle East', 21056, 1948, 6217000, 78.6, 'Yisra’el/Isra’il', 'Republic', 1450, 'IL', NULL);
INSERT INTO `country` VALUES (107, 'ITA', 'Italy', 'Europe', 'Southern Europe', 301316, 1861, 57680000, 79, 'Italia', 'Republic', 1464, 'IT', NULL);
INSERT INTO `country` VALUES (108, 'JAM', 'Jamaica', 'North America', 'Caribbean', 10990, 1962, 2583000, 75.2, 'Jamaica', 'Constitutional Monarchy', 1530, 'JM', NULL);
INSERT INTO `country` VALUES (109, 'JOR', 'Jordan', 'Asia', 'Middle East', 88946, 1946, 5083000, 77.4, 'Al-Urdunn', 'Constitutional Monarchy', 1786, 'JO', NULL);
INSERT INTO `country` VALUES (110, 'JPN', 'Japan', 'Asia', 'Eastern Asia', 377829, -660, 126714000, 80.7, 'Nihon/Nippon', 'Constitutional Monarchy', 1532, 'JP', NULL);
INSERT INTO `country` VALUES (111, 'KAZ', 'Kazakstan', 'Asia', 'Southern and Central Asia', 2724900, 1991, 16223000, 63.2, 'Qazaqstan', 'Republic', 1864, 'KZ', NULL);
INSERT INTO `country` VALUES (112, 'KEN', 'Kenya', 'Africa', 'Eastern Africa', 580367, 1963, 30080000, 48, 'Kenya', 'Republic', 1881, 'KE', NULL);
INSERT INTO `country` VALUES (113, 'KGZ', 'Kyrgyzstan', 'Asia', 'Southern and Central Asia', 199900, 1991, 4699000, 63.4, 'Kyrgyzstan', 'Republic', 2253, 'KG', NULL);
INSERT INTO `country` VALUES (114, 'KHM', 'Cambodia', 'Asia', 'Southeast Asia', 181035, 1953, 11168000, 56.5, 'Kâmpuchéa', 'Constitutional Monarchy', 1800, 'KH', NULL);
INSERT INTO `country` VALUES (115, 'KIR', 'Kiribati', 'Oceania', 'Micronesia', 726, 1979, 83000, 59.8, 'Kiribati', 'Republic', 2256, 'KI', NULL);
INSERT INTO `country` VALUES (116, 'KNA', 'Saint Kitts and Nevis', 'North America', 'Caribbean', 261, 1983, 38000, 70.7, 'Saint Kitts and Nevis', 'Constitutional Monarchy', 3064, 'KN', NULL);
INSERT INTO `country` VALUES (117, 'KOR', 'South Korea', 'Asia', 'Eastern Asia', 99434, 1948, 46844000, 74.4, 'Taehan Min’guk (Namhan)', 'Republic', 2331, 'KR', NULL);
INSERT INTO `country` VALUES (118, 'KWT', 'Kuwait', 'Asia', 'Middle East', 17818, 1961, 1972000, 76.1, 'Al-Kuwayt', 'Constitutional Monarchy (Emirate)', 2429, 'KW', NULL);
INSERT INTO `country` VALUES (119, 'LAO', 'Laos', 'Asia', 'Southeast Asia', 236800, 1953, 5433000, 53.1, 'Lao', 'Republic', 2432, 'LA', NULL);
INSERT INTO `country` VALUES (120, 'LBN', 'Lebanon', 'Asia', 'Middle East', 10400, 1941, 3282000, 71.3, 'Lubnan', 'Republic', 2438, 'LB', NULL);
INSERT INTO `country` VALUES (121, 'LBR', 'Liberia', 'Africa', 'Western Africa', 111369, 1847, 3154000, 51, 'Liberia', 'Republic', 2440, 'LR', NULL);
INSERT INTO `country` VALUES (122, 'LBY', 'Libyan Arab Jamahiriya', 'Africa', 'Northern Africa', 1759540, 1951, 5605000, 75.5, 'Libiya', 'Socialistic State', 2441, 'LY', NULL);
INSERT INTO `country` VALUES (123, 'LCA', 'Saint Lucia', 'North America', 'Caribbean', 622, 1979, 154000, 72.3, 'Saint Lucia', 'Constitutional Monarchy', 3065, 'LC', NULL);
INSERT INTO `country` VALUES (124, 'LIE', 'Liechtenstein', 'Europe', 'Western Europe', 160, 1806, 32300, 78.8, 'Liechtenstein', 'Constitutional Monarchy', 2446, 'LI', NULL);
INSERT INTO `country` VALUES (125, 'LKA', 'Sri Lanka', 'Asia', 'Southern and Central Asia', 65610, 1948, 18827000, 71.8, 'Sri Lanka/Ilankai', 'Republic', 3217, 'LK', NULL);
INSERT INTO `country` VALUES (126, 'LSO', 'Lesotho', 'Africa', 'Southern Africa', 30355, 1966, 2153000, 50.8, 'Lesotho', 'Constitutional Monarchy', 2437, 'LS', NULL);
INSERT INTO `country` VALUES (127, 'LTU', 'Lithuania', 'Europe', 'Baltic Countries', 65301, 1991, 3698500, 69.1, 'Lietuva', 'Republic', 2447, 'LT', NULL);
INSERT INTO `country` VALUES (128, 'LUX', 'Luxembourg', 'Europe', 'Western Europe', 2586, 1867, 435700, 77.1, 'Luxembourg/Lëtzebuerg', 'Constitutional Monarchy', 2452, 'LU', NULL);
INSERT INTO `country` VALUES (129, 'LVA', 'Latvia', 'Europe', 'Baltic Countries', 64589, 1991, 2424200, 68.4, 'Latvija', 'Republic', 2434, 'LV', NULL);
INSERT INTO `country` VALUES (130, 'MAC', 'Macao', 'Asia', 'Eastern Asia', 18, NULL, 473000, 81.6, 'Macau/Aomen', 'Special Administrative Region of China', 2454, 'MO', NULL);
INSERT INTO `country` VALUES (131, 'MAR', 'Morocco', 'Africa', 'Northern Africa', 446550, 1956, 28351000, 69.1, 'Al-Maghrib', 'Constitutional Monarchy', 2486, 'MA', NULL);
INSERT INTO `country` VALUES (132, 'MCO', 'Monaco', 'Europe', 'Western Europe', 2, 1861, 34000, 78.8, 'Monaco', 'Constitutional Monarchy', 2695, 'MC', NULL);
INSERT INTO `country` VALUES (133, 'MDA', 'Moldova', 'Europe', 'Eastern Europe', 33851, 1991, 4380000, 64.5, 'Moldova', 'Republic', 2690, 'MD', NULL);
INSERT INTO `country` VALUES (134, 'MDG', 'Madagascar', 'Africa', 'Eastern Africa', 587041, 1960, 15942000, 55, 'Madagasikara/Madagascar', 'Federal Republic', 2455, 'MG', NULL);
INSERT INTO `country` VALUES (135, 'MDV', 'Maldives', 'Asia', 'Southern and Central Asia', 298, 1965, 286000, 62.2, 'Dhivehi Raajje/Maldives', 'Republic', 2463, 'MV', NULL);
INSERT INTO `country` VALUES (136, 'MEX', 'Mexico', 'North America', 'Central America', 1958201, 1810, 98881000, 71.5, 'México', 'Federal Republic', 2515, 'MX', NULL);
INSERT INTO `country` VALUES (137, 'MHL', 'Marshall Islands', 'Oceania', 'Micronesia', 181, 1990, 64000, 65.5, 'Marshall Islands/Majol', 'Republic', 2507, 'MH', NULL);
INSERT INTO `country` VALUES (138, 'MKD', 'Macedonia', 'Europe', 'Southern Europe', 25713, 1991, 2024000, 73.8, 'Makedonija', 'Republic', 2460, 'MK', NULL);
INSERT INTO `country` VALUES (139, 'MLI', 'Mali', 'Africa', 'Western Africa', 1240192, 1960, 11234000, 46.7, 'Mali', 'Republic', 2482, 'ML', NULL);
INSERT INTO `country` VALUES (140, 'MLT', 'Malta', 'Europe', 'Southern Europe', 316, 1964, 380200, 77.9, 'Malta', 'Republic', 2484, 'MT', NULL);
INSERT INTO `country` VALUES (141, 'MMR', 'Myanmar', 'Asia', 'Southeast Asia', 676578, 1948, 45611000, 54.9, 'Myanma Pye', 'Republic', 2710, 'MM', NULL);
INSERT INTO `country` VALUES (142, 'MNG', 'Mongolia', 'Asia', 'Eastern Asia', 1566500, 1921, 2662000, 67.3, 'Mongol Uls', 'Republic', 2696, 'MN', NULL);
INSERT INTO `country` VALUES (143, 'MNP', 'Northern Mariana Islands', 'Oceania', 'Micronesia', 464, NULL, 78000, 75.5, 'Northern Mariana Islands', 'Commonwealth of the US', 2913, 'MP', NULL);
INSERT INTO `country` VALUES (144, 'MOZ', 'Mozambique', 'Africa', 'Eastern Africa', 801590, 1975, 19680000, 37.5, 'Moçambique', 'Republic', 2698, 'MZ', NULL);
INSERT INTO `country` VALUES (145, 'MRT', 'Mauritania', 'Africa', 'Western Africa', 1025520, 1960, 2670000, 50.8, 'Muritaniya/Mauritanie', 'Republic', 2509, 'MR', NULL);
INSERT INTO `country` VALUES (146, 'MSR', 'Montserrat', 'North America', 'Caribbean', 102, NULL, 11000, 78, 'Montserrat', 'Dependent Territory of the UK', 2697, 'MS', NULL);
INSERT INTO `country` VALUES (147, 'MTQ', 'Martinique', 'North America', 'Caribbean', 1102, NULL, 395000, 78.3, 'Martinique', 'Overseas Department of France', 2508, 'MQ', NULL);
INSERT INTO `country` VALUES (148, 'MUS', 'Mauritius', 'Africa', 'Eastern Africa', 2040, 1968, 1158000, 71, 'Mauritius', 'Republic', 2511, 'MU', NULL);
INSERT INTO `country` VALUES (149, 'MWI', 'Malawi', 'Africa', 'Eastern Africa', 118484, 1964, 10925000, 37.6, 'Malawi', 'Republic', 2462, 'MW', NULL);
INSERT INTO `country` VALUES (150, 'MYS', 'Malaysia', 'Asia', 'Southeast Asia', 329758, 1957, 22244000, 70.8, 'Malaysia', 'Constitutional Monarchy, Federation', 2464, 'MY', NULL);
INSERT INTO `country` VALUES (151, 'MYT', 'Mayotte', 'Africa', 'Eastern Africa', 373, NULL, 149000, 59.5, 'Mayotte', 'Territorial Collectivity of France', 2514, 'YT', NULL);
INSERT INTO `country` VALUES (152, 'NAM', 'Namibia', 'Africa', 'Southern Africa', 824292, 1990, 1726000, 42.5, 'Namibia', 'Republic', 2726, 'NA', NULL);
INSERT INTO `country` VALUES (153, 'NCL', 'New Caledonia', 'Oceania', 'Melanesia', 18575, NULL, 214000, 72.8, 'Nouvelle-Calédonie', 'Nonmetropolitan Territory of France', 3493, 'NC', NULL);
INSERT INTO `country` VALUES (154, 'NER', 'Niger', 'Africa', 'Western Africa', 1267000, 1960, 10730000, 41.3, 'Niger', 'Republic', 2738, 'NE', NULL);
INSERT INTO `country` VALUES (155, 'NFK', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', 36, NULL, 2000, NULL, 'Norfolk Island', 'Territory of Australia', 2806, 'NF', NULL);
INSERT INTO `country` VALUES (156, 'NGA', 'Nigeria', 'Africa', 'Western Africa', 923768, 1960, 111506000, 51.6, 'Nigeria', 'Federal Republic', 2754, 'NG', NULL);
INSERT INTO `country` VALUES (157, 'NIC', 'Nicaragua', 'North America', 'Central America', 130000, 1838, 5074000, 68.7, 'Nicaragua', 'Republic', 2734, 'NI', NULL);
INSERT INTO `country` VALUES (158, 'NIU', 'Niue', 'Oceania', 'Polynesia', 260, NULL, 2000, NULL, 'Niue', 'Nonmetropolitan Territory of New Zealand', 2805, 'NU', NULL);
INSERT INTO `country` VALUES (159, 'NLD', 'Netherlands', 'Europe', 'Western Europe', 41526, 1581, 15864000, 78.3, 'Nederland', 'Constitutional Monarchy', 5, 'NL', NULL);
INSERT INTO `country` VALUES (160, 'NOR', 'Norway', 'Europe', 'Nordic Countries', 323877, 1905, 4478500, 78.7, 'Norge', 'Constitutional Monarchy', 2807, 'NO', NULL);
INSERT INTO `country` VALUES (161, 'NPL', 'Nepal', 'Asia', 'Southern and Central Asia', 147181, 1769, 23930000, 57.8, 'Nepal', 'Constitutional Monarchy', 2729, 'NP', NULL);
INSERT INTO `country` VALUES (162, 'NRU', 'Nauru', 'Oceania', 'Micronesia', 21, 1968, 12000, 60.8, 'Naoero/Nauru', 'Republic', 2728, 'NR', NULL);
INSERT INTO `country` VALUES (163, 'NZL', 'New Zealand', 'Oceania', 'Australia and New Zealand', 270534, 1907, 3862000, 77.8, 'New Zealand/Aotearoa', 'Constitutional Monarchy', 3499, 'NZ', NULL);
INSERT INTO `country` VALUES (164, 'OMN', 'Oman', 'Asia', 'Middle East', 309500, 1951, 2542000, 71.8, '´Uman', 'Monarchy (Sultanate)', 2821, 'OM', NULL);
INSERT INTO `country` VALUES (165, 'PAK', 'Pakistan', 'Asia', 'Southern and Central Asia', 796095, 1947, 156483000, 61.1, 'Pakistan', 'Republic', 2831, 'PK', NULL);
INSERT INTO `country` VALUES (166, 'PAN', 'Panama', 'North America', 'Central America', 75517, 1903, 2856000, 75.5, 'Panamá', 'Republic', 2882, 'PA', NULL);
INSERT INTO `country` VALUES (167, 'PCN', 'Pitcairn', 'Oceania', 'Polynesia', 49, NULL, 50, NULL, 'Pitcairn', 'Dependent Territory of the UK', 2912, 'PN', NULL);
INSERT INTO `country` VALUES (168, 'PER', 'Peru', 'South America', 'South America', 1285216, 1821, 25662000, 70, 'Perú/Piruw', 'Republic', 2890, 'PE', NULL);
INSERT INTO `country` VALUES (169, 'PHL', 'Philippines', 'Asia', 'Southeast Asia', 300000, 1946, 75967000, 67.5, 'Pilipinas', 'Republic', 766, 'PH', NULL);
INSERT INTO `country` VALUES (170, 'PLW', 'Palau', 'Oceania', 'Micronesia', 459, 1994, 19000, 68.6, 'Belau/Palau', 'Republic', 2881, 'PW', NULL);
INSERT INTO `country` VALUES (171, 'PNG', 'Papua New Guinea', 'Oceania', 'Melanesia', 462840, 1975, 4807000, 63.1, 'Papua New Guinea/Papua Niugini', 'Constitutional Monarchy', 2884, 'PG', NULL);
INSERT INTO `country` VALUES (172, 'POL', 'Poland', 'Europe', 'Eastern Europe', 323250, 1918, 38653600, 73.2, 'Polska', 'Republic', 2928, 'PL', NULL);
INSERT INTO `country` VALUES (173, 'PRI', 'Puerto Rico', 'North America', 'Caribbean', 8875, NULL, 3869000, 75.6, 'Puerto Rico', 'Commonwealth of the US', 2919, 'PR', NULL);
INSERT INTO `country` VALUES (174, 'PRK', 'North Korea', 'Asia', 'Eastern Asia', 120538, 1948, 24039000, 70.7, 'Choson Minjujuui In´min Konghwaguk (Bukhan)', 'Socialistic Republic', 2318, 'KP', NULL);
INSERT INTO `country` VALUES (175, 'PRT', 'Portugal', 'Europe', 'Southern Europe', 91982, 1143, 9997600, 75.8, 'Portugal', 'Republic', 2914, 'PT', NULL);
INSERT INTO `country` VALUES (176, 'PRY', 'Paraguay', 'South America', 'South America', 406752, 1811, 5496000, 73.7, 'Paraguay', 'Republic', 2885, 'PY', NULL);
INSERT INTO `country` VALUES (177, 'PSE', 'Palestine', 'Asia', 'Middle East', 6257, NULL, 3101000, 71.4, 'Filastin', 'Autonomous Area', 4074, 'PS', NULL);
INSERT INTO `country` VALUES (178, 'PYF', 'French Polynesia', 'Oceania', 'Polynesia', 4000, NULL, 235000, 74.8, 'Polynésie française', 'Nonmetropolitan Territory of France', 3016, 'PF', NULL);
INSERT INTO `country` VALUES (179, 'QAT', 'Qatar', 'Asia', 'Middle East', 11000, 1971, 599000, 72.4, 'Qatar', 'Monarchy', 2973, 'QA', NULL);
INSERT INTO `country` VALUES (180, 'REU', 'Réunion', 'Africa', 'Eastern Africa', 2510, NULL, 699000, 72.7, 'Réunion', 'Overseas Department of France', 3017, 'RE', NULL);
INSERT INTO `country` VALUES (181, 'ROM', 'Romania', 'Europe', 'Eastern Europe', 238391, 1878, 22455500, 69.9, 'România', 'Republic', 3018, 'RO', NULL);
INSERT INTO `country` VALUES (182, 'RUS', 'Russian Federation', 'Europe', 'Eastern Europe', 17075400, 1991, 146934000, 67.2, 'Rossija', 'Federal Republic', 3580, 'RU', NULL);
INSERT INTO `country` VALUES (183, 'RWA', 'Rwanda', 'Africa', 'Eastern Africa', 26338, 1962, 7733000, 39.3, 'Rwanda/Urwanda', 'Republic', 3047, 'RW', NULL);
INSERT INTO `country` VALUES (184, 'SAU', 'Saudi Arabia', 'Asia', 'Middle East', 2149690, 1932, 21607000, 67.8, 'Al-´Arabiya as-Sa´udiya', 'Monarchy', 3173, 'SA', NULL);
INSERT INTO `country` VALUES (185, 'SDN', 'Sudan', 'Africa', 'Northern Africa', 2505813, 1956, 29490000, 56.6, 'As-Sudan', 'Islamic Republic', 3225, 'SD', NULL);
INSERT INTO `country` VALUES (186, 'SEN', 'Senegal', 'Africa', 'Western Africa', 196722, 1960, 9481000, 62.2, 'Sénégal/Sounougal', 'Republic', 3198, 'SN', NULL);
INSERT INTO `country` VALUES (187, 'SGP', 'Singapore', 'Asia', 'Southeast Asia', 618, 1965, 3567000, 80.1, 'Singapore/Singapura/Xinjiapo/Singapur', 'Republic', 3208, 'SG', NULL);
INSERT INTO `country` VALUES (188, 'SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 'Antarctica', 3903, NULL, 0, NULL, 'South Georgia and the South Sandwich Islands', 'Dependent Territory of the UK', NULL, 'GS', NULL);
INSERT INTO `country` VALUES (189, 'SHN', 'Saint Helena', 'Africa', 'Western Africa', 314, NULL, 6000, 76.8, 'Saint Helena', 'Dependent Territory of the UK', 3063, 'SH', NULL);
INSERT INTO `country` VALUES (190, 'SJM', 'Svalbard and Jan Mayen', 'Europe', 'Nordic Countries', 62422, NULL, 3200, NULL, 'Svalbard og Jan Mayen', 'Dependent Territory of Norway', 938, 'SJ', NULL);
INSERT INTO `country` VALUES (191, 'SLB', 'Solomon Islands', 'Oceania', 'Melanesia', 28896, 1978, 444000, 71.3, 'Solomon Islands', 'Constitutional Monarchy', 3161, 'SB', NULL);
INSERT INTO `country` VALUES (192, 'SLE', 'Sierra Leone', 'Africa', 'Western Africa', 71740, 1961, 4854000, 45.3, 'Sierra Leone', 'Republic', 3207, 'SL', NULL);
INSERT INTO `country` VALUES (193, 'SLV', 'El Salvador', 'North America', 'Central America', 21041, 1841, 6276000, 69.7, 'El Salvador', 'Republic', 645, 'SV', NULL);
INSERT INTO `country` VALUES (194, 'SMR', 'San Marino', 'Europe', 'Southern Europe', 61, 885, 27000, 81.1, 'San Marino', 'Republic', 3171, 'SM', NULL);
INSERT INTO `country` VALUES (195, 'SOM', 'Somalia', 'Africa', 'Eastern Africa', 637657, 1960, 10097000, 46.2, 'Soomaaliya', 'Republic', 3214, 'SO', NULL);
INSERT INTO `country` VALUES (196, 'SPM', 'Saint Pierre and Miquelon', 'North America', 'North America', 242, NULL, 7000, 77.6, 'Saint-Pierre-et-Miquelon', 'Territorial Collectivity of France', 3067, 'PM', NULL);
INSERT INTO `country` VALUES (197, 'STP', 'Sao Tome and Principe', 'Africa', 'Central Africa', 964, 1975, 147000, 65.3, 'São Tomé e Príncipe', 'Republic', 3172, 'ST', NULL);
INSERT INTO `country` VALUES (198, 'SUR', 'Suriname', 'South America', 'South America', 163265, 1975, 417000, 71.4, 'Suriname', 'Republic', 3243, 'SR', NULL);
INSERT INTO `country` VALUES (199, 'SVK', 'Slovakia', 'Europe', 'Eastern Europe', 49012, 1993, 5398700, 73.7, 'Slovensko', 'Republic', 3209, 'SK', NULL);
INSERT INTO `country` VALUES (200, 'SVN', 'Slovenia', 'Europe', 'Southern Europe', 20256, 1991, 1987800, 74.9, 'Slovenija', 'Republic', 3212, 'SI', NULL);
INSERT INTO `country` VALUES (201, 'SWE', 'Sweden', 'Europe', 'Nordic Countries', 449964, 836, 8861400, 79.6, 'Sverige', 'Constitutional Monarchy', 3048, 'SE', NULL);
INSERT INTO `country` VALUES (202, 'SWZ', 'Swaziland', 'Africa', 'Southern Africa', 17364, 1968, 1008000, 40.4, 'kaNgwane', 'Monarchy', 3244, 'SZ', NULL);
INSERT INTO `country` VALUES (203, 'SYC', 'Seychelles', 'Africa', 'Eastern Africa', 455, 1976, 77000, 70.4, 'Sesel/Seychelles', 'Republic', 3206, 'SC', NULL);
INSERT INTO `country` VALUES (204, 'SYR', 'Syria', 'Asia', 'Middle East', 185180, 1941, 16125000, 68.5, 'Suriya', 'Republic', 3250, 'SY', NULL);
INSERT INTO `country` VALUES (205, 'TCA', 'Turks and Caicos Islands', 'North America', 'Caribbean', 430, NULL, 17000, 73.3, 'The Turks and Caicos Islands', 'Dependent Territory of the UK', 3423, 'TC', NULL);
INSERT INTO `country` VALUES (206, 'TCD', 'Chad', 'Africa', 'Central Africa', 1284000, 1960, 7651000, 50.5, 'Tchad/Tshad', 'Republic', 3337, 'TD', NULL);
INSERT INTO `country` VALUES (207, 'TGO', 'Togo', 'Africa', 'Western Africa', 56785, 1960, 4629000, 54.7, 'Togo', 'Republic', 3332, 'TG', NULL);
INSERT INTO `country` VALUES (208, 'THA', 'Thailand', 'Asia', 'Southeast Asia', 513115, 1350, 61399000, 68.6, 'Prathet Thai', 'Constitutional Monarchy', 3320, 'TH', NULL);
INSERT INTO `country` VALUES (209, 'TJK', 'Tajikistan', 'Asia', 'Southern and Central Asia', 143100, 1991, 6188000, 64.1, 'Toçikiston', 'Republic', 3261, 'TJ', NULL);
INSERT INTO `country` VALUES (210, 'TKL', 'Tokelau', 'Oceania', 'Polynesia', 12, NULL, 2000, NULL, 'Tokelau', 'Nonmetropolitan Territory of New Zealand', 3333, 'TK', NULL);
INSERT INTO `country` VALUES (211, 'TKM', 'Turkmenistan', 'Asia', 'Southern and Central Asia', 488100, 1991, 4459000, 60.9, 'Türkmenostan', 'Republic', 3419, 'TM', NULL);
INSERT INTO `country` VALUES (212, 'TMP', 'East Timor', 'Asia', 'Southeast Asia', 14874, NULL, 885000, 46, 'Timor Timur', 'Administrated by the UN', 1522, 'TP', NULL);
INSERT INTO `country` VALUES (213, 'TON', 'Tonga', 'Oceania', 'Polynesia', 650, 1970, 99000, 67.9, 'Tonga', 'Monarchy', 3334, 'TO', NULL);
INSERT INTO `country` VALUES (214, 'TTO', 'Trinidad and Tobago', 'North America', 'Caribbean', 5130, 1962, 1295000, 68, 'Trinidad and Tobago', 'Republic', 3336, 'TT', NULL);
INSERT INTO `country` VALUES (215, 'TUN', 'Tunisia', 'Africa', 'Northern Africa', 163610, 1956, 9586000, 73.7, 'Tunis/Tunisie', 'Republic', 3349, 'TN', NULL);
INSERT INTO `country` VALUES (216, 'TUR', 'Turkey', 'Asia', 'Middle East', 774815, 1923, 66591000, 71, 'Türkiye', 'Republic', 3358, 'TR', NULL);
INSERT INTO `country` VALUES (217, 'TUV', 'Tuvalu', 'Oceania', 'Polynesia', 26, 1978, 12000, 66.3, 'Tuvalu', 'Constitutional Monarchy', 3424, 'TV', NULL);
INSERT INTO `country` VALUES (218, 'TWN', 'Taiwan', 'Asia', 'Eastern Asia', 36188, 1945, 22256000, 76.4, 'T’ai-wan', 'Republic', 3263, 'TW', NULL);
INSERT INTO `country` VALUES (219, 'TZA', 'Tanzania', 'Africa', 'Eastern Africa', 883749, 1961, 33517000, 52.3, 'Tanzania', 'Republic', 3306, 'TZ', NULL);
INSERT INTO `country` VALUES (220, 'UGA', 'Uganda', 'Africa', 'Eastern Africa', 241038, 1962, 21778000, 42.9, 'Uganda', 'Republic', 3425, 'UG', NULL);
INSERT INTO `country` VALUES (221, 'UKR', 'Ukraine', 'Europe', 'Eastern Europe', 603700, 1991, 50456000, 66, 'Ukrajina', 'Republic', 3426, 'UA', NULL);
INSERT INTO `country` VALUES (222, 'UMI', 'United States Minor Outlying Islands', 'Oceania', 'Micronesia/Caribbean', 16, NULL, 0, NULL, 'United States Minor Outlying Islands', 'Dependent Territory of the US', NULL, 'UM', NULL);
INSERT INTO `country` VALUES (223, 'URY', 'Uruguay', 'South America', 'South America', 175016, 1828, 3337000, 75.2, 'Uruguay', 'Republic', 3492, 'UY', NULL);
INSERT INTO `country` VALUES (224, 'USA', 'United States', 'North America', 'North America', 9363520, 1776, 278357000, 77.1, 'United States', 'Federal Republic', 3813, 'US', NULL);
INSERT INTO `country` VALUES (225, 'UZB', 'Uzbekistan', 'Asia', 'Southern and Central Asia', 447400, 1991, 24318000, 63.7, 'Uzbekiston', 'Republic', 3503, 'UZ', NULL);
INSERT INTO `country` VALUES (226, 'VAT', 'Holy See (Vatican City State)', 'Europe', 'Southern Europe', 0, 1929, 1000, NULL, 'Santa Sede/Città del Vaticano', 'Independent Church State', 3538, 'VA', NULL);
INSERT INTO `country` VALUES (227, 'VCT', 'Saint Vincent and the Grenadines', 'North America', 'Caribbean', 388, 1979, 114000, 72.3, 'Saint Vincent and the Grenadines', 'Constitutional Monarchy', 3066, 'VC', NULL);
INSERT INTO `country` VALUES (228, 'VEN', 'Venezuela', 'South America', 'South America', 912050, 1811, 24170000, 73.1, 'Venezuela', 'Federal Republic', 3539, 'VE', NULL);
INSERT INTO `country` VALUES (229, 'VGB', 'Virgin Islands, British', 'North America', 'Caribbean', 151, NULL, 21000, 75.4, 'British Virgin Islands', 'Dependent Territory of the UK', 537, 'VG', NULL);
INSERT INTO `country` VALUES (230, 'VIR', 'Virgin Islands, U.S.', 'North America', 'Caribbean', 347, NULL, 93000, 78.1, 'Virgin Islands of the United States', 'US Territory', 4067, 'VI', NULL);
INSERT INTO `country` VALUES (231, 'VNM', 'Vietnam', 'Asia', 'Southeast Asia', 331689, 1945, 79832000, 69.3, 'Viêt Nam', 'Socialistic Republic', 3770, 'VN', NULL);
INSERT INTO `country` VALUES (232, 'VUT', 'Vanuatu', 'Oceania', 'Melanesia', 12189, 1980, 190000, 60.6, 'Vanuatu', 'Republic', 3537, 'VU', NULL);
INSERT INTO `country` VALUES (233, 'WLF', 'Wallis and Futuna', 'Oceania', 'Polynesia', 200, NULL, 15000, NULL, 'Wallis-et-Futuna', 'Nonmetropolitan Territory of France', 3536, 'WF', NULL);
INSERT INTO `country` VALUES (234, 'WSM', 'Samoa', 'Oceania', 'Polynesia', 2831, 1962, 180000, 69.2, 'Samoa', 'Parlementary Monarchy', 3169, 'WS', NULL);
INSERT INTO `country` VALUES (235, 'YEM', 'Yemen', 'Asia', 'Middle East', 527968, 1918, 18112000, 59.8, 'Al-Yaman', 'Republic', 1780, 'YE', NULL);
INSERT INTO `country` VALUES (236, 'YUG', 'Yugoslavia', 'Europe', 'Southern Europe', 102173, 1918, 10640000, 72.4, 'Jugoslavija', 'Federal Republic', 1792, 'YU', NULL);
INSERT INTO `country` VALUES (237, 'ZAF', 'South Africa', 'Africa', 'Southern Africa', 1221037, 1910, 40377000, 51.1, 'South Africa', 'Republic', 716, 'ZA', NULL);
INSERT INTO `country` VALUES (238, 'ZMB', 'Zambia', 'Africa', 'Eastern Africa', 752618, 1964, 9169000, 37.2, 'Zambia', 'Republic', 3162, 'ZM', NULL);
INSERT INTO `country` VALUES (239, 'ZWE', 'Zimbabwe', 'Africa', 'Eastern Africa', 390757, 1980, 11669000, 37.8, 'Zimbabwe', 'Republic', 4068, 'ZW', NULL);

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, 'Mercadeo', 'Este módulo está diseñado para apoyar a las empresas en la creación de estrategias de mercadeo efectivas, impulsando la visibilidad de sus servicios en el mercado. Proporciona herramientas para la planificación de campañas, segmentación de audiencia, análisis de competencia y seguimiento de resultados, lo que facilita la toma de decisiones informadas para mejorar el posicionamiento y alcance de la empresa. Además, el módulo permite gestionar contenidos promocionales y medir el impacto de cada iniciativa en tiempo real, optimizando continuamente las acciones de mercadeo.', 1, 1, '2024-09-05 00:55:12', '2024-10-27 18:21:29');
INSERT INTO `course` VALUES (4, 'Logística', 'Este módulo está enfocado en optimizar los procesos logísticos de la empresa, mejorando la eficiencia en la gestión de inventarios, transporte y distribución de productos o servicios. A través de herramientas y estrategias específicas, el módulo facilita la planificación, monitoreo y control de las operaciones logísticas, permitiendo reducir costos, mejorar tiempos de entrega y asegurar una experiencia positiva para el cliente.', 1, 1, '2024-09-04 22:35:22', '2024-10-27 18:32:59');
INSERT INTO `course` VALUES (17, 'Ventas', 'Este módulo está diseñado para capacitar a las empresas en el desarrollo de estrategias de ventas efectivas que maximicen los ingresos y mejoren la relación con los clientes. A través de técnicas de ventas adaptadas al contexto actual, el módulo enseña a identificar oportunidades de negocio, cerrar ventas de manera efectiva y cultivar relaciones duraderas con los clientes. Se enfatiza el uso de herramientas digitales y la analítica para entender mejor el comportamiento del consumidor y optimizar el proceso de ventas.', 1, 1, '2024-10-22 18:35:43', '2024-10-27 18:38:30');
INSERT INTO `course` VALUES (18, 'Comercio Internacional', 'Este módulo se centra en proporcionar a las empresas las herramientas y conocimientos necesarios para operar en mercados globales. Abarca desde los principios fundamentales del comercio internacional hasta las estrategias específicas para la exportación e importación de bienes y servicios. Los participantes aprenderán a navegar por las regulaciones comerciales, entender las dinámicas de los mercados internacionales y desarrollar estrategias que impulsen el crecimiento global de su empresa.', 1, 1, '2024-10-23 21:51:26', '2024-10-27 18:44:10');
INSERT INTO `course` VALUES (22, 'Nuevo modulo', 'descripcion al nuevo modulo', 1, 1, '2024-11-18 15:50:11', '2024-11-18 15:50:11');

-- ----------------------------
-- Table structure for course_completion
-- ----------------------------
DROP TABLE IF EXISTS `course_completion`;
CREATE TABLE `course_completion`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `completed_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-course_completion-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-course_completion-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-course_completion-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-course_completion-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_completion
-- ----------------------------

-- ----------------------------
-- Table structure for course_feedback
-- ----------------------------
DROP TABLE IF EXISTS `course_feedback`;
CREATE TABLE `course_feedback`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-course_feedback-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-course_feedback-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-course_feedback-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-course_feedback-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for course_lesson
-- ----------------------------
DROP TABLE IF EXISTS `course_lesson`;
CREATE TABLE `course_lesson`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `course_module_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `order` int NULL DEFAULT 0,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-lesson-course_module_id`(`course_module_id` ASC) USING BTREE,
  INDEX `idx_lesson-course_id`(`course_id` ASC) USING BTREE,
  CONSTRAINT `fk-lesson-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk-lesson-course_module_id` FOREIGN KEY (`course_module_id`) REFERENCES `course_module` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_lesson
-- ----------------------------
INSERT INTO `course_lesson` VALUES (1, 1, 1, 'Introducción al Mercadeo en la Era Digital', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><figure class=\"image image_resized\" style=\"width:25%;\"><img style=\"aspect-ratio:4000/2252;\" src=\"http://localhost/sennova/appServiserAdmin/web/ckeditor/images/1702686459309.jpg\" width=\"4000\" height=\"2252\"></figure><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 11, '2024-09-28 08:35:03', '2024-11-05 20:37:12');
INSERT INTO `course_lesson` VALUES (2, 1, 1, 'Segmentación y Análisis de Audiencia', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-28 17:07:40', '2024-10-27 20:52:16');
INSERT INTO `course_lesson` VALUES (4, 1, 6, 'Marketing de Contenidos', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:49:53', '2024-10-27 20:52:16');
INSERT INTO `course_lesson` VALUES (5, 1, 6, 'Publicidad en Redes Sociales', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:50:19', '2024-10-27 20:52:17');
INSERT INTO `course_lesson` VALUES (6, 1, 6, 'Email Marketing y Automatización', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:53:04', '2024-10-27 20:52:18');
INSERT INTO `course_lesson` VALUES (7, 1, 18, 'Análisis de Métricas y KPIs', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:53:45', '2024-10-27 20:52:18');
INSERT INTO `course_lesson` VALUES (8, 1, 18, 'Herramientas de Seguimiento de Resultados', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:54:10', '2024-10-27 20:52:19');
INSERT INTO `course_lesson` VALUES (9, 1, 18, 'Optimización Continua y Mejora de Estrategias', '<h2>Estrategias de Mercadeo: Claves para el Éxito Empresarial</h2><p>El mercadeo es un componente esencial en el crecimiento y desarrollo de cualquier empresa. Las estrategias adecuadas pueden marcar la diferencia entre el éxito y el fracaso. A continuación, exploraremos algunas de las estrategias más efectivas en el mundo del mercadeo.</p><figure class=\"image\"><img style=\"aspect-ratio:600/400;\" src=\"https://placehold.co/600x400?text=Éxito+Empresarial\" width=\"600\" height=\"400\"></figure><h3>1. Marketing de Contenidos</h3><p>El marketing de contenidos implica crear y compartir contenido valioso para atraer y retener a un público definido. Esta estrategia no solo mejora el SEO, sino que también establece la autoridad de la marca.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=ZQqF0mIgIYA\">Cómo hacer Marketing de Contenidos</a></p><h3>2. Publicidad en Redes Sociales</h3><p>Las redes sociales son una herramienta poderosa para alcanzar a una audiencia masiva. Las empresas pueden utilizar anuncios pagados en plataformas como Facebook e Instagram para segmentar su mercado objetivo de manera efectiva.</p><h3>3. Email Marketing</h3><p>El email marketing sigue siendo una de las formas más efectivas de comunicación directa. A través de boletines informativos y ofertas personalizadas, las empresas pueden mantener a sus clientes informados y comprometidos.</p><p><strong>Video relacionado:</strong> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.youtube.com/watch?v=PLJ7_qrFdlo\">Estrategias de Email Marketing</a></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=dCqLLjM3BxE\"></oembed></figure><h2>Tabla de Estrategias de Mercadeo</h2><figure class=\"table\"><table><thead><tr><th>Estrategia</th><th>Descripción</th><th>Beneficios</th><th>Herramientas Recomendadas</th></tr></thead><tbody><tr><td>Marketing de Contenidos</td><td>Creación y distribución de contenido relevante</td><td>Mejora SEO y construye autoridad</td><td>WordPress, HubSpot</td></tr><tr><td>Publicidad en Redes Sociales</td><td>Anuncios pagados en plataformas sociales</td><td>Alcance masivo y segmentación</td><td>Facebook Ads, Instagram Ads</td></tr><tr><td>Email Marketing</td><td>Envío de correos electrónicos a clientes potenciales</td><td>Comunicación directa y personalizada</td><td>Mailchimp, Constant Contact</td></tr><tr><td>SEO (Optimización en Motores de Búsqueda)</td><td>Mejora de la visibilidad en motores de búsqueda</td><td>Aumenta el tráfico orgánico</td><td>Google Analytics, SEMrush</td></tr><tr><td>Marketing de Influencers</td><td>Colaboración con influencers para promocionar productos</td><td>Mayor confianza y visibilidad</td><td>BuzzSumo, HypeAuditor</td></tr></tbody></table></figure><h2>Conclusión</h2><p>Las estrategias de mercadeo son fundamentales para el crecimiento de cualquier negocio. Al implementar tácticas efectivas, las empresas pueden no solo aumentar sus ventas, sino también construir relaciones duraderas con sus clientes.</p>', NULL, NULL, 0, NULL, 1, '2024-09-29 18:54:32', '2024-10-27 20:52:20');
INSERT INTO `course_lesson` VALUES (14, 17, 19, 'Introducción a las Ventas en la Era Digital', '', NULL, NULL, 0, NULL, 1, '2024-10-22 20:34:02', '2024-10-27 18:41:28');
INSERT INTO `course_lesson` VALUES (15, 17, 19, 'Psicología del Consumidor y Comportamiento de Compra', '', NULL, NULL, 0, NULL, 1, '2024-10-22 20:34:25', '2024-10-27 18:41:54');
INSERT INTO `course_lesson` VALUES (18, 4, 8, 'Introducción a la Logística y su Rol en la Servitización', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:34:33', '2024-10-27 18:34:33');
INSERT INTO `course_lesson` VALUES (19, 4, 8, 'Cadena de Suministro: Componentes y Gestión Eficiente', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:34:42', '2024-10-27 18:34:42');
INSERT INTO `course_lesson` VALUES (20, 4, 9, 'Gestión de Inventarios', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:35:24', '2024-10-27 18:35:24');
INSERT INTO `course_lesson` VALUES (21, 4, 9, 'Planificación de Transporte y Distribución', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:36:47', '2024-10-27 18:36:47');
INSERT INTO `course_lesson` VALUES (22, 4, 9, 'Manejo de Almacenes y Centros de Distribución', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:36:54', '2024-10-27 18:36:54');
INSERT INTO `course_lesson` VALUES (23, 4, 10, 'Implementación de Tecnología en Logística', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:37:07', '2024-10-27 18:37:07');
INSERT INTO `course_lesson` VALUES (24, 4, 10, 'Indicadores de Desempeño (KPIs) Logísticos', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:37:14', '2024-10-27 18:37:14');
INSERT INTO `course_lesson` VALUES (25, 4, 10, 'Mejora Continua en Procesos Logísticos', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:37:21', '2024-10-27 18:37:21');
INSERT INTO `course_lesson` VALUES (26, 17, 20, 'Técnicas de Cierre de Ventas', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:07', '2024-10-27 18:42:07');
INSERT INTO `course_lesson` VALUES (27, 17, 20, 'Venta Consultiva y Relacional', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:14', '2024-10-27 18:42:14');
INSERT INTO `course_lesson` VALUES (28, 17, 20, 'Estrategias de Upselling y Cross-selling', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:22', '2024-10-27 18:42:22');
INSERT INTO `course_lesson` VALUES (29, 17, 23, 'Uso de CRM en la Gestión de Ventas', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:34', '2024-10-27 18:42:34');
INSERT INTO `course_lesson` VALUES (30, 17, 23, 'Análisis de Desempeño y KPIs de Ventas', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:40', '2024-10-27 18:42:40');
INSERT INTO `course_lesson` VALUES (31, 17, 23, 'Técnicas de Seguimiento y Fidelización de Clientes', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:42:46', '2024-10-27 18:42:46');
INSERT INTO `course_lesson` VALUES (32, 18, 26, 'Introducción al Comercio Internacional y su Importancia', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:11', '2024-10-27 18:53:11');
INSERT INTO `course_lesson` VALUES (33, 18, 26, 'Marco Legal y Normativo del Comercio Internacional', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:17', '2024-10-27 18:53:17');
INSERT INTO `course_lesson` VALUES (34, 18, 29, 'Proceso de Exportación: Pasos y Consideraciones', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:26', '2024-10-27 18:53:26');
INSERT INTO `course_lesson` VALUES (35, 18, 29, 'Importación de Bienes: Estrategias y Regulaciones', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:34', '2024-10-27 18:53:34');
INSERT INTO `course_lesson` VALUES (36, 18, 30, 'Análisis de Mercados Internacionales', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:44', '2024-10-27 18:53:44');
INSERT INTO `course_lesson` VALUES (37, 18, 30, 'Técnicas de Negociación en el Comercio Internacional', '', NULL, NULL, 0, 1, 1, '2024-10-27 18:53:50', '2024-10-27 18:53:50');

-- ----------------------------
-- Table structure for course_module
-- ----------------------------
DROP TABLE IF EXISTS `course_module`;
CREATE TABLE `course_module`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-course_module-course_id`(`course_id` ASC) USING BTREE,
  CONSTRAINT `fk-course_module-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_module
-- ----------------------------
INSERT INTO `course_module` VALUES (1, 1, 'Fundamentos de Mercadeo', 'Fundamentos de Mercadeo', 1, 1, '2024-09-04 21:55:31', '2024-10-27 18:23:37');
INSERT INTO `course_module` VALUES (6, 1, 'Estrategias de Mercadeo Digital', 'Estrategias de Mercadeo Digital', 1, 1, '2024-09-04 22:30:33', '2024-10-27 18:23:52');
INSERT INTO `course_module` VALUES (8, 4, 'Fundamentos de Logística', 'Fundamentos de Logística', 1, 1, '2024-09-29 18:26:39', '2024-10-27 18:33:44');
INSERT INTO `course_module` VALUES (9, 4, 'Estrategias de Optimización Logística', 'Estrategias de Optimización Logística', 1, 1, '2024-09-29 18:26:56', '2024-10-27 18:33:56');
INSERT INTO `course_module` VALUES (10, 4, 'Tecnologías y Evaluación en Logística', 'Tecnologías y Evaluación en Logística', 1, 1, '2024-09-29 18:27:14', '2024-10-27 18:34:06');
INSERT INTO `course_module` VALUES (18, 1, 'Evaluación y Optimización de Campañas', 'Evaluación y Optimización de Campañas', 1, 1, '2024-09-29 18:33:36', '2024-10-27 18:24:06');
INSERT INTO `course_module` VALUES (19, 17, 'Fundamentos de Ventas', 'Fundamentos de Ventas', 1, 1, '2024-10-22 18:36:16', '2024-10-27 18:38:54');
INSERT INTO `course_module` VALUES (20, 17, 'Estrategias de Ventas Efectivas', 'Estrategias de Ventas Efectivas', 1, 1, '2024-10-22 18:36:43', '2024-10-27 18:39:05');
INSERT INTO `course_module` VALUES (23, 17, 'Herramientas y Métricas de Ventas', 'Herramientas y Métricas de Ventas', 1, 1, '2024-10-27 18:41:05', '2024-10-27 18:41:05');
INSERT INTO `course_module` VALUES (26, 18, 'Fundamentos del Comercio Internacional', 'Fundamentos del Comercio Internacional', 1, 1, '2024-10-27 18:45:37', '2024-10-27 18:45:37');
INSERT INTO `course_module` VALUES (29, 18, 'Estrategias de Exportación e Importación', 'Estrategias de Exportación e Importación', 1, 1, '2024-10-27 18:52:30', '2024-10-27 18:52:30');
INSERT INTO `course_module` VALUES (30, 18, 'Mercados Internacionales y Negociaciones', 'Mercados Internacionales y Negociaciones', 1, 1, '2024-10-27 18:52:45', '2024-10-27 18:52:45');
INSERT INTO `course_module` VALUES (31, 22, 'Introducción', '', 1, 1, '2024-11-18 15:51:21', '2024-11-18 15:51:41');

-- ----------------------------
-- Table structure for course_rating
-- ----------------------------
DROP TABLE IF EXISTS `course_rating`;
CREATE TABLE `course_rating`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-course_rating-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-course_rating-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-course_rating-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-course_rating-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_rating
-- ----------------------------

-- ----------------------------
-- Table structure for enrollment
-- ----------------------------
DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE `enrollment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `enrolled_at` timestamp NULL DEFAULT NULL,
  `dropped_at` timestamp NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `role` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-enrollment-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-enrollment-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-enrollment-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk-enrollment-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enrollment
-- ----------------------------
INSERT INTO `enrollment` VALUES (13, 1, 51, '2024-11-05 10:33:51', NULL, 10, NULL);

-- ----------------------------
-- Table structure for enrollment_message
-- ----------------------------
DROP TABLE IF EXISTS `enrollment_message`;
CREATE TABLE `enrollment_message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `read_status` int NULL DEFAULT 0,
  `parent_id` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_message-user`(`sender_id` ASC) USING BTREE,
  INDEX `fk_message_enrollment`(`enrollment_id` ASC) USING BTREE,
  CONSTRAINT `fk_message-user` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_message_enrollment` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enrollment_message
-- ----------------------------
INSERT INTO `enrollment_message` VALUES (9, 13, 11, 'hola este es mi primer mensaje', 0, NULL, 11, 11, '2024-11-05 10:36:34', '2024-11-05 10:36:34');
INSERT INTO `enrollment_message` VALUES (10, 13, 51, 'mi primera respuesta', 0, NULL, 51, 51, '2024-11-05 10:36:44', '2024-11-05 10:36:44');

-- ----------------------------
-- Table structure for gov_id_type
-- ----------------------------
DROP TABLE IF EXISTS `gov_id_type`;
CREATE TABLE `gov_id_type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `short_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gov_id_type
-- ----------------------------
INSERT INTO `gov_id_type` VALUES (1, 'CC', 'Cédula de Ciudadanía');
INSERT INTO `gov_id_type` VALUES (2, 'CE', 'Cédula de Extranjería');
INSERT INTO `gov_id_type` VALUES (3, 'TI', 'Tarjeta de Identidad');
INSERT INTO `gov_id_type` VALUES (4, 'PA', 'Pasaporte');
INSERT INTO `gov_id_type` VALUES (5, 'RC', 'Registro Civil');

-- ----------------------------
-- Table structure for mentorship
-- ----------------------------
DROP TABLE IF EXISTS `mentorship`;
CREATE TABLE `mentorship`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_mentorship_enrollment`(`enrollment_id` ASC) USING BTREE,
  INDEX `fk_mentorship_user`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk_mentorship_enrollment` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mentorship_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mentorship
-- ----------------------------
INSERT INTO `mentorship` VALUES (9, 13, 10, 1, 1, '2024-11-05 10:35:15', '2024-11-05 10:35:15');
INSERT INTO `mentorship` VALUES (10, 13, 11, 1, 1, '2024-11-05 10:35:24', '2024-11-05 10:35:24');
INSERT INTO `mentorship` VALUES (11, 13, 12, 1, 1, '2024-11-05 10:35:45', '2024-11-05 10:35:45');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apply_time` int NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1720663969);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1720663971);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1729738081);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1729738081);
INSERT INTO `migration` VALUES ('m180523_151638_rbac_updates_indexes_without_prefix', 1729738081);
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1720663971);
INSERT INTO `migration` VALUES ('m200409_110543_rbac_update_mssql_trigger', 1729738081);
INSERT INTO `migration` VALUES ('m240708_220418_create_user_profile_table', 1720663971);
INSERT INTO `migration` VALUES ('m240708_221348_create_role_table', 1720663971);
INSERT INTO `migration` VALUES ('m240708_221545_create_permission_table', 1720663971);
INSERT INTO `migration` VALUES ('m240708_221653_create_user_role_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_221834_create_course_category_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_221940_create_course_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_222037_create_course_module_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_222150_create_course_completion_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_222305_create_lesson_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_222403_create_lesson_resource_table', 1720663972);
INSERT INTO `migration` VALUES ('m240708_224911_create_quiz_table', 1720663973);
INSERT INTO `migration` VALUES ('m240708_225004_create_quiz_question_table', 1720663973);
INSERT INTO `migration` VALUES ('m240708_225058_create_quiz_attempt_table', 1720663973);
INSERT INTO `migration` VALUES ('m240708_225157_create_quiz_grade_table', 1720663973);
INSERT INTO `migration` VALUES ('m240708_225706_create_assignment_table', 1720663973);
INSERT INTO `migration` VALUES ('m240708_225805_create_assignment_submission_table', 1720663974);
INSERT INTO `migration` VALUES ('m240708_225926_create_discussion_forum_table', 1720663974);
INSERT INTO `migration` VALUES ('m240708_230042_create_discussion_topic_table', 1720663974);
INSERT INTO `migration` VALUES ('m240708_230139_create_discussion_post_table', 1720663974);
INSERT INTO `migration` VALUES ('m240708_230247_create_grade_item_table', 1720663975);
INSERT INTO `migration` VALUES ('m240708_230434_create_gradebook_table', 1720663975);
INSERT INTO `migration` VALUES ('m240708_230520_create_grade_table', 1720663975);
INSERT INTO `migration` VALUES ('m240709_001723_create_enrollment_table', 1720663975);
INSERT INTO `migration` VALUES ('m240709_001851_create_group_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_001935_create_group_member_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_002042_create_attendance_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_002144_create_notification_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_003104_create_message_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_003207_create_message_thread_table', 1720663976);
INSERT INTO `migration` VALUES ('m240709_004033_create_calendar_event_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_004132_create_file_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_004303_create_file_reference_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_004415_create_feedback_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_004503_create_feedback_response_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_005156_create_badge_table', 1720663977);
INSERT INTO `migration` VALUES ('m240709_005245_create_badge_award_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005346_create_certificate_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005440_create_payment_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005485_create_plan_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005607_create_subscription_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005720_create_announcement_table', 1720663978);
INSERT INTO `migration` VALUES ('m240709_005833_create_course_feedback_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_005927_create_course_rating_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_010032_create_user_activity_log_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_010125_create_system_setting_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_011117_create_theme_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_011125_create_plugin_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_011135_create_integration_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_011143_create_report_table', 1720663979);
INSERT INTO `migration` VALUES ('m240709_011152_create_audit_log_table', 1720663980);
INSERT INTO `migration` VALUES ('m240830_200017_create_surveys_table', 1725048746);
INSERT INTO `migration` VALUES ('m240830_200141_create_sections_table', 1725048746);
INSERT INTO `migration` VALUES ('m240830_200301_create_questions_table', 1725048747);
INSERT INTO `migration` VALUES ('m240830_200416_create_options_table', 1725048747);
INSERT INTO `migration` VALUES ('m240830_200527_create_responses_table', 1725048747);
INSERT INTO `migration` VALUES ('m240830_200652_create_answers_table', 1725048747);
INSERT INTO `migration` VALUES ('m240830_200902_create_manual_grades_table', 1725048748);
INSERT INTO `migration` VALUES ('m240830_201148_create_survey_results_table', 1725048748);

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` smallint NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `read_status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-notification-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-notification-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notification
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci GENERATED ALWAYS AS (concat(`first_name`,_utf8mb4' ',`last_name`)) STORED,
  `gov_id_type` int NULL DEFAULT NULL,
  `gov_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `visibility` int NULL DEFAULT 1,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id` ASC) USING BTREE,
  INDEX `fk-profile-user`(`user_id` ASC) USING BTREE,
  INDEX `fk-profile-gov_id_type`(`gov_id_type` ASC) USING BTREE,
  CONSTRAINT `fk-profile-gov_id_type` FOREIGN KEY (`gov_id_type`) REFERENCES `gov_id_type` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk-profile-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 1, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:13:48');
INSERT INTO `profile` VALUES (10, 10, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile` VALUES (11, 11, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile` VALUES (12, 12, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile` VALUES (13, 13, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile` VALUES (21, 51, NULL, NULL, DEFAULT, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-05 10:31:31', '2024-11-05 10:31:31');

-- ----------------------------
-- Table structure for profile_info
-- ----------------------------
DROP TABLE IF EXISTS `profile_info`;
CREATE TABLE `profile_info`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile_id` int NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `social_links` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `industry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `years_experience` int NULL DEFAULT NULL,
  `visibility` int NULL DEFAULT 1,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk-profile_info-profile`(`profile_id` ASC) USING BTREE,
  CONSTRAINT `fk-profile_info-profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile_info
-- ----------------------------
INSERT INTO `profile_info` VALUES (1, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2024-11-01 18:04:36', '2024-11-01 19:18:23');
INSERT INTO `profile_info` VALUES (10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile_info` VALUES (11, 11, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 11, '2024-11-01 18:04:36', '2024-11-05 20:40:43');
INSERT INTO `profile_info` VALUES (12, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile_info` VALUES (13, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-01 18:04:36', '2024-11-01 18:04:36');
INSERT INTO `profile_info` VALUES (14, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-05 10:31:31', '2024-11-05 10:31:31');

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-report-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-report-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of report
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `key`(`key` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting
-- ----------------------------

-- ----------------------------
-- Table structure for survey
-- ----------------------------
DROP TABLE IF EXISTS `survey`;
CREATE TABLE `survey`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `total_points` int NULL DEFAULT NULL,
  `status` enum('draft','published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'draft',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-survey-created_by`(`created_by` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey
-- ----------------------------
INSERT INTO `survey` VALUES (9, 'Diagnostico', 'Encuesta de diagnóstico organizacional: ayuda a definir el estado de madurez en el proceso de servitización de la unidad productiva.', NULL, 'draft', NULL, NULL, 1, '2024-11-05 22:25:26', '2024-11-16 12:18:58');
INSERT INTO `survey` VALUES (14, 'Nueva encuesta', 'Nueva encuesta', NULL, 'draft', NULL, 1, 1, '2024-11-06 18:37:07', '2024-11-06 18:37:07');

-- ----------------------------
-- Table structure for survey_option
-- ----------------------------
DROP TABLE IF EXISTS `survey_option`;
CREATE TABLE `survey_option`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `option_text` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `weight` int NULL DEFAULT 0,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-option-question`(`question_id` ASC) USING BTREE,
  CONSTRAINT `fk-option-question` FOREIGN KEY (`question_id`) REFERENCES `survey_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_option
-- ----------------------------
INSERT INTO `survey_option` VALUES (4, 18, 'Opción A Edited', 0, 0, 1, 1, '2024-11-14 14:25:29', '2024-11-18 15:46:24');
INSERT INTO `survey_option` VALUES (5, 18, 'Opción B', 0, 0, 1, 1, '2024-11-14 14:29:06', '2024-11-18 15:46:24');
INSERT INTO `survey_option` VALUES (9, 30, 'Correcto', 1, 100, 1, 1, '2024-11-16 10:28:30', '2024-11-18 15:47:19');
INSERT INTO `survey_option` VALUES (10, 30, 'Incorrecto', 0, 0, 1, 1, '2024-11-16 10:28:30', '2024-11-18 15:47:26');
INSERT INTO `survey_option` VALUES (11, 31, 'LD opción 1 edited', 1, 100, 1, 1, '2024-11-16 10:43:43', '2024-11-18 15:47:39');
INSERT INTO `survey_option` VALUES (12, 31, 'LD opción 2', 0, 0, 1, 1, '2024-11-16 10:43:57', '2024-11-18 15:47:39');
INSERT INTO `survey_option` VALUES (13, 31, 'LD opción 3', 0, 0, 1, 1, '2024-11-16 10:44:06', '2024-11-18 15:47:39');
INSERT INTO `survey_option` VALUES (15, 19, 'Correct option A', 1, 50, 1, 1, '2024-11-16 10:49:32', '2024-11-18 15:46:49');
INSERT INTO `survey_option` VALUES (16, 19, 'Correct option B', 1, 50, 1, 1, '2024-11-16 10:49:57', '2024-11-18 15:46:52');
INSERT INTO `survey_option` VALUES (17, 19, 'Correct option C', 0, 0, 1, 1, '2024-11-16 10:50:05', '2024-11-18 15:46:37');
INSERT INTO `survey_option` VALUES (18, 19, 'Correct option D', 0, 0, 1, 1, '2024-11-16 10:50:12', '2024-11-16 11:56:49');
INSERT INTO `survey_option` VALUES (19, 18, 'Opción C', 0, 0, 1, 1, '2024-11-16 12:14:23', '2024-11-18 15:46:24');
INSERT INTO `survey_option` VALUES (20, 18, 'Opción E', 1, 100, 1, 1, '2024-11-18 15:46:23', '2024-11-18 15:46:24');

-- ----------------------------
-- Table structure for survey_question
-- ----------------------------
DROP TABLE IF EXISTS `survey_question`;
CREATE TABLE `survey_question`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `section_id` int NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question_type` enum('short_text','paragraph','multiple_choice','checkbox','drop_down_list','true_false','date','email','number','time','url') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `points` int NULL DEFAULT 1,
  `hint` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `explanation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `media_type` enum('image','video','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'none',
  `media_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-question-section`(`section_id` ASC) USING BTREE,
  INDEX `idx-question-survey`(`survey_id` ASC) USING BTREE,
  CONSTRAINT `fk-question-section` FOREIGN KEY (`section_id`) REFERENCES `survey_section` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk-question-survey` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_question
-- ----------------------------
INSERT INTO `survey_question` VALUES (10, 9, 8, 'pregunta de la seccion 2', 'multiple_choice', 10, '', '', 'none', NULL, 1, 1, '2024-11-06 18:50:21', '2024-11-06 18:50:21');
INSERT INTO `survey_question` VALUES (14, 9, 8, 'pregunta pregunta?', 'checkbox', 1, '', '', 'none', NULL, 1, 1, '2024-11-14 10:03:26', '2024-11-14 10:03:26');
INSERT INTO `survey_question` VALUES (16, 9, 7, 'pregunta corta? 3', 'short_text', 3, 'edited hint', 'edited explanation', 'none', NULL, 1, 1, '2024-11-14 10:26:49', '2024-11-16 10:41:30');
INSERT INTO `survey_question` VALUES (17, 9, 7, 'pregunta larga?', 'paragraph', 1, 'hint', '', 'none', NULL, 1, 1, '2024-11-14 10:27:06', '2024-11-14 14:04:49');
INSERT INTO `survey_question` VALUES (18, 9, 7, 'pregunta multiple choice? second edition', 'multiple_choice', 1, 'Este tipo de pregunta solo permite seleccionar una única opción de varias posibles', '', 'none', NULL, 1, 1, '2024-11-14 10:27:19', '2024-11-14 20:06:57');
INSERT INTO `survey_question` VALUES (19, 9, 7, 'pregunta casillas de verificacion?', 'checkbox', 1, '', '', 'none', NULL, 1, 1, '2024-11-14 10:27:48', '2024-11-14 10:27:48');
INSERT INTO `survey_question` VALUES (30, 9, 7, 'Pregunta de Falso y Verdadero?', 'true_false', 1, '', '', 'none', NULL, 1, 1, '2024-11-16 10:28:30', '2024-11-16 10:28:30');
INSERT INTO `survey_question` VALUES (31, 9, 7, 'Pregunta de lista desplegable?', 'drop_down_list', 1, '', '', 'none', NULL, 1, 1, '2024-11-16 10:43:26', '2024-11-16 10:43:26');

-- ----------------------------
-- Table structure for survey_response
-- ----------------------------
DROP TABLE IF EXISTS `survey_response`;
CREATE TABLE `survey_response`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_score` decimal(10, 2) NULL DEFAULT NULL,
  `status` enum('completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-response-survey`(`survey_id` ASC) USING BTREE,
  INDEX `idx-response-user`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-response-survey` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-response-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_response
-- ----------------------------

-- ----------------------------
-- Table structure for survey_response_answer
-- ----------------------------
DROP TABLE IF EXISTS `survey_response_answer`;
CREATE TABLE `survey_response_answer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `response_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `calculated_score` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-answers-response_id`(`response_id` ASC) USING BTREE,
  INDEX `idx-answers-question_id`(`question_id` ASC) USING BTREE,
  CONSTRAINT `fk-answer-question` FOREIGN KEY (`question_id`) REFERENCES `survey_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-answer-response` FOREIGN KEY (`response_id`) REFERENCES `survey_response` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_response_answer
-- ----------------------------

-- ----------------------------
-- Table structure for survey_response_selected_options
-- ----------------------------
DROP TABLE IF EXISTS `survey_response_selected_options`;
CREATE TABLE `survey_response_selected_options`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `response_answer_id` int NOT NULL,
  `option_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk-response_selected_options-option`(`option_id` ASC) USING BTREE,
  INDEX `fk-response_selected_options-response_answer`(`response_answer_id` ASC) USING BTREE,
  CONSTRAINT `fk-response_selected_options-option` FOREIGN KEY (`option_id`) REFERENCES `survey_option` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-response_selected_options-response_answer` FOREIGN KEY (`response_answer_id`) REFERENCES `survey_response_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_response_selected_options
-- ----------------------------

-- ----------------------------
-- Table structure for survey_section
-- ----------------------------
DROP TABLE IF EXISTS `survey_section`;
CREATE TABLE `survey_section`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `order` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-section-survey_id`(`survey_id` ASC) USING BTREE,
  CONSTRAINT `fk-section-survey_id` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_section
-- ----------------------------
INSERT INTO `survey_section` VALUES (7, 9, 'Datos Básicos', 'Sección 1: Datos básicos', NULL, 1, 1, '2024-11-06 18:37:49', '2024-11-14 10:01:24');
INSERT INTO `survey_section` VALUES (8, 9, 'Otra sección', '', NULL, 1, 1, '2024-11-06 18:44:36', '2024-11-06 18:44:36');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT 10,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'superadmin', '2K2ppxBT98ezBZr2CDLn-uCt-6606A2o', '$2y$13$jJCyvkjfHSI3OtpeHiWbN.7ImLbHXrdR7MODYQcg8prYleoYF8zDq', NULL, 'miguel.carrillo.m@hotmail.com', 10, 1720470983, 1722704547, 'j5ynFyCO0KC_d62XcrWK02T_e8Xsm5IN_1720470983');
INSERT INTO `user` VALUES (10, 'admin-user', 'n3gJx2eBE02hmlk5SWlVDY0kf_0uWShv', '$2y$13$DEVYQdTnmvucRJaJEQlMlOXjLGACC9K/gsk7cZ/gaGP0DVmVIifSG', NULL, 'admin@serviser.com', 10, 1720680993, 1720680993, 'sgLnSkvuJYGuP14B4aISgBs8fmN824H_1729728555');
INSERT INTO `user` VALUES (11, 'advisor-user', 'n3gJx2eBE02hmlk5SWlVDY0kf_0uWShv', '$2y$13$DEVYQdTnmvucRJaJEQlMlOXjLGACC9K/gsk7cZ/gaGP0DVmVIifSG', NULL, 'advisor@serviser.com', 10, 1720680993, 1720680993, 'sgLnSkvuJYGuP14B4aISgBs8fmN824H_1729728555');
INSERT INTO `user` VALUES (12, 'apprentice-user', 'n3gJx2eBE02hmlk5SWlVDY0kf_0uWShv', '$2y$13$DEVYQdTnmvucRJaJEQlMlOXjLGACC9K/gsk7cZ/gaGP0DVmVIifSG', NULL, 'apprentice@serviser.com', 10, 1720680993, 1720680993, 'sgLnSkvuJYGuP14B4aISgBs8fmN824H_1729728555');
INSERT INTO `user` VALUES (13, 'subscriber-user', 'n3gJx2eBE02hmlk5SWlVDY0kf_0uWShv', '$2y$13$DEVYQdTnmvucRJaJEQlMlOXjLGACC9K/gsk7cZ/gaGP0DVmVIifSG', NULL, 'subscriber@serviser.com', 10, 1720680993, 1720680993, 'sgLnSkvuJYGuP14B4aISgBs8fmN824H_1729728555');
INSERT INTO `user` VALUES (51, 'miguelcmo', '7Emr-d-1rYajNwSSVqRGMPTeOP27HiAB', '$2y$13$kAe7RuoTZal4yCbcKnySfebx6h2AAGv.V3jtgQQTLukCMtwh9u7am', NULL, 'miguelcmo@outlook.com', 10, 1730820691, 1730820788, '7iKNlzIK-qDdImvP46rwLKFkRostHF1g_1730820691');

SET FOREIGN_KEY_CHECKS = 1;
