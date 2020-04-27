DELIMITER $$
create function reg_user_level (
	credit DECIMAL(10,2)
)
RETURNS VARCHAR(20)
DETERMINISTIC
BEGIN
    DECLARE reg_user_level VARCHAR(20);

    IF credit > 50000 THEN
		SET reg_user_level = 'PLATINUM';
    ELSEIF (credit >= 50000 AND 
			credit <= 10000) THEN
        SET reg_user_level = 'GOLD';
    ELSEIF credit < 10000 THEN
        SET reg_user_level = 'SILVER';
    END IF;
	-- return the customer level
	RETURN (reg_user_level);
END$$
DELIMITER ;