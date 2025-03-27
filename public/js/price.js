
document.addEventListener('DOMContentLoaded', function () {
    const mainRows = document.querySelectorAll('.main-row');

    mainRows.forEach(row => {
        row.addEventListener('click', function () {
            const rowId = this.getAttribute('data-row');
            const subRow = document.getElementById(`sub-row-${rowId}`);

            // Toggle display of the sub-row
            if (subRow.style.display === 'table-row') {
                subRow.style.display = 'none';
            } else {
                subRow.style.display = 'table-row';
            }
        });
    });
});