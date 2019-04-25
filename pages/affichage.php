<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>news banner carousel</title>



    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);
        body {
            background-color: #1a1a1a;
            background-image: url(http://crossorigin.me/http://i.imgur.com/XlUa2YE.jpg);
            background-position: center top;
            font-size: 0;
            font-family: "Lato";
            font-weight: 700;
            overflow: hidden;
        }

        .main-container {
            width: 100%;
            position: absolute;
            left: 25px;
            bottom: 10px;
        }

        .main-container .text {
            font-size: 22px;
            line-height: 30px;
        }

        .main-container .row .row-item {
            display: inline-block;
        }

        .main-container .row .row-item.left {
            width: 15%;
            text-align: right;
            padding-right: 8px;
            box-sizing: border-box;
            font-weight: 900;
        }

        .main-container .row .row-item.left.time {
            background: transparent;
            color: white;
        }

        .main-container .row .row-item.left.logo {
            background-color: #0093d2;
            color: white;
        }

        .main-container .row .row-item.right {
            width: 85%;
        }

        .main-container .row .row-item.right.title-container .title-item {
            background: white;
            display: inline-block;
            width: 25%;
            padding-left: 8px;
            box-sizing: border-box;
            position: relative;
            transition: width 1s, padding 1s, opacity 0.5s;
            overflow: hidden;
            white-space: nowrap;
        }

        .main-container .row .row-item.right.title-container .title-item:nth-child(1) {
            opacity: 1;
        }

        .main-container .row .row-item.right.title-container .title-item:nth-child(2) {
            opacity: 0.85714;
        }

        .main-container .row .row-item.right.title-container .title-item:nth-child(3) {
            opacity: 0.71429;
        }

        .main-container .row .row-item.right.title-container .title-item:nth-child(4) {
            opacity: 0.57143;
        }

        .main-container .row .row-item.right.title-container .title-item:nth-child(5) {
            opacity: 0.42857;
        }

        .main-container .row .row-item.right.title-container .title-item.active {
            -webkit-animation: activeItemDown 1s 5s forwards;
            animation: activeItemDown 1s 5s forwards;
        }

        .main-container .row .row-item.right.title-container .title-item.active:after {
            position: absolute;
            top: calc(100% - 3px);
            left: 0;
            right: 100%;
            bottom: 0;
            content: "";
            background: red;
            -webkit-animation: activeItemTimer 5s linear forwards;
            animation: activeItemTimer 5s linear forwards;
        }

        .main-container .row .row-item.right.title-container .title-item.deactive {
            width: 0;
            padding: 0;
        }

        .main-container .row .row-item.right.summary {
            background: white;
            padding-left: 5px;
            box-sizing: border-box;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: black;
            transition: color 0.8s;
        }

        .main-container .row .row-item.right.summary.fade-out {
            color: transparent;
        }

        .main-container .row .row-item.right.summary.fade-in {
            color: black;
        }

        .main-container .row.top-row .row-item,
        .main-container .row.top-row .row-item>div {
            vertical-align: bottom;
        }

        .main-container .row.bot-row .row-item {
            vertical-align: top;
        }

        .main-container .row.bot-row .row-item.right {
            border-bottom-right-radius: 20px;
        }

        @-webkit-keyframes activeItemTimer {
            0% {
                right: 100%;
            }
            100% {
                right: 0%;
            }
        }

        @keyframes activeItemTimer {
            0% {
                right: 100%;
            }
            100% {
                right: 0%;
            }
        }

        @-webkit-keyframes activeItemDown {
            0% {
                max-height: 100px;
            }
            100% {
                max-height: 0;
            }
        }

        @keyframes activeItemDown {
            0% {
                max-height: 100px;
            }
            100% {
                max-height: 0;
            }
        }

    </style>


</head>

<body>


    <div class="main-container">
        <div class="row top-row">
            <div class="row-item left text time">00:00</div>
            <div class="row-item right title-container">
                <div class="title-item text active">&nbsp;</div>
                <div class="title-item text">&nbsp;</div>
                <div class="title-item text">&nbsp;</div>
                <div class="title-item text">&nbsp;</div>
                <div class="title-item text deactive">&nbsp;</div>
            </div>
        </div>
        <div class="row bot-row">
            <div class="row-item left text logo">IUT CALAIS</div>
            <div class="row-item right text summary">&nbsp;</div>
        </div>
    </div>


    <script src="../scripts/affichage.js"></script>
    <script>
        var lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            fox = "The quick brown fox jumps over the lazy dog",
            titleContainer = document.getElementsByClassName("title-container")[0],
            summaryContainer = document.getElementsByClassName("summary")[0],
            timeContainer = document.getElementsByClassName("time")[0];

        var news = [{
                title: "FOO",
                summary: lorem
            }, {
                title: "BAR",
                summary: fox
            }, {
                title: "BAZ",
                summary: lorem
            }, {
                title: "QUX",
                summary: fox
            }, {
                title: "NEWS",
                summary: lorem
            }, {
                title: "HI MOM",
                summary: fox
            }],
            elems = [],
            count = 4;

        function createElems() {
            elems = news.map(v => {
                var item = document.createElement("div");
                item.classList.add("title-item");
                item.classList.add("text");
                item.innerHTML = v.title;
                item.summary = v.summary;
                return item;
            });
            elems[0].classList.add("active");
            elems[count].classList.add("deactive");

            while (titleContainer.firstChild) {
                titleContainer.removeChild(titleContainer.firstChild);
            }

            for (var i = 0; i < count + 1; i++) {
                titleContainer.appendChild(elems[i]);
            }
            summaryContainer.innerHTML = elems[0].summary;
        }
        createElems();

        var cases = {
            "activeItemDown": function() {
                elems[0].classList.add("deactive");
                elems[count].classList.remove("deactive");
                summaryContainer.classList.add("fade-out");
                summaryContainer.classList.remove("fade-in");
            },
            "width": function() {
                elems[0].remove();
                elems[0].classList.remove("active");
                elems.push(elems.shift());
                elems[count].classList.add("deactive");
                titleContainer.appendChild(elems[count]);
                elems[0].classList.add("active");
                summaryContainer.innerHTML = elems[0].summary;
                summaryContainer.classList.add("fade-in");
                summaryContainer.classList.remove("fade-out");
            }
        };

        ["animationend", "transitionend"].forEach(v => document.addEventListener(v, eventHandler));

        function eventHandler(e) {
            var prop = e.animationName || e.propertyName || "";
            (e.target.classList.contains("active") && cases[prop]) ? cases[prop](): null;
        }

        function updateTime() {
            timeContainer.innerHTML = new Date().toTimeString().substr(0, 5);
            setTimeout(updateTime, 10000);
        }
        updateTime();

    </script>




</body>

</html>
