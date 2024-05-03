function drawTable(container, data, columnData, title) {
    const columns = columnData.map((column) => ({ data: column.field, title: column.name}))
    columns.splice(0, 0, { data: "year", title: "Year" });
    
    $(`#${container}`).DataTable({
        data,
        columns,
        dom: 'Bfrtip',
        buttons: [
            { extend: "excel", title },
            { extend: "pdf", title }
        ],
    });
}