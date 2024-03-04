<?php
    require 'header.php';
?>

<!-- start main content section -->
<div x-data="striped" id="striped">
    <div class="panel mt-6" id="listadoregistros">
        <div class="hover md:absolute md:top-[25px] md:mb-0 flex flex-wrap items-center left-between gap-4">
            <h5 class="font-semibold text-lg dark:text-white-light">Categoría para Hojas de Ruta</h5>
            <button type="button" class="btn btn-primary" id="btnagregar" onclick="mostrarform(true)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg> Nuevo
            </button>
        </div> 
        <br>
        <br> 
        <table id="tbllistado" class="table table-striped table-bordered table-compact" style="width:100%">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>  
    </div>
    <div class="panel mt-6" id="formularioregistros">
        <div class="flex flex-wrap items-center left-between">
            <h5 class="font-semibold text-lg dark:text-white-light">Categoría para Hojas de Ruta</h5>
        </div> 
        <br>
        <!-- forms grid -->
        <form name="formulario" id="formulario"  class="space-y-5">
            <div>
                <label for="nombre">Nombre</label>
                <input type="hidden" name="idcategoria" id="idcategoria">
                <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre" class="form-input mayusculas" maxlength="100" required />
            </div>
            <div class="flex center-between gap-2">
                <button type="submit" class="btn btn-primary !mt-6" id="btnGuardar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor"></path>
                    </svg>
                    Guardar
                </button>
                <button type="button" class="btn btn-danger !mt-6" id="btnCancelar" onclick="mostrarform(false)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
<!-- end main content section -->
<?php
    require 'footer.php';
?>       
<script type="text/javascript" src="js/categoria.js"></script>              