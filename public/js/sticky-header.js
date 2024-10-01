const header = document.getElementById("first-header");
const sticky = header.offsetTop;

window.onscroll = stickyheader;

function stickyheader() {
    
    if (window.scrollY > sticky) {
        header.style.alignItems = "center";
    } else {
        header.style.alignItems = "flex-end";
    }
}

stickyheader();