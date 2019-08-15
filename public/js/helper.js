function checkInput(data, condition , limit = "")
{
    switch (condition) {
        case "length" :
            data = data.trim();
            len = limit.split("~");
            datalen = data.length;
            return (datalen >= parseInt(len[0]) && datalen <= parseInt(len[1]));
            break;
        case "notempty" :
            data = data.trim();
            return data !== "";
            break;
        case "email" :
            patt = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            return data.search(patt)!= -1;
            break;
        case "phone" :
            patt = /[0][9][0-9]{8}$/;
            return data.search(patt)!= -1;
            break;
        case "number" :
            return !isNaN(parseInt(data));
            break;
        case "range" :
            len = limit.split("~");
            datanum = parseInt(data);
            return (datanum >= parseInt(len[0]) && datanum <= parseInt(len[1]));
            break;
    }
}