<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spalten Verwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="wrapper">

<div class="container mt-4">
    <h1>Spalte erstellen</h1>


    <div class="col-md-6">
        <form action="<?php echo base_url('Hauptcontroller/submitSpalten') ?>" method="post">
            <!-- Hidden input for ID (for update and delete) -->
            <input type="hidden" name="id" value="<?php echo isset($update['id']) ? $update['id'] : ''; ?>">

            <div class="mb-3">
                <label for="spalte" class="form-label">Spaltenbezeichnung</label>
                <input type="text" class="form-control <?= (isset($error['spalte'])) ? 'is-invalid' : '' ?>" id="spalte"
                       name="spalte"
                       value="<?= isset($spalten['spalte']) ? $spalten['spalte'] : (isset($update['spalte']) ? $update['spalte'] : '') ?>">
                <div class="invalid-feedback">
                    <?= isset($error['spalte']) ? $error['spalte'] : '' ?>
                </div>
            </div>


            <div class="mb-3">
                <label for="spaltenbeschreibung" class="form-label">Spaltenbeschreibung</label>
                <textarea class="form-control <?= (isset($error['spaltenbeschreibung'])) ? 'is-invalid' : '' ?>"
                          id="spaltenbeschreibung"
                          name="spaltenbeschreibung"><?= isset($spalten['spaltenbeschreibung']) ? $spalten['spaltenbeschreibung'] : (isset($update['spaltenbeschreibung']) ? $update['spaltenbeschreibung'] : '') ?></textarea>
                <div class="invalid-feedback">
                    <?= isset($error['spaltenbeschreibung']) ? $error['spaltenbeschreibung'] : '' ?>
                </div>
            </div>


            <div class="mb-3">
                <label for="sortid" class="form-label">Sortid</label>
                <input type="text" class="form-control <?= (isset($error['sortid'])) ? 'is-invalid' : '' ?>" id="sortid"
                       name="sortid"
                       value="<?= isset($spalten['sortid']) ? $spalten['sortid'] : (isset($update['sortid']) ? $update['sortid'] : '') ?>">
                <div class="invalid-feedback">
                    <?= isset($error['sortid']) ? $error['sortid'] : '' ?>
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label">Board</label>
                <select class="form-control" id="boardsid" name="boardsid">
                    <?php foreach ($boards as $board): ?>
                        <option value="<?php echo $board['id']; ?>"
                            <?php
                            if (isset($spalten['boardsid']) && $spalten['boardsid'] == $board['id']) {
                                echo 'selected';
                            } elseif (isset($update['boardsid']) && $update['boardsid'] == $board['id']) {
                                echo 'selected';
                            }
                            ?>
                        >
                            <?php echo $board['board']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary" name="submitSpalte" id="submitSpalte">Speichern</button>
            <!-- Adjusted name to match your button naming convention -->

            <a href="/public/Hauptcontroller/spalte">
                <button type="button" class="btn btn-secondary">Abbrechen</button>
            </a>
        </form>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
