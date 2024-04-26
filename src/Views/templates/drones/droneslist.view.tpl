<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>


<section>
    <h2>Drones registrados</h2>
</section>
<section>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fabricante</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th><a href="index.php?page=drones_dronesform&mode=INS">Nuevo</a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach drones}}
            <tr>
                <td>{{id}}</td>
                <td>{{nombre}}</td>
                <td>{{fabricante}}</td>
                <td>{{modelo}}</td>
                <td>{{tipo}}</td>
                <td>{{precio}}</td>
                <td>
                    <a href="index.php?page=drones_dronesform&mode=UPD&id={{id}}">Editar</a> |
                    <a href="index.php?page=drones_dronesform&mode=DEL&id={{id}}}">Eliminar</a>
                </td>
            </tr>
            {{endfor drones}}
        </tbody>
    </table>
</section>