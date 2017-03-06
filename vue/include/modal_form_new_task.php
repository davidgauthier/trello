<!-- Modal inscription -->
<!-- <div class="modal fade" id="modal_form_video" tabindex="-1" role="dialog" aria-labelledby="modal_form_video_label">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_video_label">Inscription</h4>
            </div>
            
            <div class="modal-body">


                <form action="video.php" method="post">
                    
                    <div class="form-group">
                        <label for="input_titre">Titre</label>
                        <input type="text" class="form-control" id="input_titre" name="input_titre" placeholder="Titre de la vidéo">
                    </div>

                    <div class="form-group">
                        <label for="input_url">URL</label>
                        <input type="url" class="form-control" id="input_url" name="input_url" placeholder="URL de la vidéo">
                    </div>
                    
                    
                    <button type="submit" name="btnSaveVideo" class="btn btn-default">Valider</button>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
    
</div> -->




<!-- Modal -->
<div class="modal fade" id="modal_form_add_task" tabindex="-1" role="dialog" aria-labelledby="modal_form_add_task_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_add_task_label">Ajouter un task</h4>
            </div>
            
            <div class="modal-body">

                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="task_name">Name</label>            
                        <input class="form-control" id="task_name" name="task_name">
                    </div>

                    <div class="form-group">
                        <label for="task_description">Description</label>            
                        <textarea class="form-control" rows="3" id="task_description" name="task_description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="submit_form_new_task">Valider</button>
                </form>
                
            </div>
   
        </div>
    </div>
</div>