<?php

include_once 'ConectarBD.php';
include_once '../Modelo/inventario.php';
include_once '../Modelo/caja.php';
include_once '../Modelo/estanteria.php';
include_once '../Modelo/ocupacion.php';
include_once '../Modelo/cajaposicion.php';
include_once '../Modelo/estanteriacaja.php';
include_once '../Modelo/cajabackup.php';
include_once '../Modelo/usuario.php';

class Operaciones {
    
    /**
     * Esta funcion coge el objeto estanteria por parametro y hace un insert en la tabla estanteria.
     * @global type $conexion
     * @param type $estanteria
     * @return boolean
     */
    public function setEstanteria($estanteria) {
        global $conexion;
        $conexion->autocommit(false);
        $orden = "INSERT INTO estanteria VALUES (null,'" . $estanteria->getCodigo() . "'," . $estanteria->getNlejas() . "," . $estanteria->getLejasocupadas() . "," . $estanteria->getNumero() . ",'" . $estanteria->getPasillo() . "','" . $estanteria->getMaterial() . "')";
        $conexion->query($orden);
        if ($conexion->affected_rows == 1) {
            $conexion->commit();
            $conexion->close();
            return true;
        } else {
            $conexion->rollback();
            $conexion->close();
            return false;
        }
        $conexion->close();
    }
    
    /**
     * En esta funcion realizamos una consulta para recoger los datos de la tabla estanteria, crearemos un array para llenarlo de objetos de estanteria y lo devolveremos.
     * @global type $conexion
     * @return array
     */
    public function setListadoestanteria() {
        global $conexion;
        $orden = "SELECT * FROM estanteria";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_array();
            $array = array();
            while ($fila) {
                array_push($array, new estanteria($fila['codigo'], $fila['nlejas'], $fila['lejasocupadas'], $fila['numero'], $fila['pasillo'], $fila['material']));
                $fila = $resultado->fetch_array();
            }
            return $array;
        } else {
            return null;
        }
        $conexion->close();
    }
    /**
     * En este metodo hacemos una consulta a la tabla estanteria cuando haya lejas disponibles en esa estanteria, crearemos un array que llenaremos de objetos de tipo estanteria.
     * @global type $conexion
     * @return array
     */
    public function setListadoestanterialibres() {
        global $conexion;
        $orden = "SELECT * FROM estanteria WHERE lejasocupadas<nlejas";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_array();
            $array = array();
            while ($fila) {
                $estanteria = new estanteria($fila['codigo'], $fila['nlejas'], $fila['lejasocupadas'], $fila['numero'], $fila['pasillo'], $fila['material']);
                $estanteria->setId($fila['id']);
                array_push($array, $estanteria);

                $fila = $resultado->fetch_array();
            }
            return $array;
        } else {
            return null;
        }
        $conexion->close();
    }
    /**
     * En este metodo hacemos una consulta a la tabla caja, crearemos un array para llenarlo de objetos de tipo caja.
     * @global type $conexion
     * @return array
     */
    public function setListadocaja() {
        global $conexion;
        $orden = "SELECT * FROM caja";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_array();
            $array = array();
            while ($fila) {
                array_push($array, new caja($fila['codigo'], $fila['altura'], $fila['anchura'], $fila['profundidad'], $fila['color'], $fila['material'], $fila['contenido'], $fila['fecha_alta']));
                $fila = $resultado->fetch_array();
            }
            return $array;
        } else {
            return null;
        }
        $conexion->close();
    }
    /**
     * En este metodo recibiremos el id de una estanteria, consultaremos la tabla estanteria con esa id y crearemos un objeto con esa estanteria, crearemos un array 
     * vacio con el numero de lejas de la estanteria consultada para llenarlo con las posiciones libres, para ello hacemos una consulta a ocupacion con el id de nuestra estanteria
     * y llenaremos el array vacio en la posicion y el valor con la leja que recuperemos de ocupacion. Finalmente creamos un arraylejasvacias donde con un for comprobaremos si el arrayvacio
     * en esa posicion esta vacio, si es el caso añadiremos al arraylejasvacias ese valor. Cuando acabe el ultimo bucle tendremos el array listo para devolver.
     * @global type $conexion
     * @param type $idestanteria
     * @return int
     */
    public function getlejaso($idestanteria) {
        global $conexion;
        $orden = "SELECT * FROM estanteria WHERE id = $idestanteria";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) {
            //Con esto conseguiremos las filas de estanteria con ese id, ahora para trabajar con el crearemos un objeto de tipo estanteria.
            $estanteria = $resultado->fetch_array();
            $objetoestanteria = new estanteria($estanteria['codigo'], $estanteria['nlejas'], $estanteria['lejasocupadas'], $estanteria['numero'], $estanteria['pasillo'], $estanteria['material']);
            //Necesitaremos un array con el numero de lejas de nuestra estanteria, para generar un array que quede de forma que las posiciones nulas sean las libres.
            for ($i = 0; $i < ($objetoestanteria->getNlejas() + 1); $i++) {
                $arrayvacio[] = null;
            }
            //Necesitaremos la ocupacion que tiene la estanteria y para trabajar con ella deberemos meterlo en un objeto.
            $ordeno = "SELECT * FROM ocupacion WHERE id_estanteria= $idestanteria ORDER BY posicionleja";
            $resultadoo = $conexion->query($ordeno);
            $ocupacion = $resultadoo->fetch_array();
            //Realizamos un bucle que metera valores en las posiciones cuyos valores sean igual al valor que queremos meter en esa posicion.
            while ($ocupacion) {
                $objetocupacion = new ocupacion($ocupacion['id_caja'], $ocupacion['id_estanteria'], $ocupacion['posicionleja']);
                $arrayvacio[$objetocupacion->getPosicion()] = $objetocupacion->getPosicion();
                $ocupacion = $resultadoo->fetch_array();
            }
            for ($i = 1; $i < ($objetoestanteria->getNlejas() + 1); $i++) {
                if ($arrayvacio[$i] == null) {
                    $arraylejasvacias[] = $i;
                }
            }
            $conexion->close();
            return $arraylejasvacias;
        } else {
            return null;
        }
    }
    /**
     * En este metodo recibiremos por parametros el id de la estanteria, el numero de la leja y un objeto caja, con esos datos ejecutaremos las ordenes de insert en caja y ocupacion para
     * relacionar la caja con la estanteria, y por ultimo un update donde incrementaremos el valor de las lejasocupadas en uno. Finalmente retornaremos true o false, segun el caso.
     * @global type $conexion
     * @param type $idestanteria
     * @param type $numeroleja
     * @param type $objcaja
     * @return boolean
     */
    public function setCaja($idestanteria, $numeroleja, $objcaja) {
        global $conexion;
        $conexion->autocommit(false);
        $orden = "INSERT INTO caja VALUES(null, '" . $objcaja->getCodigo() . "'," . $objcaja->getAltura() . "," . $objcaja->getAnchura() . "," . $objcaja->getProfundidad() . ",'" . $objcaja->getColor() . "','" . $objcaja->getMaterial() . "','" . $objcaja->getContenido() . "', curdate())";
        $conexion->query($orden);
        if ($conexion->affected_rows == 1) {
            $ordeno = "INSERT INTO ocupacion VALUES(null,LAST_INSERT_ID(),$idestanteria,$numeroleja)";
            $conexion->query($ordeno);
            if ($conexion->affected_rows == 1) {
                $ordenu = "UPDATE estanteria SET lejasocupadas = lejasocupadas + 1 WHERE id = $idestanteria";
                $conexion->query($ordenu);
                if ($conexion->affected_rows == 1) {
                    $conexion->commit();
                    $conexion->close();
                    return true;
                } else {
                    $conexion->rollback();
                    $conexion->close();
                    return "Error al actualizar la tabla estanteria. " . $conexion->errno;
                }
            } else {
                $conexion->rollback();
                $conexion->close();
                return "Error al insertar en la tabla ocupacion. " . $conexion->errno;
            }
        } else {
            $conexion->rollback();
            $conexion->close();
            return "Error al insertar en la tabla caja. Duplicacion de codigo. " . $conexion->errno;
        }
    }
    /**
     * En este metodo construimos un objeto de tipo inventario donde primero lo inicializaremos con la fecha, consultaremos todas las estanterias con lejas libres ordenadas por pasillo y numero,
     * con eso montaremos el objeto estanteriacaja, que contendra cajas con posicion, por lo que haremos una consulta a la tabla caja y ocupacion cuando el id de la estanteria en ocupacion
     * sea igual al id de la estanteria que acabamos de consultar y el id de la caja de ocupacion sea igual al id de la caja. Haremos un bucle while y crearemos el objeto cajaposicion por cada resultado de la consulta
     * anterior, entonces añadiremos la leja a cajaposicion y la caja al objeto estanteriacaja. Cuando no haya mas cajas en esa estanteria, añadiremos la estanteria al objeto inventario y lo devolveremos.
     * @global type $conexion
     * @return \inventario
     */
    public function setInventario() {
        global $conexion;
        //Creamos un objeto de tipo inventario que inicializaremos con la fecha de hoy.
        $inventario = new inventario(date("d-m-Y"));
        //Selecciono las estanterías que tengan baldas ocupadas y las ordeno por pasillo y número
        $query = "SELECT * FROM estanteria WHERE lejasocupadas>=0 order by pasillo,numero";
        $resultadoe = $conexion->query($query);
        if ($resultadoe->num_rows > 0) {
            $est = $resultadoe->fetch_array();
            while ($est) {
                //Creamos un objeto de tipo estanteriacaja
                $estanteria = new estanteriacaja($est['codigo'], $est['nlejas'], $est['lejasocupadas'], $est['numero'], $est['pasillo'], $est['material']);

                //Añadiremos las cajas
                $queryc = "SELECT * FROM caja, ocupacion WHERE ocupacion.id_estanteria =" . $est['id'] . " AND ocupacion.id_caja = caja.id";
                $resultadoc = $conexion->query($queryc);
                if ($resultadoc->num_rows > 0) {
                    $caj = $resultadoc->fetch_array();
                    while ($caj) {
                        //Creamos un objeto de tipo cajaposicion para introducirlo en el objeto de estanteriacaja
                        $caja = new cajaposicion($caj['codigo'], $caj['altura'], $caj['anchura'], $caj['profundidad'], $caj['color'], $caj['material'], $caj['contenido'], $caj['fecha_alta']);
                        $caja->setleja($caj['posicionleja']);
                        $estanteria->setCajaposicion($caja);
                        $caj = $resultadoc->fetch_array();
                    }
                }

                //Añadiremos las estanterias,que tiene a su vez las cajas dentro, para asi conseguir un objeto de tipo inventario con la fecha, las estanterias y las cajas.
                $inventario->setEstanteriacaja($estanteria);
                $est = $resultadoe->fetch_array();
            }
        }
        $conexion->close();
        return $inventario;
    }
    /**
     * Este metodo recibe el codigo de la caja y cosulta sus datos en la base de datos, por ultimo devuelve el objeto.
     * @global type $conexion
     * @param type $codigo
     * @return \caja
     */
    public function getCaja($codigo) {
        global $conexion;
        //Generamos la consulta que nos dara la caja con ese codigo.
        $sql = "SELECT * FROM caja WHERE codigo =  '$codigo'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $filacaja = $resultado->fetch_array();
            //Introducimos la fila encontrada en un objeto caja.
            $caja = new caja($filacaja['codigo'], $filacaja['altura'], $filacaja['anchura'], $filacaja['profundidad'], $filacaja['color'], $filacaja['material'], $filacaja['contenido'], $filacaja['fecha_alta']);
            return $caja;
        } else {
            return null;
        }
    }
    /**
     * Este metodo recibe un codigo y borra una caja de la base de datos(Es aquí donde el trigger triggersalidacaja es disparado).
     * @global type $conexion
     * @param type $codigo
     * @return boolean
     */
    public function salidacaja($codigo) {
        global $conexion;
        $conexion->autocommit(false);
        //Generamos la sentencia que borre la caja.
        $sql = "DELETE FROM caja WHERE codigo = '$codigo'";
        $conexion->query($sql);
        if ($conexion->affected_rows > 0) {
            $conexion->commit();
            $conexion->close();
            return true;
        } else {
            $conexion->rollback();
            $conexion->close();
            return "Error en el borrado de la caja. " . $conexion->errno;
        }
    }
    /**
     * Este metodo recibe un codigo de caja y consulta la tabla cajabackup, devuelve un objeto de tipo cajabackup.
     * @global type $conexion
     * @param type $codigo
     * @return \cajabackup
     */
    public function getCajabackup($codigo) {
        global $conexion;
        //Generamos la consulta que nos dara la caja con ese codigo.
        $sql = "SELECT * FROM cajabackup WHERE codigo =  '$codigo'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $filacaja = $resultado->fetch_array();
            //Introducimos la fila encontrada en un objeto caja.
            $caja = new cajabackup($filacaja['codigo'], $filacaja['altura'], $filacaja['anchura'], $filacaja['profundidad'], $filacaja['color'], $filacaja['material'], $filacaja['contenido'], $filacaja['fecha_alta'], $filacaja['fecha_baja'], $filacaja['codigo_est'], $filacaja['posicionleja']);
            return $caja;
        } else {
            return null;
        }
    }
    /**
     * Este metodo recibe un objeto de tipo caja, el id de la estanteria y la leja donde se va a posicionar. Crearemos el triggerDevolucion con los datos recibidos por parametros,
     * borramos la caja de la tabla cajabackup y si todo funciona bien devolveremos un true.
     * @global type $conexion
     * @param type $objcaja
     * @param type $idestanteria
     * @param type $leja
     * @return boolean|string
     */
    public function devolucioncajabackup($objcaja, $idestanteria, $leja) {
        global $conexion;
        $conexion->autocommit(false);
        //Incluímos el trigger de devolución
        include_once '../Modelo/TriggerDevolucion.php';
        $borrado = "DELETE FROM cajabackup WHERE codigo='" . $objcaja->getCodigo() . "'";

        $result_trigger = $conexion->query($trigger);
        $result_borrado = $conexion->query($borrado);

        if (!$result_trigger) {
            $mensaje = "Error con el trigger";
            $conexion->rollback();
            return $mensaje;
        } else if ($result_borrado->affected_rows == 1) {
            $mensaje = "Error con el borrado de caja backup: " . $conexion->errno;
            $conexion->rollback();
            return $mensaje;
        } else if ($result_borrado === true && $result_trigger === true) {
            $conexion->commit();
            return true;
        }
    }
    /**
     * En esta funcion recibiremos un objeto usuario con los datos introducidos, si hay un usuario registrado retornamos un false, si no insertaremos en la tabla usuario los datos recibidos
     * si todo va bien retornamos un true.
     * @global type $conexion
     * @param type $objusuario
     * @return boolean
     */
    public function crearUsuario($objusuario) {
        global $conexion;

        $conexion->autocommit(false);
        $consulta = "SELECT * FROM usuario";
        $resultadoc = $conexion->query($consulta);
        if ($resultadoc->num_rows == 1) {
            return false;
        } else {
            $usuario = $objusuario->getUsuario();
            $contra = $objusuario->getContraseña();
            $encriptado = password_hash($contra, PASSWORD_BCRYPT);

            $sentencia = $conexion->prepare("INSERT INTO usuario VALUES (null, ?, ?)");
            $sentencia->bind_param("ss", $usuario, $encriptado);

            $sentencia->execute();
            if ($sentencia->affected_rows > 0) {
                $conexion->commit();
                return true;
            } else {
                $conexion->rollback();
                return false;
            }
        }
    }
    /**
     * Esta funcion recibe un objeto usuario, consultaremos la tabla usuario, si coincide el usuario y la contraseña retornaremos un true.
     * @global type $conexion
     * @param type $objusuario
     * @return boolean
     */
    public function login($objusuario) {
        global $conexion;

        $usuario = $objusuario->getUsuario();
        $contralog = $objusuario->getContraseña();

        $consulta = "SELECT * FROM usuario";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            $filausuario = $resultado->fetch_array();

            $usuariobd = $filausuario['usuario'];
            $contrabd = $filausuario['password'];

            $resultadop = password_verify($contralog, $contrabd);
            if ($usuario == $usuariobd && $resultadop) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
