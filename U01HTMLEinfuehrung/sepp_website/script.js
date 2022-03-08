
function meldung() {
  return confirm("Seite verlassen?");
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
