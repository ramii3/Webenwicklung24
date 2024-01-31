<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="wrapper">




<div class="container mt-4"><h1>Spalten erstellen</h1>

    <div class="row">

        <div class="col-md-6"><form>
                <div class="mb-3">
                    <label for="spaltenBezeichnung" class="form-label">Spaltenbezeichnung</label>
                    <input type="text" class="form-control" id="spaltenBezeichnung" placeholder="Gib hier die Spaltenbezeichnung ein">
                </div>
                <div class="mb-3"><label for="spaltenBeschreibung" class="form-label">Spaltenbeschreibung</label>
                    <textarea class="form-control" id="spaltenBeschreibung" rows="3" placeholder="Gib hier die Spaltenbeschreibung ein"></textarea>
                </div>
                <div class="mb-3"><label for="sortID" class="form-label">SortID</label>
                    <input type="text" class="form-control" id="sortID"></div>
                <div class="mb-3">
                    <label for="dropdown" class="form-label">Dropdown-Auswahl</label>
                    <select class="form-select" id="dropdown">
                        <option selected>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Speichern</button>
                <button type="button" class="btn btn-secondary">Abbrechen</button>
            </form>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
