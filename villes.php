<datalist id="ville"></datalist>

<script>
    function Ville() {

        const request = "https://geo.api.gouv.fr/communes?nom=" + document.getElementById("choix_ville").value + "&fields=departement&boost=population&limit=5";

        async function loadData(url) {
            const request = await fetch(url);
            const data_ville = await request.json();
            return data_ville;
        }

        loadData(request).then(function(data_ville) {
            console.log(data_ville);
            //Tableaux
            let nom_commune = [];
            let code_postale = [];
            //Afficher le nom
            for (let b = 0; b < data_ville.length; b++) {
                let count = "<option>" + data_ville[b].nom + "</option>";
                let list = document.getElementById("ville");

                nom_commune.push(count);
                document.getElementById("ville").innerHTML = nom_commune;
            }
        });
    }
</script>