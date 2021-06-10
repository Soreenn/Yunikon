i = 0;
e = i;
document.getElementById("logoSuperSecretFeature").addEventListener("click", easterCount);

function easterCount() {
    i++
    if (i == 10) {
        easterStart();
    }
}

function easterStart(){
    document.getElementById("logoSuperSecretFeature").src="https://cdn.streamlabs.com/users/41445587/library/1552671673728.gif";
    document.getElementById("header").style.background = "url(/view/content/images/dancin.mp4)";
    document.getElementById("video").removeAttribute("muted");
    document.getElementById("videoDiv").removeAttribute("hidden");
}