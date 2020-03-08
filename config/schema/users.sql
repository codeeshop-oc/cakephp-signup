# Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
#
# Licensed under The MIT License
# For full copyright and license information, please see the LICENSE.txt
# Redistributions of files must retain the above copyright notice.
# MIT License (https://opensource.org/licenses/mit-license.php)

 CREATE TABLE `users` (
      `id` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
      `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,      
      `phone_no` varchar(10) UNIQUE KEY COLLATE utf8_unicode_ci,
      `password` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
      `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `modified` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    