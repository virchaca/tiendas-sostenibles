CREATE TABLE state (
    id INT PRIMARY KEY AUTO_INCREMENT,
    state_name VARCHAR(100) NOT NULL UNIQUE
);


INSERT INTO state (state_name) VALUES 
('Araba'), 
('Bizkaia'), 
('Guipuzcoa');


ALTER TABLE shops 
ADD COLUMN state_id INT,
ADD CONSTRAINT fk_shops_state FOREIGN KEY (state_id) REFERENCES state(id) ON DELETE SET NULL;


-- Se añade la columna state_id en shops (en lugar de state).
-- Se crea una clave foránea (FOREIGN KEY) para que state_id en shops esté relacionado con id en state.
-- ON DELETE SET NULL significa que si se elimina una provincia de state, los registros de shops que la usaban quedarán con NULL.

-- Actualizar los datos de la tabla shops, cmoo hemos cambiado state por state_id, hay que actualizar los datos existentes:

UPDATE shops SET state_id = (SELECT id FROM state WHERE state_name = 'Araba') WHERE state = 'Araba';
UPDATE shops SET state_id = (SELECT id FROM state WHERE state_name = 'Bizkaia') WHERE state = 'Bizkaia';
UPDATE shops SET state_id = (SELECT id FROM state WHERE state_name = 'Guipuzcoa') WHERE state = 'Guipuzcoa';

-- cambiar en state gipuzkoa por guipuzcoa
UPDATE shops SET state = 'Guipuzcoa' WHERE state = 'Guipuzkoa';


