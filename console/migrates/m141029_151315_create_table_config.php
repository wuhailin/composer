<?php

class m141029_151315_create_table_config extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `config` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL COMMENT '名称',
  `value` TEXT NULL COMMENT '配置参数',
  `update_time` INT UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY (`key`)
  )
ENGINE = MyISAM
COMMENT = '配置信息表';";
        $this->execute($sql);
    }

    public function safeDown()
    {
        $sql = 'DROP TABLE IF EXISTS `config`;';
        $this->execute($sql);
    }
}