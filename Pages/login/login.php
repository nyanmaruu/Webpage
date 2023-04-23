<script type="text/javascript">
    function overFlowOn() {
        document.body.style.overflowY = "auto";
        document.getElementById("home").style.display = "none";
    }

    $(document).ready(function() {
        accountManagment();
        overFlowOn();
    })

    function accountManagment() {
        $.ajax({
            url: "./Classes/AccountManagment/SignUpAndLogin.php",
            type: "POST",
            data: {
                action: "loginSignUp"
            },
            success: function(response) {
                document.getElementById('baseContent').innerHTML = response;
            }
        })
    }
</script>