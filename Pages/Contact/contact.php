<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <h2 class="text-center">Contact Us</h2>
            <form action="./Controller/Contact/contact.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                </div>
                <button name="submit" type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="./Js/contact/contact.js"></script>