<script>
function login_php(str) {
    alert("Hello");
    if (str == "") {
        document.getElementById("id1").innerHTML = "";

        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("id1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","login_back.php?user="+str,true);
        xmlhttp.send();
    }
}
</script>