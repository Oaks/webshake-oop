CREATE TABLE `users` (
      `id` int(11) NOT NULL,
      `nickname` varchar(128) NOT NULL,
      `email` varchar(255) NOT NULL,
      `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
      `role` enum('admin','user') NOT NULL,
      `password_hash` varchar(255) NOT NULL,
      `auth_token` varchar(255) NOT NULL,
      `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES (NULL, 'admin', 'admin@gmail.com', '1', 'admin', 'hash1', 'token1', CURRENT_TIMESTAMP);
INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES (NULL, 'user', 'user@gmail.com', '1', 'user', 'hash2', 'token2', CURRENT_TIMESTAMP);
