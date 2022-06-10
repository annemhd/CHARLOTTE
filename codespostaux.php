<datalist id="code_postal"></datalist>

<script>
    function CodePostal() {

        const request = "https://geo.api.gouv.fr/communes?codePostal=" + document.getElementById("choix_postal").value;
        // const request = "https://geo.api.gouv.fr/communes?codePostal=93100";

        async function loadData(url) {
            const request = await fetch(url);
            const data = await request.json();
            return data;
        }

        loadData(request).then(function(data) {
            console.log(data);
            //Tableaux
            let code_postal = [];
            //Afficher le code postal
            for (let b = 0; b < data.length; b++) {
                let count = "<option>" + data[b].codesPostaux[0] + "</option>";
                let list = document.getElementById("code_postal");

                code_postal.push(count);
                document.getElementById("code_postal").innerHTML = code_postal;
            }
        });
    }
</script>