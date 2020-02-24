<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
            <div class="flex">
                <h1 class="text-white flex mb-0"><?= $topic->topic_title ?></h1>
                <p class="text-white-50 lead"><?= $course_name ?></p>
            </div>
        </div>
    </div>
    <div class="page-section bg-white border-bottom-2">
        <div class="container page__container">
            <form action="" method="POST">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h4>Topis Content</h4>
                        <?php $form::getErrors(); ?>
                        <textarea class="form-control" name="topic_content" id="topicContent" rows="10" cols="30" placeholder="Course description goes here.."><?= $topic->topic_content ?></textarea>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-0">
                            <div class="card-header text-center">
                                <button type="submit" name="save" class="btn btn-accent">Save changes</button>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <a href="#" class="text-danger"><strong>Delete Content</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>
<!-- // END Header Layout Content -->