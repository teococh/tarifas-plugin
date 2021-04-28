
<?php
    global $wpdb;
    $query = "SELECT * FROM wp_tarifas";
    $lista = $wpdb->get_results($query, ARRAY_A);

    
?>

<div class="wrap">
    <?php echo "<h1>".get_admin_page_title()."</h1>"; ?>

    <table class="wp-list-table widefat fixed striped pages">
    <thead>
        <th><b>id tarifa</b></th>
        <th><b>minutos</b></th>
        <th><b>gigas</b></th>
        <th><b>precio</b></th>
    </thead>
    <tbody id="the-list">
                    <?php
                        
                        foreach ($lista as $key => $value) {
                            $id = $value['tarifa_id'];
                            $minutos = $value['minutos'];
                            $gigas = $value['gigas'];
                            $precio = $value['precio'];
                            echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$minutos</td>
                                    <td>$gigas</td>
                                    <td>$precio</td>
                                </tr>
                            ";    
                        }
                        
                    ?>
                </tbody>
    </table>
                

    <div class="container"><br>
    <!-- Trigger the modal with a button -->
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Nueva tarifa</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn btn-light" data-bs-toggle="modal" data-bs-target="#myModal">&times;</button>
                <h4 class="modal-title">Nueva tarifa</h4>
            </div>
            <div class="modal-body">
                <form action='' method="post">
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre de la tarifa"><br>
                            <input type="number" name="precio" id="precio" placeholder="Precio de la tarifa"><br>
                            <select name="tipoBloque" id="tipoBloque">
                                <option disabled selected>Tipo de bloque</option>
                                <option value="fibra">Fibra</option>
                                <option value="movil">Movil</option>
                            </select>
                        </div>
                    </div>
                    <div id="fibra" class="row col-12 d-none">
                        <div class="form-group">
                            <label for="tipoFibra">Bloque fibra</label><br>
                            <input type="number" name="minFibra" id="minFibra" placeholder="Minutos">
                            <input type="number" name="mFibra" id="mFibra" placeholder="Banda ancha fibra">

                        </div>
                    </div>
                    <div id="movil" class="row d-none">
                        <div class="form-group col-12">
                            <label for="tipoMovil">Bloque movil</label><br>
                            <select name="tipoMovil" id="tipoMovil">
                                <option disabled selected>Tipo de bloque movil</option>
                                <option value="sencillo">Sencillo</option>
                                <option value="compartido">Compartido</option>
                            </select><br>
                            <input type="number" name="numMoviles" id="numMoviles" placeholder="Numero de lineas">
                            <div id="contMoviles">
                                
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default bg-default" name="send" id="send">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#myModal">Close</button>
            </div>
        </div>
        
        </div>
    </div>
    
    </div>
</div>


<?php 

if (isset($_POST['send'])) {
    
    $tarifa_id = $_POST['nombre'];
    $minutos = 200;
    $gigas = 200;
    $precio = $_POST['precio'];
    
    $sql = "INSERT INTO `wp_tarifas`(`tarifa_id`, `minutos`, `gigas`, `precio`) VALUES ('$tarifa_id','$minutos','$gigas','$precio');";
    
            
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

?>