<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="wrapper">

<div class="container mt-4"><h1>Task erstellen</h1>

    <div class="col-md-6">
        <form action="<?php echo base_url('Hauptcontroller/submitTasks') ?>" method="post">
            <!-- Add hidden input for ID -->
            <input type="hidden" name="id" value="<?php echo isset($update['id']) ? $update['id'] : ''; ?>">

            <div class="mb-3">
                <label class="form-label">Taskbeschreibung</label>
                <input type="text" class="form-control <?= (isset($error['Task'])) ? 'is-invalid' : '' ?>" id="Task"
                       name="Task"
                       value="<?= isset($tasks['Task']) ? $tasks['Task'] : (isset($update['tasks']) ? $update['tasks'] : '') ?>">
                <div class="invalid-feedback">
                    <?= isset($error['Task']) ? $error['Task'] : '' ?>
                </div>
            </div>

            <label>Person:</label>
            <div>
                <select class="form-control" id="Person" name="Person">
                    <?php for ($i = 0; $i < count($personen); $i++): ?>
                        <option value="<?php echo $personen[$i]['id'] ?>"
                            <?php if (isset($tasks['Person']) && $tasks['Person'] == $personen[$i]['id']) {
                                echo 'selected';
                            } elseif (isset($update['personenid']) && $update['personenid'] == $personen[$i]['id']) {
                                echo 'selected';
                            } ?>
                        >
                            <?php echo $personen[$i]['vorname'] . ' ' . $personen[$i]['name']; ?>
                        </option>
                    <?php endfor; ?>

                </select>
            </div>

            <div>
                <label>Erinnerungsdatum:</label><br>
                <input type="datetime-local" name="Erinnerungsdatum" id="Erinnerungsdatum"
                       value="<?= isset($tasks['Erinnerungsdatum']) ? $tasks['Erinnerungsdatum'] : (isset($update['erinnerungsdatum']) ? substr($update['erinnerungsdatum'], 0, 16) : '') ?>">
                ><br>
            </div>

            <div>
                <label class="form-label">Erinnerung</label>
                <select class="form-select" id="dropdown" name="Erinnerung">
                    <option value="0" <?php echo (isset($update['erinnerung']) && $update['erinnerung'] == 0) ? 'selected' : ''; ?>>
                        Nein
                    </option>
                    <option value="1" <?php echo (isset($update['erinnerung']) && $update['erinnerung'] == 1) ? 'selected' : ''; ?>>
                        Ja
                    </option>
                </select>
            </div>

            <div>
                <label>Notiz</label>
                <textarea class="form-control" name="Notiz"
                          id="Notiz"><?= isset($tasks['Notiz']) ? $tasks['Notiz'] : (isset($update['notizen']) ? $update['notizen'] : '') ?></textarea>
            </div>

            <div>
                <label class="form-label">Spalte</label>
                <select class="form-control" id="Spalte" name="Spalte">
                    <?php for ($i = 0; $i < count($spalten); $i++): ?>
                        <option value="<?php echo $spalten[$i]['id'] ?>"
                            <?php if (isset($tasks['Spalte']) && $tasks['Spalte'] == $spalten[$i]['id']) {
                                echo 'selected';
                            } elseif (isset($update['spaltenid']) && $update['spaltenid'] == $spalten[$i]['id']) {
                                echo 'selected';
                            } ?>
                        >
                            <?php echo $spalten[$i]['spalte']; ?>
                        </option>
                    <?php endfor; ?>

                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submitTasks" id="submitTasks">Speichern</button>
        </form>
        <a href="/public/hauptcontroller/tasks">
            <button type="button" class="btn btn-secondary">Abbrechen</button>
        </a>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
