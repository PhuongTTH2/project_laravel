
function isIE() {
    var browserName = navigator.appName;
    if (browserName == 'Microsoft Internet Explorer') {
        return true;
    } else {
        return false;
    }
}

function redirect(url) {
    if (isIE()) {
        var referLink = document.createElement('a');
        referLink.href = url;
        document.body.appendChild(referLink);
        referLink.click();
    } else {
        document.location = url;
    }
}

function removeParam(url, paramName) {

    var s = url.indexOf(paramName + '=');

    if (s < 0) return url;

    var e = url.indexOf('&', s);
    e++;

    if (e == 0) {
        e = url.length;
    }

    url = url.substring(0, s) + url.substring(e, url.length);

    if (url.length > 1) {
        var lastChar = url.charAt(url.length - 1);
        if (lastChar == '?' || lastChar == '&') {
            url = url.substring(0, url.length - 1);
        }
    }

    return url;
}

function getQuery( name, url ) {

    if (!url) url = location.href;

    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );

    return results == null ? null : results[1];
}

function setParam(url, paramName, paramValue) {

    url = removeParam(url, paramName);

    if (url.indexOf('?') > -1) {
        url = url + '&' + paramName + '=' + paramValue;
    } else {
        url = url + '?' + paramName + '=' + paramValue;
    }

    return url;
}

function toogleDiv(div, value) {
    $('#' + div).css('display', value != true ? '' : 'none');
}


