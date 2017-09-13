<div class="row">

    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item active">Artikel anlegen</a>
            <a href="#" class="list-group-item">Artikel Übersicht</a>
        </div>
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
        <div class="card mt-4">
            <form method="post" action="/admin/">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="input01">Kategorie*</label>
                  <div class="col-md-6">
                      <select name="category" class="col-md-4">
                          {% for category in categories %}
                              <option value="{{category.link}}">{{category.description}}</option>
                          {% endfor %}
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="input01">Überschrift*</label>
                  <div class="col-md-6">
                    <input placeholder="Überschrift" class="form-control input-md" pattern=".{3,}" type="text" name="ueberschrift" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="input01">Kurzbeschreibung*</label>
                  <div class="col-md-9">
                    <input placeholder="Artikelbeschreibung" pattern=".{10,}" class="form-control input-md" type="text" name="kurzbeschreibung" required>
                  </div>
                </div>

                <div class="form-group">
                    <label for="comment" class="col-md-4 control-label">Text*</label>
                    <textarea class="form-control" rows="5" name="text"></textarea>
                </div>

                <div class="form-group">
                    <label class="btn btn-default">
                        <button class="btn btn-warning" type="submit">Bild auswählen</button> <input type="file" hidden>
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-success" type="submit">Artikel eintragen</button>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

</div>