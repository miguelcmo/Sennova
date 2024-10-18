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

 Date: 29/09/2024 21:47:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` smallint NOT NULL DEFAULT 0,
  `status` smallint NOT NULL DEFAULT 0,
  `created_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-announcement-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-announcement-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of announcement
-- ----------------------------

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `response_id` int NOT NULL,
  `question_id` int NOT NULL,
  `option_id` int NULL DEFAULT NULL,
  `answer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-answers-response_id`(`response_id` ASC) USING BTREE,
  INDEX `idx-answers-question_id`(`question_id` ASC) USING BTREE,
  INDEX `idx-answers-option_id`(`option_id` ASC) USING BTREE,
  CONSTRAINT `fk-answers-option_id` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `fk-answers-question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-answers-response_id` FOREIGN KEY (`response_id`) REFERENCES `responses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of answers
-- ----------------------------

-- ----------------------------
-- Table structure for assignment
-- ----------------------------
DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `due_date` int NOT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-assignment-course_id`(`course_id` ASC) USING BTREE,
  CONSTRAINT `fk-assignment-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignment
-- ----------------------------

-- ----------------------------
-- Table structure for assignment_submission
-- ----------------------------
DROP TABLE IF EXISTS `assignment_submission`;
CREATE TABLE `assignment_submission`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `assignment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `submitted_at` int NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `grade` int NULL DEFAULT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-assignment_submission-assignment_id`(`assignment_id` ASC) USING BTREE,
  INDEX `idx-assignment_submission-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-assignment_submission-assignment_id` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-assignment_submission-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignment_submission
-- ----------------------------

-- ----------------------------
-- Table structure for attendance
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `status` smallint NOT NULL DEFAULT 1,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-attendance-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-attendance-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-attendance-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-attendance-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attendance
-- ----------------------------

-- ----------------------------
-- Table structure for audit_log
-- ----------------------------
DROP TABLE IF EXISTS `audit_log`;
CREATE TABLE `audit_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` int NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `from_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `to_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-audit_log-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-audit_log-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of audit_log
-- ----------------------------

-- ----------------------------
-- Table structure for badge
-- ----------------------------
DROP TABLE IF EXISTS `badge`;
CREATE TABLE `badge`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `criteria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of badge
-- ----------------------------

-- ----------------------------
-- Table structure for badge_award
-- ----------------------------
DROP TABLE IF EXISTS `badge_award`;
CREATE TABLE `badge_award`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `badge_id` int NOT NULL,
  `user_id` int NOT NULL,
  `awarded_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-badge_award-badge_id`(`badge_id` ASC) USING BTREE,
  INDEX `idx-badge_award-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-badge_award-badge_id` FOREIGN KEY (`badge_id`) REFERENCES `badge` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-badge_award-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of badge_award
-- ----------------------------

-- ----------------------------
-- Table structure for calendar_event
-- ----------------------------
DROP TABLE IF EXISTS `calendar_event`;
CREATE TABLE `calendar_event`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NULL DEFAULT NULL,
  `all_day` tinyint(1) NULL DEFAULT 0,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-calendar_event-start_date`(`start_date` ASC) USING BTREE,
  INDEX `idx-calendar_event-end_date`(`end_date` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calendar_event
-- ----------------------------

-- ----------------------------
-- Table structure for certificate
-- ----------------------------
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE `certificate`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  `issued_at` int NOT NULL,
  `file_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-certificate-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-certificate-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-certificate-file_id`(`file_id` ASC) USING BTREE,
  CONSTRAINT `fk-certificate-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-certificate-file_id` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-certificate-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificate
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, 'Mercadeo', 'Curso: Introducción a la Servitización en el Mercadeo\r\n\r\nDescripción del curso:\r\n\r\nEste curso está diseñado para proporcionar una introducción a la servitización aplicada en el mercadeo. Los estudiantes aprenderán cómo las empresas pueden integrar servicios adicionales a sus productos para aumentar el valor al cliente y diferenciarse en el mercado. El curso se divide en tres secciones clave, cada una con tres temas que cubren los fundamentos, estrategias y herramientas de mercadeo relevantes para la servitización.\r\n\r\nObjetivos del curso:\r\n\r\nAl finalizar este curso, los estudiantes podrán:\r\n\r\n    Comprender el concepto de servitización y su aplicación en mercadeo.\r\n    Desarrollar estrategias de comunicación y fidelización basadas en servicios.\r\n    Implementar herramientas tecnológicas para mejorar la gestión de clientes y servicios.', 1, 1, '2024-09-05 00:55:12', '2024-09-29 18:31:59');
INSERT INTO `course` VALUES (4, 'Spanish in a nutshell', 'Welcome to Spanish in a Nutshell!\r\n\r\n¡Bienvenidos a Español en Breve!\r\n\r\nEmbark on a thrilling linguistic journey with our \"Spanish in a Nutshell\" course, where language learning meets simplicity and effectiveness. Whether you\'re a complete beginner or seeking a quick refresher, this course is designed to provide you with a solid foundation in the Spanish language, all packed into a compact and accessible format.\r\n\r\nWhat to Expect:\r\n\r\nEssential Vocabulary: Learn the key words and phrases that form the backbone of everyday conversations.\r\nGrammar Demystified: Dive into fundamental grammar rules without the overwhelm, making Spanish structure clear and approachable.\r\nPractical Communication: From greetings to expressing yourself in various situations, develop practical language skills for real-life scenarios.\r\nCultural Insights: Immerse yourself in the richness of Spanish-speaking cultures, gaining a deeper understanding of customs and traditions.\r\n\r\nWhy \"Spanish in a Nutshell\"?\r\n\r\nEfficiency: Our streamlined approach ensures you grasp the essentials swiftly, saving you time and accelerating your learning.\r\nEngagement: Interactive lessons and dynamic exercises keep you actively involved, making learning enjoyable and memorable.\r\nConfidence Building: Build confidence in your Spanish abilities, empowering you to engage in conversations with ease.\r\n\r\nReady to unlock the beauty of the Spanish language? Join us in this exciting adventure, and let\'s make learning Spanish a breeze!\r\n\r\n¡Vamos!', 1, 1, '2024-09-04 22:35:22', '2024-09-29 18:24:42');

-- ----------------------------
-- Table structure for course_category
-- ----------------------------
DROP TABLE IF EXISTS `course_category`;
CREATE TABLE `course_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_category
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_module
-- ----------------------------
INSERT INTO `course_module` VALUES (1, 1, 'Sección 1: Fundamentos de la Servitización', 'Fundamentos de la Servitización', 1, 1, '2024-09-04 21:55:31', '2024-09-29 18:32:48');
INSERT INTO `course_module` VALUES (6, 1, 'Sección 2: Estrategias de Servitización para Mercadeo', 'Estrategias de Servitización para Mercadeo', 1, 1, '2024-09-04 22:30:33', '2024-09-29 18:33:16');
INSERT INTO `course_module` VALUES (8, 4, 'Week 1: ¡Hola! – Introduction to Spanish', '', 1, 1, '2024-09-29 18:26:39', '2024-09-29 18:26:39');
INSERT INTO `course_module` VALUES (9, 4, 'Week 2: Building Blocks – Essential Vocabulary I', '', 1, 1, '2024-09-29 18:26:56', '2024-09-29 18:26:56');
INSERT INTO `course_module` VALUES (10, 4, 'Week 3: Getting to Know You – Personal Information', '', 1, 1, '2024-09-29 18:27:14', '2024-09-29 18:27:14');
INSERT INTO `course_module` VALUES (11, 4, 'Week 4: Navigating Conversations – Practical Communication I', '', 1, 1, '2024-09-29 18:27:26', '2024-09-29 18:27:26');
INSERT INTO `course_module` VALUES (12, 4, 'Week 5: Around Town – Places and Activities', '', 1, 1, '2024-09-29 18:27:38', '2024-09-29 18:27:38');
INSERT INTO `course_module` VALUES (13, 4, 'Week 6: Grammar Basics I – Present Tense', '', 1, 1, '2024-09-29 18:28:23', '2024-09-29 18:28:23');
INSERT INTO `course_module` VALUES (14, 4, 'Week 7: Cultural Insights – Spanish-Speaking Countries', '', 1, 1, '2024-09-29 18:28:37', '2024-09-29 18:28:37');
INSERT INTO `course_module` VALUES (15, 4, 'Week 8: Building on Basics – Essential Vocabulary II', '', 1, 1, '2024-09-29 18:28:50', '2024-09-29 18:28:50');
INSERT INTO `course_module` VALUES (16, 4, 'Week 9: Practical Communication II – Daily Life Scenarios', '', 1, 1, '2024-09-29 18:29:01', '2024-09-29 18:29:01');
INSERT INTO `course_module` VALUES (17, 4, 'Week 10: Grammar Basics II – Introduction to Past Tense', '', 1, 1, '2024-09-29 18:29:10', '2024-09-29 18:29:10');
INSERT INTO `course_module` VALUES (18, 1, 'Sección 3: Herramientas y Tecnologías para la Servitización', 'Herramientas y Tecnologías para la Servitización', 1, 1, '2024-09-29 18:33:36', '2024-09-29 18:33:36');

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
-- Table structure for discussion_forum
-- ----------------------------
DROP TABLE IF EXISTS `discussion_forum`;
CREATE TABLE `discussion_forum`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-discussion_forum-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-discussion_forum-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-discussion_forum-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-discussion_forum-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discussion_forum
-- ----------------------------

-- ----------------------------
-- Table structure for discussion_post
-- ----------------------------
DROP TABLE IF EXISTS `discussion_post`;
CREATE TABLE `discussion_post`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `topic_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-discussion_post-topic_id`(`topic_id` ASC) USING BTREE,
  INDEX `idx-discussion_post-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-discussion_post-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-discussion_post-topic_id` FOREIGN KEY (`topic_id`) REFERENCES `discussion_topic` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discussion_post
-- ----------------------------

-- ----------------------------
-- Table structure for discussion_topic
-- ----------------------------
DROP TABLE IF EXISTS `discussion_topic`;
CREATE TABLE `discussion_topic`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `forum_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-discussion_topic-forum_id`(`forum_id` ASC) USING BTREE,
  INDEX `idx-discussion_topic-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-discussion_topic-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-discussion_topic-forum_id` FOREIGN KEY (`forum_id`) REFERENCES `discussion_forum` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discussion_topic
-- ----------------------------

-- ----------------------------
-- Table structure for enrollment
-- ----------------------------
DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE `enrollment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `enrolled_at` int NOT NULL,
  `dropped_at` int NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT 1,
  `role` smallint NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-enrollment-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-enrollment-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-enrollment-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-enrollment-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enrollment
-- ----------------------------

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` smallint NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-feedback-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-feedback-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for feedback_response
-- ----------------------------
DROP TABLE IF EXISTS `feedback_response`;
CREATE TABLE `feedback_response`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `feedback_id` int NOT NULL,
  `user_id` int NOT NULL,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-feedback_response-feedback_id`(`feedback_id` ASC) USING BTREE,
  INDEX `idx-feedback_response-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-feedback_response-feedback_id` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-feedback_response-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feedback_response
-- ----------------------------

-- ----------------------------
-- Table structure for file
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `size` int NULL DEFAULT NULL,
  `uploaded_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-file-uploaded_by`(`uploaded_by` ASC) USING BTREE,
  CONSTRAINT `fk-file-uploaded_by` FOREIGN KEY (`uploaded_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file
-- ----------------------------

-- ----------------------------
-- Table structure for file_reference
-- ----------------------------
DROP TABLE IF EXISTS `file_reference`;
CREATE TABLE `file_reference`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_id` int NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-file_reference-file_id`(`file_id` ASC) USING BTREE,
  INDEX `idx-file_reference-model-model_id`(`model` ASC, `model_id` ASC) USING BTREE,
  CONSTRAINT `fk-file_reference-file_id` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of file_reference
-- ----------------------------

-- ----------------------------
-- Table structure for grade
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade_item_id` int NOT NULL,
  `user_id` int NOT NULL,
  `grade` decimal(5, 2) NOT NULL DEFAULT 0.00,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `graded_by` int NULL DEFAULT NULL,
  `graded_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-grade-grade_item_id`(`grade_item_id` ASC) USING BTREE,
  INDEX `idx-grade-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-grade-graded_by`(`graded_by` ASC) USING BTREE,
  CONSTRAINT `fk-grade-grade_item_id` FOREIGN KEY (`grade_item_id`) REFERENCES `grade_item` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-grade-graded_by` FOREIGN KEY (`graded_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-grade-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grade
-- ----------------------------

-- ----------------------------
-- Table structure for grade_item
-- ----------------------------
DROP TABLE IF EXISTS `grade_item`;
CREATE TABLE `grade_item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `max_grade` decimal(5, 2) NULL DEFAULT 100.00,
  `weight` decimal(5, 2) NULL DEFAULT 1.00,
  `grade_type` smallint NOT NULL DEFAULT 1,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-grade_item-course_id`(`course_id` ASC) USING BTREE,
  CONSTRAINT `fk-grade_item-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grade_item
-- ----------------------------

-- ----------------------------
-- Table structure for gradebook
-- ----------------------------
DROP TABLE IF EXISTS `gradebook`;
CREATE TABLE `gradebook`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `grade` decimal(5, 2) NULL DEFAULT 0.00,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-gradebook-course_id`(`course_id` ASC) USING BTREE,
  INDEX `idx-gradebook-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-gradebook-item_id`(`item_id` ASC) USING BTREE,
  CONSTRAINT `fk-gradebook-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-gradebook-item_id` FOREIGN KEY (`item_id`) REFERENCES `grade_item` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-gradebook-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gradebook
-- ----------------------------

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-group-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-group-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------

-- ----------------------------
-- Table structure for group_member
-- ----------------------------
DROP TABLE IF EXISTS `group_member`;
CREATE TABLE `group_member`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL,
  `role` smallint NOT NULL DEFAULT 1,
  `status` smallint NOT NULL DEFAULT 1,
  `joined_at` int NOT NULL,
  `left_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-group_member-group_id`(`group_id` ASC) USING BTREE,
  INDEX `idx-group_member-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-group_member-group_id` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-group_member-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group_member
-- ----------------------------

-- ----------------------------
-- Table structure for integration
-- ----------------------------
DROP TABLE IF EXISTS `integration`;
CREATE TABLE `integration`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of integration
-- ----------------------------

-- ----------------------------
-- Table structure for lesson
-- ----------------------------
DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson`  (
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
  CONSTRAINT `fk-lesson-course_module_id` FOREIGN KEY (`course_module_id`) REFERENCES `course_module` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk-lesson-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesson
-- ----------------------------
INSERT INTO `lesson` VALUES (1, 1, 1, 'Tema 1.1: ¿Qué es la Servitización?', '<ul><li>Definición y concepto de servitización.</li><li>Evolución histórica de la servitización en el mundo empresarial.</li><li>Ejemplos de empresas que han adoptado la servitización.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-28 08:35:03', '2024-09-29 18:41:22');
INSERT INTO `lesson` VALUES (2, 1, 1, 'Tema 1.2: Ventajas de la Servitización en Mercadeo', '<ul><li>Beneficios de agregar servicios a productos tradicionales.</li><li>Impacto de la servitización en la satisfacción del cliente.</li><li>Cómo puede diferenciar a una empresa de su competencia.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-28 17:07:40', '2024-09-29 18:46:11');
INSERT INTO `lesson` VALUES (3, 1, 1, 'Tema 1.3: Modelos de Negocio en la Servitización', '<ul><li>Tipos de modelos de negocio basados en servitización.</li><li>La transición de producto a servicio en el modelo comercial.</li><li>Ejemplos prácticos de transformación de modelos de negocio.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:49:03', '2024-09-29 18:49:03');
INSERT INTO `lesson` VALUES (4, 1, 6, 'Tema 2.1: Estrategia de Comunicación en la Servitización', '<ul><li>Cómo comunicar efectivamente la oferta de servicios adicionales.</li><li>Canales de comunicación clave para la servitización.</li><li>Casos de éxito en la comunicación de la servitización.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:49:53', '2024-09-29 18:49:53');
INSERT INTO `lesson` VALUES (5, 1, 6, 'Tema 2.2: Valor Percibido por el Cliente', '<ul><li>Definir el valor agregado percibido por los clientes.</li><li>Técnicas para evaluar la satisfacción del cliente en entornos servitizados.</li><li>Herramientas para medir el impacto de los servicios en el valor del producto.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:50:19', '2024-09-29 18:50:19');
INSERT INTO `lesson` VALUES (6, 1, 6, 'Tema 2.3: Fidelización del Cliente a través de Servicios', '<ul><li>Estrategias de fidelización mediante servitización.</li><li>Programas de lealtad basados en servicios.</li><li>La importancia de la postventa en el ciclo de vida del cliente.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:53:04', '2024-09-29 18:53:04');
INSERT INTO `lesson` VALUES (7, 1, 18, 'Tema 3.1: CRM y la Gestión del Cliente Servitizado', '<ul><li>El papel de los sistemas de gestión de relaciones con el cliente (CRM) en la servitización.</li><li>Integración de datos del cliente para ofrecer mejores servicios.</li><li>Plataformas de CRM populares para servitización.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:53:45', '2024-09-29 18:53:45');
INSERT INTO `lesson` VALUES (8, 1, 18, 'Tema 3.2: Tecnología y Automatización en la Servitización', '<ul><li>Herramientas tecnológicas que facilitan la servitización.</li><li>Ejemplos de automatización de servicios.</li><li>Cómo la tecnología mejora la oferta de servicios.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:54:10', '2024-09-29 18:54:10');
INSERT INTO `lesson` VALUES (9, 1, 18, 'Tema 3.3: Marketing Digital para Servicios', '<ul><li>Estrategias digitales para promocionar servicios adicionales.</li><li>Uso de las redes sociales y SEO en la servitización.</li><li>Herramientas de marketing digital enfocadas en servicios.</li></ul>', NULL, NULL, 0, NULL, NULL, '2024-09-29 18:54:32', '2024-09-29 18:54:32');

-- ----------------------------
-- Table structure for lesson_resource
-- ----------------------------
DROP TABLE IF EXISTS `lesson_resource`;
CREATE TABLE `lesson_resource`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `lesson_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-lesson_resource-lesson_id`(`lesson_id` ASC) USING BTREE,
  CONSTRAINT `fk-lesson_resource-lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesson_resource
-- ----------------------------

-- ----------------------------
-- Table structure for manual_grades
-- ----------------------------
DROP TABLE IF EXISTS `manual_grades`;
CREATE TABLE `manual_grades`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `answer_id` int NOT NULL,
  `reviewer_id` int NOT NULL,
  `grade` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-manual_grades-answer_id`(`answer_id` ASC) USING BTREE,
  INDEX `idx-manual_grades-reviewer_id`(`reviewer_id` ASC) USING BTREE,
  CONSTRAINT `fk-manual_grades-answer_id` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-manual_grades-reviewer_id` FOREIGN KEY (`reviewer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manual_grades
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `from_user_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `read_status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-message-from_user_id`(`from_user_id` ASC) USING BTREE,
  INDEX `idx-message-to_user_id`(`to_user_id` ASC) USING BTREE,
  CONSTRAINT `fk-message-from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-message-to_user_id` FOREIGN KEY (`to_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for message_thread
-- ----------------------------
DROP TABLE IF EXISTS `message_thread`;
CREATE TABLE `message_thread`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-message_thread-subject`(`subject` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of message_thread
-- ----------------------------

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
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1720663971);
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
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `option_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `weight` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-options-question_id`(`question_id` ASC) USING BTREE,
  CONSTRAINT `fk-options-question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of options
-- ----------------------------

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `payment_date` int NOT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-payment-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-payment-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission
-- ----------------------------

-- ----------------------------
-- Table structure for plan
-- ----------------------------
DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `price` decimal(10, 2) NOT NULL,
  `duration` int NOT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plan
-- ----------------------------

-- ----------------------------
-- Table structure for plugin
-- ----------------------------
DROP TABLE IF EXISTS `plugin`;
CREATE TABLE `plugin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plugin
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `govTypeId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `govId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `initials` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `profession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ocupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-user_profile-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-user_profile-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 1, 'Miguel Angel', 'Carrillo Moreno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-29 19:48:23', '2024-09-29 19:48:23');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_id` int NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question_type` enum('text','multiple_choice','checkbox','true_false','open') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `points` int NULL DEFAULT 0,
  `hint` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `explanation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `media_type` enum('image','video','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'none',
  `media_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-question-section_id`(`section_id` ASC) USING BTREE,
  CONSTRAINT `fk-question-section_id` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES (1, 1, 'pregunta de prueba', 'text', 1, '', '', 'none', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `question` VALUES (2, 1, 'new question', 'multiple_choice', 10, '', '', 'none', NULL, '2024-09-04 17:44:22', '2024-09-04 17:44:22', 1, 1);
INSERT INTO `question` VALUES (3, 1, 'donde esta el chavo del 8', 'checkbox', 2, 'en el barril', 'ejemplo de explicacion', 'none', NULL, '2024-09-04 17:45:22', '2024-09-04 17:45:22', 1, 1);
INSERT INTO `question` VALUES (4, 2, 'pregunta de la seccion 2', 'checkbox', 0, '', '', 'none', NULL, '2024-09-04 17:59:31', '2024-09-04 17:59:31', 1, 1);

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `time_limit` int NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-quiz-course_id`(`course_id` ASC) USING BTREE,
  CONSTRAINT `fk-quiz-course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz
-- ----------------------------

-- ----------------------------
-- Table structure for quiz_attempt
-- ----------------------------
DROP TABLE IF EXISTS `quiz_attempt`;
CREATE TABLE `quiz_attempt`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `user_id` int NOT NULL,
  `started_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `score` int NULL DEFAULT NULL,
  `is_passed` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-quiz_attempt-quiz_id`(`quiz_id` ASC) USING BTREE,
  INDEX `idx-quiz_attempt-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-quiz_attempt-quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-quiz_attempt-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz_attempt
-- ----------------------------

-- ----------------------------
-- Table structure for quiz_grade
-- ----------------------------
DROP TABLE IF EXISTS `quiz_grade`;
CREATE TABLE `quiz_grade`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_attempt_id` int NOT NULL,
  `quiz_question_id` int NOT NULL,
  `user_id` int NOT NULL,
  `chosen_option` int NOT NULL,
  `is_correct` tinyint(1) NULL DEFAULT 0,
  `points` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-quiz_grade-quiz_attempt_id`(`quiz_attempt_id` ASC) USING BTREE,
  INDEX `idx-quiz_grade-quiz_question_id`(`quiz_question_id` ASC) USING BTREE,
  INDEX `idx-quiz_grade-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-quiz_grade-quiz_attempt_id` FOREIGN KEY (`quiz_attempt_id`) REFERENCES `quiz_attempt` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-quiz_grade-quiz_question_id` FOREIGN KEY (`quiz_question_id`) REFERENCES `quiz_question` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-quiz_grade-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz_grade
-- ----------------------------

-- ----------------------------
-- Table structure for quiz_question
-- ----------------------------
DROP TABLE IF EXISTS `quiz_question`;
CREATE TABLE `quiz_question`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `options` json NOT NULL,
  `correct_option` int NOT NULL,
  `points` int NULL DEFAULT 1,
  `sort_order` int NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-quiz_question-quiz_id`(`quiz_id` ASC) USING BTREE,
  CONSTRAINT `fk-quiz_question-quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quiz_question
-- ----------------------------

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
-- Table structure for responses
-- ----------------------------
DROP TABLE IF EXISTS `responses`;
CREATE TABLE `responses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `option_id` int NULL DEFAULT NULL,
  `response_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-responses-survey_id`(`survey_id` ASC) USING BTREE,
  INDEX `idx-responses-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-responses-question_id`(`question_id` ASC) USING BTREE,
  INDEX `idx-responses-option_id`(`option_id` ASC) USING BTREE,
  CONSTRAINT `fk-responses-option_id` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `fk-responses-question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-responses-survey_id` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-responses-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of responses
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `order` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-section-survey_id`(`survey_id` ASC) USING BTREE,
  CONSTRAINT `fk-section-survey_id` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES (1, 2, 'Sección de prueba', 'test de description', 1, '2024-08-31 03:19:13', '2024-09-04 00:14:53', 1, 1);
INSERT INTO `section` VALUES (2, 2, 'otra seccion', 'nueva seccion', NULL, '2024-08-31 03:21:01', '2024-08-31 03:21:01', 1, 1);
INSERT INTO `section` VALUES (3, 2, 'tercer test', 'tercer test', 3, '2024-08-31 03:26:28', '2024-08-31 03:26:28', 1, 1);

-- ----------------------------
-- Table structure for subscription
-- ----------------------------
DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `start_date` int NOT NULL,
  `end_date` int NOT NULL,
  `payment_id` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-subscription-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-subscription-plan_id`(`plan_id` ASC) USING BTREE,
  INDEX `idx-subscription-payment_id`(`payment_id` ASC) USING BTREE,
  CONSTRAINT `fk-subscription-payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-subscription-plan_id` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-subscription-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscription
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-survey-created_by`(`created_by` ASC) USING BTREE,
  CONSTRAINT `fk-survey-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey
-- ----------------------------
INSERT INTO `survey` VALUES (2, 'Test 2', 'Test 2 con otra description', 2, NULL, '', 1, 1, '2024-08-31 00:47:46', '2024-08-31 02:26:00');
INSERT INTO `survey` VALUES (3, 'test3', 'test3', 1, 'draft', '', 1, 1, '2024-08-31 00:50:27', '2024-08-31 00:50:27');
INSERT INTO `survey` VALUES (4, 'test4', 'test4', 1, 'draft', '', 1, 1, '2024-08-31 00:51:51', '2024-08-31 00:51:51');
INSERT INTO `survey` VALUES (5, 'test5', 'test5', 20, 'draft', NULL, 1, 1, '2024-08-31 00:53:09', '2024-08-31 00:53:09');
INSERT INTO `survey` VALUES (6, 'test 6', 'test 6', NULL, 'draft', NULL, 1, 1, '2024-08-31 02:13:54', '2024-08-31 02:13:54');
INSERT INTO `survey` VALUES (7, 'test 7', 'test 7', 30, 'draft', NULL, 1, 1, '2024-08-31 02:16:34', '2024-08-31 02:16:34');

-- ----------------------------
-- Table structure for survey_results
-- ----------------------------
DROP TABLE IF EXISTS `survey_results`;
CREATE TABLE `survey_results`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `survey_id` int NOT NULL,
  `respondent_id` int NOT NULL,
  `total_score` decimal(5, 2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-survey_results-survey_id`(`survey_id` ASC) USING BTREE,
  INDEX `idx-survey_results-respondent_id`(`respondent_id` ASC) USING BTREE,
  CONSTRAINT `fk-survey_results-respondent_id` FOREIGN KEY (`respondent_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-survey_results-survey_id` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_results
-- ----------------------------

-- ----------------------------
-- Table structure for system_setting
-- ----------------------------
DROP TABLE IF EXISTS `system_setting`;
CREATE TABLE `system_setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `key`(`key` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_setting
-- ----------------------------

-- ----------------------------
-- Table structure for theme
-- ----------------------------
DROP TABLE IF EXISTS `theme`;
CREATE TABLE `theme`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `preview_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT 0,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of theme
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'superadmin', '2K2ppxBT98ezBZr2CDLn-uCt-6606A2o', '$2y$13$jJCyvkjfHSI3OtpeHiWbN.7ImLbHXrdR7MODYQcg8prYleoYF8zDq', NULL, 'superadmin@serviser.com', 10, 1720470983, 1722704547, 'j5ynFyCO0KC_d62XcrWK02T_e8Xsm5IN_1720470983');
INSERT INTO `user` VALUES (8, 'new', 'AQkTgar5UFOUa6JRFEG-tjr_60QvRK0q', '$2y$13$5QkiwnJ4xU77jq2PYEWRkOFF0R4ACnJOKl3d6tILA1/PQP30NUjGC', NULL, 'miguel.carrillo.m@hotmail.com', 9, 1726889588, 1726889588, 'bR67RWkObiqExx-lA3PeifyQyk0NhYHY_1726889588');

-- ----------------------------
-- Table structure for user_activity_log
-- ----------------------------
DROP TABLE IF EXISTS `user_activity_log`;
CREATE TABLE `user_activity_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-user_activity_log-user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `fk-user_activity_log-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_activity_log
-- ----------------------------

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-user_role-user_id`(`user_id` ASC) USING BTREE,
  INDEX `idx-user_role-role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `fk-user_role-role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk-user_role-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
