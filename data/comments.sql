DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
      `id` int(11) NOT NULL,
      `author_id` int(11) NOT NULL,
      `article_id` int(11) NOT NULL,
      `comment` text NOT NULL,
      `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

