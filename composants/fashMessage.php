
<?php if($data['reponse'] !== null ) { ?>
    <div class="row">
        <div class="col-md-12">
            <?php if($data['reponse'] === true ) { ?>
                <div class="alert alert-success">
                    <?php echo $data['message']; ?>
                </div>
            <?php } ?>

            <?php if($data['reponse'] === false ) { ?>
                <div class="alert alert-danger">
                    <?php echo $data['message']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
