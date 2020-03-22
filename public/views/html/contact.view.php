<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-0">Contact US</h1>
            </div>
            <a href="/home/faq" class="btn btn-outline-white flex-column">
                Have some questions?
                <span class="btn__secondary-text">See our FAQ!</span>
            </a>
        </div>
    </div>
    <div class="bg-white pt-32pt pb-32pt pb-md-64pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <form method="POST" autocomplete="off" class="col-md-6 p-0 mx-auto">
                <p class="text-justify text-muted">For any suggestion, use the form below to notify us. Your suggestion will be considered and will help us improve the plateform for better user experience and make it more user friendly. </p>
                <?php $form::getErrors(); ?>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input id="name" type="text" name="name" class="form-control" value="<?= $form::getInput('name') ?>"
                        placeholder="Your full name...">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="email" class="form-control"
                        value="<?= $form::getInput('email') ?>" placeholder="Your email address...">
                </div>
                <div class="form-group">
                    <label for="massage">Message:</label>
                    <textarea is="textarea-autogrow" name="message" id="message" class="form-control"
                        placeholder="Your message..."><?= $form::getInput('message') ?></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-accent" type="submit" name="send">Send</button>
                </div>
            </form>
        </div>
    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>
<!-- // END Header Layout Content -->