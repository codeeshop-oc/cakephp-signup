# Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
#
# Licensed under The MIT License
# For full copyright and license information, please see the LICENSE.txt
# Redistributions of files must retain the above copyright notice.
# MIT License (https://opensource.org/licenses/mit-license.php)

 CREATE TABLE `users` (
      `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
      `email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
      `phone_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
      `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
      `created` datetime DEFAULT NULL,
      `modified` datetime DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    ALTER TABLE `users`
      ADD PRIMARY KEY (`id`); 