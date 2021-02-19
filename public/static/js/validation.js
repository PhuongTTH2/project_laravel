
    function trim(str) {
        return str.replace(/^\s+|\s+$/g, '');
    }

    function ltrim(str) {
        return str.replace(/^\s+/, '');
    }

    function rtrim(str) {
        return str.replace(/\s+$/, '');
    }

    function isEmpty(value) {
        if (value == null || value == undefined) {
            return false;
        } else if (trim(value).length > 0) {
            return true;
        }
        return false;
    }

    function isInteger(value) {
        return (/(^(\-?)([1-9])([0-9])*$)|(^0$)/).test(value);
    }

    function isDecimal(value) {
        return (/(^(\-?)[1-9][0-9]+[.][0-9]+$)|(^(\-?)[0-9][.][0-9]+$)/).test(value)
                || (/(^(\-?)([1-9])([0-9])*$)|(^0$)/).test(value);
    }

    function isNumeric(value) {
        var regex = /^([0-9])*$/;
        return regex.test(value);
    }

    function isAlphabet(value) {
        var regex = /^[a-zA-Z]*$/;
        return regex.test(value);
    }

    function isAlphaNumeric(value) {
        var regex = /^([a-zA-Z0-9])*$/;
        return regex.test(value);
    }

    // Return true if value is date, false if not
    function isDate(value) {
        //var regex = /^(((0?[13578]|1[02])\/(0?[1-9]|[12]\d|3[01])\/((1[6-9]|[2-9]\d)\d{2}))|((0?[13456789]|1[012])\/(0?[1-9]|[12]\d|30)\/((1[6-9]|[2-9]\d)\d{2}))|(0?2\/(0?[1-9]|1\d|2[0-8])\/((1[6-9]|[2-9]\d)\d{2}))|(0?2\/29\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
        var regex = /^(((0?[1-9]|[12]\d|3[01])\/(0?[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0?[1-9]|[12]\d|30)\/(0?[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0?[1-9]|1\d|2[0-8])\/0?2\/((1[6-9]|[2-9]\d)\d{2}))|(29\/0?2\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
        //var regex = /^((((1[6-9]|[2-9]\d)\d{2})\/(0?[13578]|1[02])\/(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})\/(0?[13456789]|1[012])\/(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})\/0?2\/(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))\/0?2\/29))$/;
        return regex.test(value);
    }

    // Return true if value is time, false if not
    function isTime(value) {
        return (/^[0-1]?\d:[0-5]\d(:[0-5]\d)?$/).test(value) || (/^[2][0-3]:[0-5]\d(:[0-5]\d)?$/).test(value);
    }

    // Return true if value is date time, false if not
    function isDateTime(value) {
        var str = trim(value).split(' ');
        return isDate(str[0]) && isTime(str[1]);
    }

    // Return true if value is full name, false if not.
    function isFullName(value) {
        return (/^[a-z'\s]+$/).test(removeSign(value));
    }

    // Return true if value is email, false if not
    function isEmail(value) {
        var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        return regex.test(value);
    }

    // Return true if value is phone, false if not.
    function isPhone(value) {
        var regex = /^(\d{8,11})$/;
        return regex.test(value);
    }

    // Return true if value is zip code, false if not. United States zip code in 5 digit format or zip + 4 format. 99999 or 99999-9999
    function isZipCode(value) {
        var regex = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
        return regex.test(value);
    }

    // Return true if value is zip code, false if not. United States SSN is 999-99-9999
    function isSSN(value) {
        var regex = /^[0-9]{3}[\- ]?[0-9]{2}[\- ]?[0-9]{4}$/;
        return regex.test(value);
    }

    function isIpAddress(value) {
        var regex = /^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/;
        return regex.test(value);
    }

    // Return true if value is valid URL, false if not. (not include http://)
    function isUrl(value) {
        var regex = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/;
        return regex.test(value);
    }

    function isUrlExt(value) {
        var regex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        return regex.test(value);
    }

    function isUserName(value) {
        var regex = /^[a-zA-Z](([\.\-a-zA-Z0-9@])?[a-zA-Z0-9]*)*$/;
        return regex.test(value);
    }

    function isFolderName(value) {
        var regex = /^(?:[^(\\\?\/\"\:\*\<\>\|)])*$/g;
        return regex.test(value);
    }

    function isValidated(value, pattern) {
        var regex = new RegExp(pattern);
        return regex.test(value);
    }

    function removeSign(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
        str = str.replace(/đ/g, 'd');
    //    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
        str = str.replace(/ + /g, ' ');
        str = str.trim();
        return str;
    }
