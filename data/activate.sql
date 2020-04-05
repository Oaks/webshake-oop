CREATE TABLE `users_activation_codes` (
      `id` int(11) NOT NULL,
      `user_id` int(11) NOT NULL,
      `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users_activation_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `code` (`code`);

ALTER TABLE `users_activation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

