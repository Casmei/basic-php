<h1>Contact</h1>

<div class="my-4">
    <?= get('message') ?>
</div>

<form action="/pages/forms/contact.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="email-name" class="form-control" placeholder="John" />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email-email" class="form-control" placeholder="john@due.com" />
    </div>

    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" name="subject" id="email-subject" class="form-control" placeholder="Problem with water" />
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" name="message" id="email-message" rows="3"></textarea>
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Send</button>
    </div>
</form>
