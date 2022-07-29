function logout() {
    console.log("logout");
    var cookies = document.cookie.split(";");
    var count = 0;
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=; domain=<site>; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        if(count == cookies.length-1){
            window.location.href = '/';
        }
        count++;
 
    }
}