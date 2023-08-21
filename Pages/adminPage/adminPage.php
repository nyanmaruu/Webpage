<div class="container mt-4">
    <div class="row">
        <div id="datePickerDiv" class="col-md-3">
            <label for="users">Choose a User:</label>
            <select class="form-control mb-2" name="name" id="users"></select>
            <label>Choose dates</label>
            <p class="mb-2">From: <input type="text" class="form-control" id="datepicker"></p>
            <p class="mb-2">To: <input type="text" class="form-control" id="datepicker2"></p>
            <button class="btn " onClick="searchResultAdmin()">Search Orders</button>
        </div>
        <div class="col-md-9">
            <div id="dateResult"></div>
        </div>
    </div>
</div>
<script src="./Js/adminPage/adminPage.js"></script>