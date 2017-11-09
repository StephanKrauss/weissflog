<div class="row">

    <div class="col-lg-3">
        <div class="list-group">
            <a href="/admin/" class="list-group-item">Artikel anlegen</a>
            <a href="/admin/uebersicht/" class="list-group-item active">Artikel Übersicht</a>
        </div>
    </div>

    <div class="col-lg-9">
        <p>vorhandene Artikel:</p>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Kategorie</th>
                <th>Position</th>
                <th>Beschreibung</th>
                <th>löschen</th>
                <th>duplizieren</th>
            </tr>
            </thead>
            <tbody>
            {% for eintrag in tabelle %}
            <tr>
                <td>{{eintrag.darstellung}}</td>
                <td>{{eintrag.position}}</td>
                <td>{{eintrag.description}}</td>
                <td><a href="/admin/uebersicht/{{eintrag.categorie}}/{{eintrag.file}}">>> löschen <<</a></td>
                <td><a href="/admin/einzel/{{eintrag.categorie}}/{{eintrag.file}}">>> duplizieren <<</a></td>
            </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>