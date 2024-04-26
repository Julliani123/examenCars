<style>
    h2 {
        color: #333;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        display: block;
        width: 100%;
        background-color: #3498db;
        color: #fff;
        padding: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button#btnCancel {
        background-color: #777;
        margin-top: 10px;
    }
</style>

<h2>{{modedsc}}</h2>

{{with drones}}
<form action="index.php?page=Drones_DronesForm&mode={{~mode}}&id={{id}}" method="POST">
    <label for="id">ID Dron</label>
    <input type="text" id="id" name="id" value="{{id}}" readonly />
    {{if id_error}}
    <div class="text-red-500 text-sm">{{id_error}}</div>{{endif id_error}}
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre del dron" value="{{nombre}}" {{if ~readonly}}
        readonly {{endif ~readonly}} />
    {{if nombre_error}}
    <div class="text-red-500 text-sm">{{nombre_error}}</div>{{endif nombre_error}}
    <br>
    <label for="fabricante">Fabricante</label>
    <input type="text" id="fabricante" name="fabricante" placeholder="Fabricante del dron" value="{{fabricante}}"
        {{if ~readonly}} readonly {{endif ~readonly}} />
    {{if fabricante_error}}
    <label for="modelo">Modelo</label>
    <input type="text" id="modelo" name="modelo" placeholder="Modelo del dron" value="{{modelo}}" {{if ~readonly}}
        readonly {{endif ~readonly}} />
    {{if modelo_error}}
    <div class="text-red-500 text-sm">{{modelo_error}}</div>{{endif modelo_error}}
    <br>
    <label for="tipo">Tipo</label>
    <input type="text" id="tipo" name="tipo" placeholder="Tipo de dron" value="{{tipo}}" {{if ~readonly}} readonly
        {{endif ~readonly}} />
    {{if tipo_error}}
    <div class="text-red-500 text-sm">{{tipo_error}}</div>{{endif tipo_error}}
    <br>
    <label for="precio">Precio</label>
    <input type="text" id="precio" name="precio" placeholder="Precio" value="{{precio}}" {{if ~readonly}} readonly
        {{endif ~readonly}} />
    {{if precio_error}}
    <div class="text-red-500 text-sm">{{precio_error}}</div>{{endif precio_error}}
    <br>
    {{if ~showConfirm}}
    <button type="submit" name="btnConfirm">Guardar</button>
    {{endif ~showConfirm}}
    <button id="btnCancel">Cancelar</button>
</form>
{{endwith drones}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("btnCancel").addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            document.location.assign("index.php?page=Drones_DronesList");
        });
    });
</script>