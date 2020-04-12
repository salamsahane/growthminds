<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-64pt bg-gradient-red">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="<?= $course->course_image ?>" class="mr-md-32pt mb-32pt mb-md-0"
                alt="student">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt"><?= $course->course_name ?></h1>
                <p class="lead measure-lead text-white-50">
                    Instructor: <?= ucwords($instructor_fname . ' ' . $instructor_lname) ?> | 
                    <?= $number_topics ?> Topics
                </p>
            </div>
            <a href="/home/faq" class="btn btn-outline-white flex-column">
                Questions?
                <span class="btn__secondary-text">Visit our Help Center</span>
            </a>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">
            <form method="POST" class="col-md-8 p-0 mx-auto">
                <div class="list-group list-group-form mb-0">
                    <div class="list-group-item">
                        <fieldset role="group" aria-labelledby="label-type" class="m-0 form-group">
                            <div class="form-row">
                                <label for="payment_mode" id="label-type"
                                    class="col-md-3 col-form-label form-label">Payment Mode</label>
                                <div role="group" aria-labelledby="label-type" class="col-md-9">
                                    <div role="group" class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary active">
                                            <input type="radio" id="payment_momo" name="payment_type" value="momo"
                                                checked="" aria-checked="true" /> Mobile Money
                                        </label>
                                        <label class="btn btn-outline-secondary">
                                            <input type="radio" id="payment_om" name="payment_type" value="om"
                                                aria-checked="true" /> Orange Money
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="list-group-item">
                        <div class="form-group row mb-0">
                            <label class="col-form-label col-sm-3">Amount To Pay</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" readonly  value="<?= number_format($course->course_price) ?> FCFA" placeholder="Phone number" />
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-group row mb-0">
                            <label class="col-form-label col-sm-3">Phone number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Phone number" />
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item text-center">
                        <button type="submit" class="btn btn-lg btn-accent">Pay Now</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- // END Header Layout Content -->