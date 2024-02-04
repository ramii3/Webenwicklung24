<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="wrapper">

<div class="container mt-4">
    <h1>Board erstellen</h1>




    <div class="col-md-6">
        <form action="<?php echo base_url('Hauptcontroller/submitBoard') ?>" method="post">
            <!-- Hidden input for ID (for update and delete) -->
            <input type="hidden" name="id" value="<?php echo isset($update['board']) ? $update['board'] : ''; ?>">

            <div class="mb-3">
                <label for="board" class="form-label">Boardbezeichnung</label>
                <input type="text" class="form-control <?= (isset($error['board'])) ? 'is-invalid' : '' ?>" id="board"
                       name="board"
                       value="<?= isset($boards['board']) ? $boards['board'] : (isset($update['board']) ? $update['board'] : '') ?>">
                <div class="invalid-feedback">
                    <?= isset($error['board']) ? $error['board'] : '' ?>
                </div>
            </div>





            <button type="submit" class="btn btn-primary" name="submitBoard" id="submitBoard">Speichern</button>

            <a href="/public/Hauptcontroller/board">
                <button type="button" class="btn btn-secondary">Abbrechen</button>
            </a>
        </form>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
