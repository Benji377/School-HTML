
function meldung() {
  if (confirm("Press a button")) {
    window.open("https://www.google.com/search?q=Sepp+Hintner", "_blank");
  }
}

function openFolder(img) {
  img.src = "OrdnerOffen.png";
}
function closeFolder(img) {
  img.src = "OrdnerGeschlossen.png";
}

function updateTime() {
  setInterval(setTime, 1000);
}

function setTime() {
  const d = new Date();
  document.getElementById("zeit").innerHTML = d.toLocaleString();
}
