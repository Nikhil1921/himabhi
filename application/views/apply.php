<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="inner-about-area clint-review-c pt-120 pb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
                <form method="POST" id="contact-form" class="contact-form-box row">
                    <div class="col-lg-6 mt-4">
                        <select name="job" id="job" class="name-box" required>
                            <option value="">Select job</option>
                            <?php foreach($careers as $c): ?>
                                <option value="<?= my_crypt($c['id']) ?>" <?= my_crypt($c['id']) === $this->input->get('job-id') ? 'selected' : '' ?>><?= $c['c_title'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="name" maxlength="100" class="name-box" placeholder="Name" required="">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="subject" maxlength="100" class="name-box" placeholder="Subject" required="">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="email" name="email" maxlength="100" class="name-box" placeholder="Email Address" required="">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="phone" maxlength="10" class="name-box" placeholder="Phone Number" required="">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="aadhar" maxlength="12" class="name-box" placeholder="Aadhar card Number" required="">
                    </div>
                    <div class="col-lg-12 mt-4">
                        <textarea name="message" maxlength="255" id="message-box" placeholder="Your Details" required=""></textarea>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="custom-file">
                            <input type="file" name="resume" class="custom-file-input" id="resume" required>
                            <label class="custom-file-label" for="resume">You can attach resume/biodata : (.pdf only)*</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" required>
                            <label class="custom-file-label" for="image">Letest passport size photo : (.jpg, .jpeg, .png only)*</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="custom-file">
                            <input type="file" name="police_certy" class="custom-file-input" id="police_certy" required>
                            <label class="custom-file-label" for="police_certy">Police verification certificate : (.jpg, .jpeg, .png only)*</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="custom-file">
                            <input type="file" name="licence" class="custom-file-input" id="licence">
                            <label class="custom-file-label" for="licence">Licence document : (.jpg, .jpeg, .png only)*</label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn-1 message-send hover-effect">Apply Now</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</section>