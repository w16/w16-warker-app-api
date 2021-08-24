(function (win, doc) {
    'use strict';

    //Delete
    function confirmDel(event) {
        event.preventDefault();
        var token = doc.getElementsByName('csrf-token')[0]["content"];
        if (confirm("Deseja mesmo apagar?")) {
            var ajax = new XMLHttpRequest();
            ajax.open('DELETE', event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function () {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = "";
                }
            };
            ajax.send();
        } else {
            return false
        }
    }

    if (doc.querySelector('.js-del')) {
        var btn = doc.querySelectorAll('.js-del');
        for (var i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document);