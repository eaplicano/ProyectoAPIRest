<?php
    class Sociosnegocio extends Conectar
    {
        public function get_sociosnegocio()
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_socionegocio($id)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE estado=1 AND id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_sociosnegocio($nombre,$razonsocial,$direccion,$tipo,$contacto,$email,$telefono)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_socios_negocio(nombre,razon_social,direccion,tipo_socio,contacto,email,telefono,estado)
            VALUES (?,?,?,?,?,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$razonsocial);
            $sql->bindValue(3,$direccion);
            $sql->bindValue(4,$tipo);
            $sql->bindValue(5,$contacto);
            $sql->bindValue(6,$email);
            $sql->bindValue(7,$telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_socionegocio($id,$nombre,$razonsocial,$direccion,$tipo,$contacto,$email,$telefono,$estado)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_socios_negocio SET nombre=?,razon_social=?,direccion=?,tipo_socio=?,contacto=?,email=?,telefono=?,estado=?
            WHERE id=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$razonsocial);
            $sql->bindValue(3,$direccion);
            $sql->bindValue(4,$tipo);
            $sql->bindValue(5,$contacto);
            $sql->bindValue(6,$email);
            $sql->bindValue(7,$telefono);
            $sql->bindValue(8,$estado);
            $sql->bindValue(9,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_socionegocio($id)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_socios_negocio WHERE id=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>