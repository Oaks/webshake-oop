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

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES (NULL, '1', 'Статья о том, как я погулял', 'Шёл я значит по тротуару, как вдруг...', CURRENT_TIMESTAMP);
INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES (NULL, '1', 'Пост о жизни', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', CURRENT_TIMESTAMP);
