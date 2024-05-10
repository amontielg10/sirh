<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabla con Paginador</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .pagination {
        display: inline-block;
    }
    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
    }
    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }
    .pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>

<table id="myTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se insertarán los datos de la tabla -->
    </tbody>
</table>

<div class="pagination" id="pagination"></div>

<script>
// Datos de ejemplo para la tabla
const data = [
    { name: "John", age: 30, country: "USA" },
    { name: "Alice", age: 25, country: "UK" },
    { name: "Bob", age: 35, country: "Canada" },
    // Más datos...
];

const itemsPerPage = 2; // Cambiar según la cantidad de elementos que desees mostrar por página
let currentPage = 1;

function displayData(page) {
    const table = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    table.innerHTML = '';

    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    const paginatedData = data.slice(start, end);

    paginatedData.forEach(item => {
        const row = table.insertRow();
        row.insertCell(0).textContent = item.name;
        row.insertCell(1).textContent = item.age;
        row.insertCell(2).textContent = item.country;
    });
}

function setupPagination() {
    const pageCount = Math.ceil(data.length / itemsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= pageCount; i++) {
        const link = document.createElement('a');
        link.textContent = i;
        link.href = '#';
        if (i === currentPage) {
            link.classList.add('active');
        }
        link.addEventListener('click', () => {
            currentPage = i;
            displayData(currentPage);
            setupPagination();
        });
        pagination.appendChild(link);
    }
}

displayData(currentPage);
setupPagination();
</script>

</body>
</html>