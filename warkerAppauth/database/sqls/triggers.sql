DELIMITER $$

CREATE TRIGGER excluir_postos
    BEFORE DELETE
    ON cidades FOR EACH ROW
BEGIN
    delete from postos where cidade_id=old.id;
END$$    

DELIMITER ;