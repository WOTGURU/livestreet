ALTER TABLE `prefix_topic_content` ADD COLUMN `topic_seo_keyword` VARCHAR (250);
ALTER TABLE `prefix_topic_content` ADD COLUMN `topic_seo_description` VARCHAR (250);

CREATE TABLE `prefix_blog_seo` (
  `blog_id` INT(11) UNSIGNED NOT NULL,
  `blog_language` VARCHAR(16) NOT NULL,
  `blog_seo_keyword` VARCHAR(250),
  `blog_seo_description` VARCHAR(250),
  UNIQUE KEY (`blog_id`, `blog_language`),
  CONSTRAINT `prefix_blog_seo_fk` FOREIGN KEY (`blog_id`) REFERENCES `prefix_blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE InnoDB CHARSET=utf8;