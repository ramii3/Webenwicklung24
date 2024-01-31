<div class="container mt-4">
    <h1>Tasks</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <a class="btn btn-primary mb-2" id="buttonTasks"
                   href="<?= base_url("Hauptcontroller/taskersteller") ?>">Neu</a>

                <th>ID</th>
                <th>Task</th>
                <th>Name</th>
                <th>Vorname</th>
                <th>Taskart</th>
                <th>Spalte</th>
                <th>Erstelldatum</th>
                <th>Erinnerungsdatum</th>
                <th>Notizen</th>
                <th>Erledigt</th>
                <th>Geloescht</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0;
            $i < count($tasks);
            $i++): ?>
            <tr>
                <td><?php echo $tasks[$i]['id']; ?></td>
                <td><?php echo $tasks[$i]['tasks']; ?></td>
                <td><?php echo $tasks[$i]['name']; ?></td>
                <td><?php echo $tasks[$i]['vorname']; ?></td>
                <td><?php echo $tasks[$i]['taskart']; ?></td>
                <td><?php echo $tasks[$i]['spalte']; ?></td>
                <td><?php echo $tasks[$i]['erstelldatum']; ?></td>
                <td><?php echo $tasks[$i]['erinnerungsdatum']; ?></td>
                <td><?php echo $tasks[$i]['notizen']; ?></td>
                <td><?php echo $tasks[$i]['erledigt']; ?></td>
                <td><?php echo $tasks[$i]['geloescht']; ?></td>
                <td><i class="fa-solid fa-pen-to-square" style="color: #005eff"></i>
                    <i class="fa-solid fa-trash" style="color: #005eff"></i></td>
                <td>
                    <a href="<?php echo base_url('/hauptcontroller/taskersteller/' . $tasks[$i]['id']) ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                    </a>

                    <form action="<?php echo base_url('/hauptcontroller/deleteTasks/' .  $tasks[$i]['id']) ?>" method="post">

                        <a href="#" onclick="this.parentNode.submit()">
                            <input type="hidden" name="id" value="<?php echo $tasks[$i]['id']; ?>">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </a>



                    </form>



                    <?php endfor; ?>

            </tbody>
        </table>
    </div>
</div>