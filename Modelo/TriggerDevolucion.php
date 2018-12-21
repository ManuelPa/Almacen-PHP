<?php

//Este trigger recupera la caja seleccionada de backup y la retorna a su tabla, la volvemos a meter en la tabla ocupación y actualizamos las 
//lejas ocupadas de la tabla estantería.
//Si ya existe el Trigger, lo eliminamos antes de la base de datos
$conexion->query("DROP TRIGGER IF EXISTS TriggerDevolucion");
$codigo = $objcaja->getCodigo();
$altura = $objcaja->getAltura();
$anchura = $objcaja->getAnchura();
$profundidad = $objcaja->getProfundidad();
$color = $objcaja->getColor();
$material = $objcaja->getMaterial();
$contenido = $objcaja->getContenido();
$fecha_alta = $objcaja->getFecha_alta();

$trigger = "
        CREATE TRIGGER TriggerDevolucion AFTER DELETE ON cajabackup FOR EACH ROW BEGIN
            DECLARE new_id INT;
            INSERT INTO caja VALUES(null,'" . $codigo . "', $altura, $anchura, $profundidad,'" . $color . "','" . $material . "','" . $contenido . "','" . $fecha_alta . "');
            SELECT id INTO new_id FROM caja WHERE codigo='" . $codigo . "';
            INSERT INTO ocupacion VALUES(null, new_id, $idestanteria, $leja);
            UPDATE estanteria SET lejasocupadas=lejasocupadas+1 WHERE id=$idestanteria;
        END;
    ";
