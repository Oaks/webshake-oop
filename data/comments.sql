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

INSERT INTO `comments` (`id`, `author_id`, `article_id`, `comment`, `created_at`) VALUES (NULL, '1', '4', 'Шёл я значит по тротуару, как вдруг...', CURRENT_TIMESTAMP);
INSERT INTO `comments` (`id`, `author_id`, `article_id`, `comment`, `created_at`) VALUES (NULL, '3', '4', 'Короновирус ....', CURRENT_TIMESTAMP);
