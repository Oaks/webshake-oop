DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
      `id` int(11) NOT NULL,
      `author_id` int(11) NOT NULL,
      `name` varchar(255) NOT NULL,
      `text` text NOT NULL,
      `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

