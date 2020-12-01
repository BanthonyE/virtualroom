<!-- CONSULTAR CONTROLADOR-->

$dato_tabla='T_USUARIO_REGISTRADO';

$dato_select['NOMB_USUARIO']='NOMB_USUARIO';
$dato_select['PASS_USUARIO']='PASS_USUARIO';


$dato_where['ESTADO_USUARIO']='HABILITADO';

$dato_general['dato_select']=$dato_select;
$dato_general['dato_where']=$dato_where;
$dato_general['dato_tabla']=$dato_tabla;

$respuesta= $this->model_usuario->prueba_consulta($dato_general);

<!-- CONSULTAR MODELO-->

$sql = $this->db->select($dato['dato_select']);
$sql = $this->db->from($dato['dato_tabla']);
$sql = $this->db->where($dato['dato_where']);

if ($sql) {
$sql = $this->db->get();
var_dump($sql->row());
}else{
echo("Error");
}

<!-- INSERTAR CONTROLADOR-->

$dato_tabla='T_USUARIO_REGISTRADO';

$dato_insert['NOMB_USUARIO']='NOMB_USUARIO';
$dato_insert['PASS_USUARIO']='PASS_USUARIO';

$dato_general['dato_tabla']=$dato_tabla;
$dato_general['dato_insert']=$dato_insert;

$respuesta= $this->model_usuario->prueba_consulta($dato_general);

<!-- INSERTAR MODELO-->

$sql = $this->db->insert($dato['dato_tabla'], $dato['dato_insert']);

if ($sql) {
echo "exito";
}else{
echo("Error");
}


<!-- DELETE CONTROLLER-->

$dato_tabla='TIPO_DOCUMENTO';

$dato_delete['ID_TIPODOCUMENTO']=5;

$dato_general['dato_tabla']=$dato_tabla;
$dato_general['dato_delete']=$dato_delete;

$respuesta= $this->model_usuario->prueba_delete($dato_general);


<!-- DELETE MODEL-->
$sql = $this->db->delete($dato['dato_tabla'], $dato['dato_delete']);



<!-- update CONTROLLER-->

$dato_tabla='TIPO_DOCUMENTO';

$dato_update['NOMB_TIPODOCUMENTO']='Pasaporte';

$dato_where['ID_TIPODOCUMENTO']=3;

$dato_general['dato_tabla']=$dato_tabla;
$dato_general['dato_update']=$dato_update;
$dato_general['dato_where']=$dato_where;

$respuesta= $this->model_usuario->prueba_update($dato_general);



<!-- update MODEL-->
$sql = $this->db->where($dato['dato_where']);
$sql = $this->db->update($dato['dato_tabla'], $dato['dato_update']);