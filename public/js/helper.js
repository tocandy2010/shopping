function checkInput(data, condition , limit = "")
{
    switch(condition) {
        case length : 
            len = limit.split("~");
            datalen = data.legnth;
            return (datalen <= len[0] && datalen >= len[1]);
            break;
        case notempty :
            return data === "";
            break;
        case eamil :
            patt = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            return data.search(patt)!= -1;
            break;
        case phone :
            patt = /[0][9][0-9]{8}$/;
            return data.search(patt)!= -1;
            break;
        case number :
            return !is_NaN(data);
            break;
        case range :
            len = limit.split("~");
            datanum = parseInt(data);
            return (datanum <= len[0] && datanum >= len[1]);
            break;
    }
}