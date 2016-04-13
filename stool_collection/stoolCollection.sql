CREATE TABLE `stoolCollection` (
  `id` INT AUTO_INCREMENT,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(128),
  `image` VARCHAR(64),
  PRIMARY KEY (`id`)
);

INSERT INTO `stoolCollection` VALUES (1, '2015-10-02 14:37:34', 'Interesting three legged thing', 'foo.gif');
