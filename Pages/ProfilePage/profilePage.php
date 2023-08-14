<head>
    <link rel="stylesheet" href="CSS/profilePage.css">
</head>


<div id="userAddressData"></div>


<div class="row">
    <div id="datePickerDiv" class="col-md-2">
        <p>From: <input type="text" id="datepicker"></p>
        <p>To: <input type="text" id="datepicker2"></p>
        <button class="btn" onClick="searchResult()">Search Orders</button><span> <a class="btn" href="http://localhost/webpage/?oldal=profilePage">Back</a></span>

    </div>
    <div class="col-md-10">
        <div id="dateResult"></div>
    </div>
</div>

<!-- DatePicker -> getelement ( érték ) átadni db -nek és vissza adni az adott rendeléseket. -->

<script src="./Js/profilePage/profilePage.js"></script>