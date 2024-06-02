// CHAMP DE RECHERCHE SCRIPT
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('input[type="text"]');
    const tableRows = document.querySelectorAll('tbody tr');
    searchInput.addEventListener("input", function () {
        const searchText = this.value.trim().toLowerCase();

        tableRows.forEach(function (row) {
            const nom = row.querySelector('td:nth-child(1)').textContent.trim().toLowerCase();
            const prenom = row.querySelector('td:nth-child(1)').textContent.trim().toLowerCase();
            const entreprise = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();

            if (nom.includes(searchText) || prenom.includes(searchText) || entreprise.includes(searchText)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
