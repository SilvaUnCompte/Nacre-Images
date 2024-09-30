window.onscroll = stickyheader;

function stickyheader() {
    
    if (window.scrollY > sticky) {
        header.style.alignItems = "center";
    } else {
        header.style.alignItems = "flex-end";
    }
}

var header = document.getElementById("first-header");
var sticky = header.offsetTop;
stickyheader();