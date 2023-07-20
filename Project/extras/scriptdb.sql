CREATE TABLE `detran`.`user` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `matricula` INT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    `starte_date` DATE NOT NULL , 
    `is_admin` BOOLEAN NOT NULL , 
    `is_ativo` BOOLEAN NOT NULL , 
    PRIMARY KEY (`id`(6))) 
ENGINE = InnoDB;