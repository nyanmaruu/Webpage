<script type="text/javascript">
    function overFlowOn() {
        document.body.style.overflowY = "auto";
        document.getElementById("home").style.display = "none";
    }



    $(document).ready(function() {
        coffees();
        overFlowOn()
    })

    function coffees() {
        $.ajax({
            url: "./Controller/ProductController/productController.php",
            type: "POST",
            data: {
                action: "getAllCoffee"
            },
            success: function(response) {
                document.getElementById('baseContent').innerHTML = response;
                console.log(response);
            }
        })
    }
</script>