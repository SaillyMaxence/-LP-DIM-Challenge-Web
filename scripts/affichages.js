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