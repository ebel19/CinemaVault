function filterFilms() {
    //convert text to lower case
    const input = document.getElementById('search').value.toLowerCase();
    //gets all rows
    const rows  = document.querySelectorAll('#filmTable tr');

    //loops throuhg
    rows.forEach(row => {
        //gets text in first column conversts to lower case
        const title = row.cells[0].textContent.toLowerCase();
        //if it matches show row and hide othors
        row.style.display = title.includes(input) ? '' : 'none';
    });
}